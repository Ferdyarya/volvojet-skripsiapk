<?php

namespace App\Http\Controllers;

use App\Mail\KirimEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{

    Public function KirimEmail()
    {


        // $data_email = [
        //     'subject' =>'Terimakasih Anda Telah Melakukan Pembelian Unit',
        //     'sender_name' =>'ferdyar5@gmail.com',
        // ];

        // Mail::to("ferdyar5@gmail.com")->send(new KirimEmail($data_email));

        // return '<h1>success mengirimkan email</h1>';
    }
}
