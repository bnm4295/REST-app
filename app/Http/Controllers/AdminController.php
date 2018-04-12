<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Offer;
use Suuty\Blog;
use Suuty\Property;
use Suuty\User;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    protected $per_page = 6;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$apiKey = 'ed43fccd9f69d28e5efa45b07df1c40a4c8e0e6277266e654b42aa0786069558';
        $apiSecret = 'bc143defff0d547a53a83f86c6cfce059482f4767e4a1e75b41b8149297f1d47';
        $configuration = Configuration::apiKey($apiKey, $apiSecret);
            $client = Client::create($configuration);

        $accounts = $client->getAccounts();
        foreach ($accounts as &$account) {
            $balance = $account->getBalance();
            echo $account->getName() . ": " . $balance->getAmount() . $balance->getCurrency() .  "\r\n";
            print_r($client->getAccountTransactions($account));
        }
        */
    
        
        /*$secret = 'ZzsMLGKe162CfA5EcG6j';

        $my_xpub = 'xpub6BtzFJMs9ipd76XBEMBzuPn6ckrjzdjVwahPGJTWRpY1jTasSELHkXZ4p4rggbQ4X5o991RxVo8Wk2FZRLTucd6RrP2NsXSdhDRsqSeRMrE';
        $my_api_key = '9e988c21-d9ba-428e-9de5-48a8763d332e';

        $my_callback_url = 'https://suuty.com?invoice_id=058921123&secret='.$secret;

        $root_url = 'https://api.blockchain.info/v2/receive';

        $parameters = 'xpub=' .$my_xpub. '&callback=' .urlencode($my_callback_url). '&key=' .$my_api_key;

        $response = file_get_contents($root_url . '?' . $parameters);

        $object = json_decode($response);

        echo 'Send Payment To : ' . $object->address;
        */
     
        
        //$target = explode(": ", $response);

        //$url = $target[1];
        //header( "Location: $url ") ;


        $url1 = "https://example.com/oauth/callback?code=4c666b5c0c0d9d3140f2e0776cbe245f3143011d82b7a2c2a590cc7e20b79ae8&state=134ef5504a94";
        $url2 = "https://www.coinbase.com/oauth/authorize?client_id=ed43fccd9f69d28e5efa45b07df1c40a4c8e0e6277266e654b42aa0786069558&meta%5Bsend_limit_amount%5D=1.00&meta%5Bsend_limit_currency%5D=USD&redirect_uri=https%3A%2F%2Fwww.suuty.com&response_type=code&scope=wallet%3Atransactions%3Asend&state=SECURE_RANDOM";
        //$ch = curl_init();
        $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',

        );
        /*
        curl_setopt($ch, CURLOPT_URL, $url1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //$body = '{}';

        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        //curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $authToken = curl_exec($ch);

        //echo $authToken;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url2);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $result = curl_exec($ch);
        //dd($result);
        if (preg_match('~Location: (.*)~i', $result, $match)) {
            $location = trim($match[1]);
        }
        */


        $properties = Property::paginate($this->per_page);
        $offers = Offer::paginate($this->per_page);
        $blogs = Blog::all();
        return view('admin', compact('properties','offers', 'blogs'));
    }
        
}
