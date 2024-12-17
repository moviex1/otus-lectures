<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;

class PromptsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompts';

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
        $name = text(
            label: 'What is your name?',
            placeholder: 'E.g. Taylor Otwell',
            default: 'Taylor Otwell',
            hint: 'This will be displayed on your profile.',
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The name must be at least 3 characters.',
                strlen($value) > 255 => 'The name must not exceed 255 characters.',
                default => null,
            },
            required: true,
//            validate: ['name' => 'required|max:255|min:3']
        );

        $this->output->writeln("Hello, $name!");
    }
}
