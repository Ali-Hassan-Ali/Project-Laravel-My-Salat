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
     $apiKey ='qBko2-eyaDx-idI5u-scROh-GR0Gr-pbBhd';
     $service = $_POST['service']; // Service ID

     $balanceUrl = 'https://alpha.imeicheck.com/api/php-api/balance?key='.$apiKey;

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $balanceUrl);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
     curl_setopt($ch, CURLOPT_TIMEOUT, 60);

     $balance = curl_exec($ch);
     curl_close($ch);

     if ($balance == '{"balance":"0.00"}') {
        return redirect()->back()->with('error', 'balance 0.00!');
     }
     
     if($service != 'demo') {
      $service = preg_replace("/[^0-9]+/", "", $service);
     }

     if(strlen($service) > 4 || $service > 250)
    {
        return redirect()->back()->with('error', 'Service ID is Wrong!');
    }

    if(!filter_var($imei, FILTER_VALIDATE_EMAIL))
    {
        if(strlen($imei) < "11" || strlen($imei) > "15")
        {
            return redirect()->back()->with('error', 'IMEI or SN is Wrong!');
        }
    }
     
     $url = 'https://alpha.imeicheck.com/api/php-api/create?format='.$format.'&key='.$apiKey.'&service='.$service.'&imei='.$imei;
  
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
     curl_setopt($ch, CURLOPT_TIMEOUT, 60);

     $response = curl_exec ($ch);
     curl_close ($ch);
     
     return redirect()->back()->with('success', 'success');
        // $format = "html"; // Display result in JSON or HTML format
        // $imei = $_POST['imei']; // IMEI or SERIAL Number
        // if(!filter_var($imei, FILTER_VALIDATE_EMAIL)){$imei = preg_replace("/[^a-zA-Z0-9]+/", "", $imei);} // Remove unwanted characters for IMEI/SN
        // $service = $_POST['service']; // Service ID
        // if($service != 'demo'){

        //     $service = preg_replace("/[^0-9]+/", "", $service);
        // } // Remove unwanted characters for Service ID
        // $api = "IRhQt-f3KSZ-FbO47-M03AH-AtuqJ-1JALT"; // Sickw.com APi Key
        // if(isset($_POST['service']) && isset($_POST['imei'])){

        // if(strlen($api) !== 35)
        // {
        //     return redirect()->back()->with('error', 'API KEY is Wrong! Please set APi KEY!');
        // }
        
        // if(strlen($service) > 4 || $service > 250)
        // {
        //     return redirect()->back()->with('error', 'Service ID is Wrong!');
        // }

        // if(!filter_var($imei, FILTER_VALIDATE_EMAIL))
        // {
        //     if(strlen($imei) < "11" || strlen($imei) > "15")
        //     {
        //         return redirect()->back()->with('error', 'IMEI or SN is Wrong!');
        //     }
        // }
        // //$curl = curl_init ("https://sickw.com/api.php?format=$format&key=$api&imei=$imei&service=$service");
        // $curl = curl_init ("https://alpha.imeicheck.com/api/php-api/create?format=$format&key=IRhQt-f3KSZ-FbO47-M03AH-AtuqJ-1JALT&service=$service&imei=$imei");
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        // curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
        // curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        // $result = curl_exec($curl);
        // curl_close($curl);

        // return redirect()->back()->with('success', PHP_EOL.$result);
        // // echo PHP_EOL."<br/><br/>".PHP_EOL.$result; // Here the result is printed

        // }
    }
}
