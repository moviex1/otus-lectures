<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ask';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');

        $this->output->writeln("Hello $name!");
    }
}
