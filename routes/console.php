<?php

use Illuminate\Foundation\Inspiring;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());

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
        foreach($savesearch as $post){
          //echo "<br>";
          echo "SaveSearch ID: " . $post->id . " " . $post->email . " ";
          echo "localhost:8080" . $post->url;
        }
      }
      //echo "<br>";
    }
})->describe('Display an inspiring quote');
