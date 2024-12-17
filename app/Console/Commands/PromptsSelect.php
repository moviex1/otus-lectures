<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\select;

class PromptsSelect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompts-select';

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
        $value = select(
            label: 'What role should the user have?',
            options: [
                'member' => 'Member',
                'contributor' => 'Contributor',
                'owner' => 'Owner',
            ],
            default: 'owner'
        );

        dd($value);
    }
}
