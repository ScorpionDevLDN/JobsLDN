<?php

namespace App\Traits;


use App\Models\{emailVertification};

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

trait EmailVerification
{

    function encrypt_decrypt($action, $string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxx';
        $secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }


    public function SendVerification($data)
    {
        $eV = emailVertification::create($data);
        $this->sendEmail($data);
    }


    public function sendEmail($data)
    {
        $token = $this->encrypt_decrypt('encrypt', $data['entity_type'] . '__' . $data['entity_id']);
        Mail::send('email.VerificationLink', ['token' => $token, 'intro_subject' => $data['intro_subject']], function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject($data['verification_subject']);
        });
    }
}
