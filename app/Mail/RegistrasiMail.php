<?php

namespace App\Mail;

use App\Models\Registrasi;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Registrasi $registrasi) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✅ Registrasi Hackathon Rumah Pendidikan 2026 Berhasil',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registrasi-berhasil',
        );
    }
}