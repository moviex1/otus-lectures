<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutocompletionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:autocompletion';

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
        $name = $this->anticipate('What is you name?', ['Taylor', 'Dayle']);

        dd($name);
    }
}
