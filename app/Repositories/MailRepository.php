<?php

namespace App\Repositories;

use App\Mail\WebsiteMail;
use Illuminate\Support\Facades\Mail;

class MailRepository
{

    public function sendMail($mail,$subject,$body)
    {

        Mail::to($mail)->send(new WebsiteMail($subject,$body));
    }
}
