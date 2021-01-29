<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{


    public function sendSms(){

        // $user = new User; 
        // $user = auth()->user()->phone;

        Nexmo::message()->send([
            'to'   => '+48575070195',
            'from' => '16105552344',
            'text' => 'To jest sms z naszej apki Laravela. Twój zwierzak został znaleziony!'
        ]);

        return redirect()->route('animal.index')->with('success', 'SMS sent succesfully');
    }

}