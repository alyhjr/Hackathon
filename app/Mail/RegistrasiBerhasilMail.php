<?php

namespace App\Mail;

use App\Models\CalonPeserta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrasiBerhasilMail extends Mailable
{
    use Queueable, SerializesModels;

    public CalonPeserta $calon;

    public function __construct(CalonPeserta $calon)
    {
        $this->calon = $calon;
    }

    public function build()
    {
        return $this->subject('Registrasi Berhasil - Hackathon Rumah Pendidikan 2026')
            ->view('emails.registrasi-berhasil')
            ->with([
                'calon' => $this->calon,
            ]);
    }
}