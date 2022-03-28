<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function imeiCheck()
    {
            
        return view('imei');
        
    }

    public function imeiSubmit() 
    {
        $format = "html"; // Display result in JSON or HTML format
        $imei = $_POST['imei']; // IMEI or SERIAL Number
        if(!filter_var($imei, FILTER_VALIDATE_EMAIL)){$imei = preg_replace("/[^a-zA-Z0-9]+/", "", $imei);} // Remove unwanted characters for IMEI/SN
        $service = $_POST['service']; // Service ID
        if($service != 'demo'){
        $service = preg_replace("/[^0-9]+/", "", $service);
        } // Remove unwanted characters for Service ID
        $api = "EQS-IX5-HZ4-T2B-7LX-NHF-JQ0-AQW"; // Sickw.com APi Key

        if(isset($_POST['service']) && isset($_POST['imei'])){
        if(strlen($api) !== 31)
        {
            echo "<font color=\"red\"><b>API KEY is Wrong! Please set APi KEY!</b></font>"; die;
        }
        if(strlen($service) > 4 || $service > 250){echo "<font color=\"red\"><b>Service ID is Wrong!</b></font>"; die;
       }
        if(!filter_var($imei, FILTER_VALIDATE_EMAIL))
        {
        if(strlen($imei) < "11" || strlen($imei) > "15")
        {
            echo "<font color=\"red\"><b>IMEI or SN is Wrong!</b></font>"; die;
        }
    }

        $curl = curl_init ("https://sickw.com/api.php?format=$format&key=$api&imei=$imei&service=$service");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        $result = curl_exec($curl);
        curl_close($curl);

        return redirect()->back()->with('success', PHP_EOL.$result);
        echo PHP_EOL."<br/><br/>".PHP_EOL.$result; // Here the result is printed

        }
    }
}
