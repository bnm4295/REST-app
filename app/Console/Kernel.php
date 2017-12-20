<?php

namespace Suuty\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
      //\App\Console\Commands\Inspire::class,
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
        //$schedule->command('inspire')
        //->everyMinute();
        $schedule->call(function () {
          $checktest = DB::table('properties')->get();
          date_default_timezone_set('America/Los_Angeles');
          $tomorrow = time() + (1 * 24 * 60 * 60);
          echo 'tmr: ' . date('Y-m-d H:i:s', $tomorrow);
          echo "<br>";
          echo "tmr-today: ". $diff = $tomorrow - time();
          echo "<br>";
          echo "Todays date: ". time();
          //echo date("Y-m-d H:i:s");
          echo "<br>";
          foreach($checktest as $check){
            $testing = strtotime($check->created_at);
            echo 'Today-created time: '. $remaining = time() - $testing;
            if($remaining < $diff && $remaining > -1){
              echo "<br>";
              echo "This property was created recently (Today)";
              //check if fields are similar
              echo $checkcity = $check->city;
              //$savesearch = DB::table('savesearch')->get();

              $savesearch = DB::table('savesearch')->where('url', 'LIKE', "%$checkcity%")->get();
              foreach($savesearch as $post){
                echo "<br>";
                echo "SaveSearch ID: " . $post->id . " " . $post->email;
              }
            }
            echo "<br>";
          }
        })->everyMinute()
          ->appendOutputTo('cron-output.txt')
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
