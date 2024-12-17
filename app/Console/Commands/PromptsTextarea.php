<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\textarea;

class PromptsTextarea extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompts-textarea';

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
        $story = textarea(
            label: 'Tell me a story.',
            placeholder: 'This is a story about...',
            hint: 'This will be displayed on your profile.'
        );

        dd($story);
    }
}
