<?php

namespace App\Mail;

use App\Models\Sales;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimEmailVerifikasi extends Mailable
{
    use Queueable, SerializesModels;
    public $data_emailverif;
    public $sales;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sales $sales, $data_emailverif)
    {
        $this->sales = $sales;
        $this->data_emailverif = $data_emailverif;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Data Pembelian Unit Sudah Diverifikasi',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.KirimEmailVerif',
        );


    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
