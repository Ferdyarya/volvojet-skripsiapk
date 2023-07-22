<?php

namespace App\Mail;

use App\Models\Sales;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimanPending extends Mailable
{
    use Queueable, SerializesModels;
    public $data_emailpending;
    public $sales;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sales $sales, $data_emailpending)
    {
        $this->sales = $sales;
        $this->data_emailpending = $data_emailpending;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Pengiriman Tertunda Karena Terjadi Masalah Sistem',
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
            view: 'mail.KirimanTertunda',
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
