<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChoiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:choice';

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
        $name = $this->choice('Select name:', ['Taylor', 'Dayle'], 0);

        dd($name);
    }
}
