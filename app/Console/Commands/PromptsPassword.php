<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\password;

class PromptsPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompts-password';

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
        $password = password(
            label: 'What is your password?',
            placeholder: 'password',
            hint: 'Minimum 8 characters.'
        );

        dd($password);
    }
}
