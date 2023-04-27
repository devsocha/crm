<?php

namespace Tests\Unit;

use App\Mail\WebsiteMail;
use App\Models\User;
use App\Services\MailService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
    public function test_send_mail()
    {
        $mail = 'test@test.pl';
        $subject = 'test';
        $body = $subject;
        Mail::to($mail)->send(new WebsiteMail($subject, $body));
        $this->assertTrue(true);
    }

    public function test_create_user()
    {
        $user = new User();
        $user->name = 'konrad';
        $user->login = 'admin';
        $user->email = 'test@test.pl';
        $user->password = Hash::make('admin');
        $user->role = 1;
        $user->save();
        $this->assertDatabaseHas('users',['name'=>'konrad']);
    }

    public function test_delete_user_by_email()
    {
        User::where('email','test@test.pl')->delete();
        $this->assertDatabaseMissing('users',['email'=>'test@test.pl']);
    }

}
