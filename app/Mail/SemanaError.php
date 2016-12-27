<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SemanaError extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

//    protected $semana;
//    public $error;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dt = Carbon::now();
        exec('tail -n 200 ' . storage_path('logs/laravel.log') . ' > /tmp/output.txt');
        return $this->view('emails.recargos.error')
            ->with([
                'semana' => $dt->weekOfYear - 1,
                'anio' => $dt->year,
                'fecha' => 'Desde ' . ($dt->format('Y-m-d')) . ' hasta ' . $dt->addDays(6)->format('Y-m-d'),
                'error' => 'Ha ocurrido un error (ver archivo adjunto)',
            ])
            ->attach('/tmp/output.txt', array(
                    'as' => 'week-' . ($dt->weekOfYear - 1) . '-' . $dt->year . '-error.txt',
                    'mime' => 'text/plain'
                ));
    }
}
