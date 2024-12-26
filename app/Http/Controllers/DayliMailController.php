<?php

namespace App\Http\Controllers;

use App\Mail\DayliMail;
use Illuminate\Support\Facades\Mail;

class DayliMailController extends Controller
{
    public function sendDayliMail() {
        //put in here emails that u want to recieve the messages
        $toEmail = 'raylanwork@gmail.com';
        $subject = 'Dayli Notification';
        $mailMessage = 'Tomar o anticoncepcional';

        $response = Mail::to($toEmail)->send(new DayliMail($mailMessage, $subject));

        dd($response);
    }
}
