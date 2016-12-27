<?php

namespace App\Mail;

use App\SemanasProcesada;
use Carbon\Carbon;
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
        $dt = Carbon::parse($this->semana->anio . 'W' . ($this->semana->semana));
        Carbon::setTestNow($dt);
        $domingo = new Carbon('last sunday');
        $data = [
            'semana' => $this->semana->semana,
            'anio' => $this->semana->anio,
            'fecha' => 'Desde ' . ($domingo->format('Y-m-d')) . ' hasta ' . $domingo->addDays(6)->format('Y-m-d'),
            'html' => $this->html
        ];
        Carbon::setTestNow(); // Clearing now

        return $this->view('emails.recargos.success')
            ->with($data);
    }
}
