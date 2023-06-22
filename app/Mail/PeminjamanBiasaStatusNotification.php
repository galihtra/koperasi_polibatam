<?php

namespace App\Mail;

use App\Models\PeminjamanBiasa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PeminjamanBiasaStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $loan;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PeminjamanBiasa $loan)
    {
        //
        $this->loan = $loan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pemberitahuan Pinjaman Diverifikasi')
            ->view('emails.peminjaman_biasa_status_notification');
    }
}
