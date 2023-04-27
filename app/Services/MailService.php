<?php

namespace App\Services;

use App\Repositories\MailRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class MailService
{
    protected $mailRepository;
    protected $userRepository;

    public function __construct(MailRepository $mailRepository, UserRepository $userRepository)
    {
        $this->mailRepository = $mailRepository;
        $this->userRepository = $userRepository;
    }

    public function sendResetPasswordEmail($data)
    {
        $validator = Validator::make($data,['email'=>'required|email']);
        $email = $data['email'];
        $user = $this->userRepository->getUserByMail($email);

        if($user){
            $url = url('/restart-hasla/');
            $token = hash('sha256',$email.time());
            $link =  $url.'/'.$token;
            $subject = 'Restart twojego hasła w witrynie DevSocha';
            $body = 'Cześć, <br><br> Aby zrestartować hasło w naszej witrynie kliknij w poniższy link<br><a href="'.$link.'">LINK</a><br><br> Pozdrawiamy,<br>Cały Zespół DevSocha';
            $this->mailRepository->sendMail($email,$subject,$body);
            return 'Poprawnie wysłano maila';
        }
        return 'Podano błędny email';

    }
}
