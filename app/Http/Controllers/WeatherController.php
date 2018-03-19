<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Ixudra\Curl\Facades\Curl;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function index()
    {
        $response = Curl::to('http://dataservice.accuweather.com/forecasts/v1/daily/5day/1218271')->withData(array('apikey' => 'O5ocTVO5DG1l8mHnbsNOzPlsTHcEWg6H'))->get();
        $area = json_decode($response, true);
        foreach ($area['DailyForecasts'] as $value){
            $value['Date'] = Carbon::setToStringFormat($value['Date']);
            dd($value['Date']);
        }
        return view('welcome', compact('area'));
    }
}
