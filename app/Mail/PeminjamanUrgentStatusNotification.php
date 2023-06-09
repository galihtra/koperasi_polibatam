<?php

namespace App\Mail;

use App\Models\PeminjamanUrgent; // Update the namespace based on your actual model namespace
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PeminjamanUrgentStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $loan;

    /**
     * Create a new message instance.
     *
     * @param PeminjamanUrgent $loan
     * @return void
     */
    public function __construct(PeminjamanUrgent $loan)
    {
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
            ->view('emails.peminjaman_urgent_status_notification');
    }
}