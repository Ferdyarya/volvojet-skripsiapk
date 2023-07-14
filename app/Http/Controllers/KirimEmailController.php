<?php

namespace App\Http\Controllers;

use App\Mail\KirimEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{

    Public function KirimEmail()
    {
        $pesan = "<p><b>Terimakasih Sudah Membeli Unit Kami</b></p>";
        $pesan = "<p>Pesanan akan diproses segera dari pihak pusat kami </p>";

        $data_email = [
            'subject' =>'Terimakasih Anda Telah Melakukan Pembelian Unit',
            'sender_name' =>'ferdyar5@gmail.com','Admin PT Indotruck Utama Banjarmasin',
            'isi' => $pesan
        ];

        Mail::to("ferdyar5@gmail.com")->send(new KirimEmail($data_email));
        
        return '<h1>success mengirimkan email</h1>';
    }
}
