<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\confirm;

class PromptsConfirm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompts-confirm';

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
        $isConfirmed = confirm(
            label: 'Do you accept the terms?',
            default: false,
            yes: 'I accept',
            no: 'I decline',
            hint: 'The terms must be accepted to continue.'
        );

        dd($isConfirmed);
    }
}
