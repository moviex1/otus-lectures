<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArgumentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test {firstName} {SecondName?}';

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
        $user = $this->input->getArgument('firstName') . ' ' . $this->input->getArgument('SecondName');
        $this->output->writeln("Hello $user!");

        return Command::SUCCESS;
    }
}
