<?php

namespace App\Console\Commands;

use App\Jobs\ProcessHorasRecargos;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessRecargos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recargos:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permite poner en cola el proceso de generacion de recargos de la semana';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('***Inicio Procesamiento Semana***');
        dispatch(new ProcessHorasRecargos);
    }
}
