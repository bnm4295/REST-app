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

              //$checknull = DB::table('savesearch');

              //AKDOSKDOASDOSAKD hElP
              $savesearch = DB::table('savesearch')->where(function($query) use ($checkcity,$checkroute,$checkstate,$checkcountry,$checkpostal){
                $query->where('addr', 'LIKE', "%$checkcity%")
                ->orwhere('addr', 'LIKE', "$checkroute")
                ->orwhere('addr', 'LIKE', "$checkpostal")
                ->where('addr', 'LIKE', "%$checkstate%")
                ->where('addr', 'LIKE', "%$checkcountry%");
              })
              ->where('house_type', 'LIKE', "%$checkproptype%")
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
                $messages .= "<a href='$post->url'>SavedSearch</a>";
              }

              foreach($savesearch as $post){
                if($messages != ""){
                  Mail::send(['html' =>'emails.savesearch'], ['text' => $messages], function($message) use ($post)
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
