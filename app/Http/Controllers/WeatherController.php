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
        //foreach ($area['DailyForecasts'] as $value){
        //dd($area['DailyForecasts']);
        for ($i = 0; $i < 5; $i++){
            $area['DailyForecasts'][$i]['Date'] = Carbon::parse($area['DailyForecasts'][$i]['Date'])->format('d/m/Y');
            $area['DailyForecasts'][$i]['Temperature']['Minimum']['Value'] = (int)((($area['DailyForecasts'][$i]['Temperature']['Minimum']['Value'])-32)*(5/9));
            $area['DailyForecasts'][$i]['Temperature']['Maximum']['Value'] = (int)((($area['DailyForecasts'][$i]['Temperature']['Maximum']['Value'])-32)*(5/9));
        }
        return view('welcome', compact('area'));
    }
}
