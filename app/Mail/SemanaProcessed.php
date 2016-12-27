<?php

namespace App\Mail;

use App\SemanasProcesada;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SemanaProcessed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $semana;
    protected $html;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SemanasProcesada $semana, $html = '')
    {
        $this->semana = $semana;
        $this->html = $html;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recargos.success')
            ->with([
                'semana' => $this->semana->semana,
                'anio' => $this->semana->anio,
                'fecha' => $this->semana->created_at,
                'html' => $this->html
            ]);
    }
}
