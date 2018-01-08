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

              $savesearch = DB::table('savesearch')->where('url', 'LIKE', "%$checkcity%")->get();
              $messages = "";
              foreach($savesearch as $post){
                //echo "<br>";
                $messages = . $post->id . " " . $post->email . " " . $post->url;

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

        $schedule->command('inspire')
          ->everyMinute()
          ->emailOutputTo('jhso@sfu.ca');

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
