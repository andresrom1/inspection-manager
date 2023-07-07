<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Inspection;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando de testeo que envia a la ruta / cada un minuto';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $inspection = Inspection::get()->firstOrFail();
        
        $inspection->dominio = $inspection->dominio . "Z";
        $inspection->update();

        return Command::SUCCESS;
    }
}
