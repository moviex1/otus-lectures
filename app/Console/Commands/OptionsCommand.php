<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:options {--firstName=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        dd($this->input->getOption('firstName'));

        return Command::SUCCESS;
    }
}
