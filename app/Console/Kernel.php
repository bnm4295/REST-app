<?php

namespace Suuty\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
      \Suuty\Console\Commands\inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //For every save search, compare it to the new listings and send email notification
        //...if it matches do above otherwise do none
        //Every day check for new property listings and execute above
        /*
        $schedule->call(function(){
          //return new Suuty\Mail\SaveSearch($property);

          $checktest = DB::table('properties')->get();
          date_default_timezone_set('America/Los_Angeles');
          $tomorrow = time() + (1 * 24 * 60 * 60);
          //echo 'tmr: ' . date('Y-m-d H:i:s', $tomorrow);
          //echo "<br>";
          $diff = $tomorrow - time();
          //echo "<br>";
          //echo "Todays date: ". time();
          //date("Y-m-d H:i:s");
          //echo "<br>";
          foreach($checktest as $check){
            $testing = strtotime($check->created_at);
            $remaining = time() - $testing;
            if($remaining < $diff && $remaining > -1){
              //echo "<br>";
              echo "This property was created recently (Today)";
              //check if fields are similar
              echo $checkcity = $check->city;
              //$savesearch = DB::table('savesearch')->get();
              Mail::raw("Hello", function($message)
              {
                $message->subject('Mailgun and Laravel are awesome!');
                $message->from('david@suuty.com', 'Suuty');
                $message->to('jhso@sfu.ca');
              });
              $savesearch = DB::table('savesearch')->where('url', 'LIKE', "%$checkcity%")->get();
              foreach($savesearch as $post){
                //echo "<br>";
                $messages .= $post->id . " " . $post->email . " " . $post->url;

              }
              Mail::raw($messages, function($message)
              {
                $message->subject('Mailgun and Laravel are awesome!');
                $message->from('david@suuty.com', 'Suuty');
                $message->to('jhso@sfu.ca');
              });
            }
            //echo "<br>";
          }
        })->everyMinute();
        */
        $schedule->call(function(){
          $checktest = DB::table('properties')->get();
          date_default_timezone_set('America/Los_Angeles');
          $tomorrow = time() + (1 * 24 * 60 * 60);
          $diff = $tomorrow - time();

          foreach($checktest as $check){
            $testing = strtotime($check->created_at);
            $remaining = time() - $testing;
            if($remaining < $diff && $remaining > -1){

              $checkcity = $check->city;
              $checkroute = $check->route;
              $checkstate = $check->state;
              $checkpostal = $check->postal_code;
              $checkcountry = $check->country;
              $checknumbeds = $check->number_of_beds;
              $checknumbaths = $check->number_of_baths;
              $checkproptype = $check->house_type;
              $checkprice = $check->price;
              $checkarea = $check->area;

              $messages = "";
              /*
              if (preg_match('/area_left=(\d+)/', $post->url, $area_left)) {
                  echo ( $area_left[1] ); // pid value
              }
              if (preg_match('/area_right=(\d+)/', $post->url, $area_right)) {
                  echo ( $area_right[1] ); // pid value
              }
              if (preg_match('/price_left=(\d+)/', $post->url, $price_left)) {
                  echo ( $price_left[1] ); // pid value
              }
              if (preg_match('/price_right=(\d+)/', $post->url, $price_right)) {
                  echo ( $price_right[1] ); // pid value
              }
              */
              //dd($testsearch->url);
              $savesearch = DB::table('savesearch')
                ->where(function($query) use ($checkcity,$checkroute,$checkstate,$checkcountry,$checkpostal){
                  $query->where('url', 'LIKE', "%$checkcity%")
                  ->orwhere('url', 'LIKE', "%$checkroute%")
                  ->orwhere('url', 'LIKE', "%$checkstate%")
                  ->orwhere('url', 'LIKE', "%$checkpostal%")
                  ->orwhere('url', 'LIKE', "%$checkcountry%");
                })
                ->where([
                  ['price_left', '<=', (int)$checkprice],
                  ['price_right', '>=', (int)$checkprice]
                ])
                ->where([
                  ['area_left', '<=', (int)$checkarea],
                  ['area_right', '>=', (int)$checkarea]
                ])
                ->get();

              foreach($savesearch as $post){
                $url = $post->url;
                $messages .= $post->id . " " . $post->email . " " . $post->url;
              }
              foreach($savesearch as $post){
                if($messages != ""){
                  Mail::raw($messages, function($message) use ($post)
                  {
                    $message->subject('Suuty Save Search Match!');
                    $message->from('david@suuty.com', 'Suuty');
                    $message->to($post->email);
                  });
                }
              }
            //dd($testsearch);

            }
          }
        });
        //$schedule->command('inspire')

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
