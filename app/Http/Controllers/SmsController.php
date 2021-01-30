<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Models\Animal;
use App\Models\User;

class SmsController extends Controller
{


    public function sendSms(){

        $animal = new Animal; 
        $chip = $animal->chip;
        $user = new User;
        $sender = $user->phone;

        Nexmo::message()->send([
            'to'   => '+48575070195',
            'from' => '16105552344',
            'text' => 'To jest sms z naszej apki Laravela. Zwierzak o chipie: {$chip} został znaleziony przez użytkownika o numerze: {$sender} '
        ]);

        return redirect()->route('animal.index')->with('success', 'SMS sent succesfully');
    }

}