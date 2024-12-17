<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;

class PromptsApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompts-app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle(): int
    {
        while (confirm(
            label: 'Do you want to create a new category?',
        )) {
            $categoryName = text(
                label: 'Category name',
                validate: ['name' => 'required|max:255|min:3|unique:categories,name'],
            );

            Category::query()->create(
                ['name' => $categoryName]
            );
        }

        info('We\'ve done with creating categories, let\'s see which categories we have!');

        table(
            headers: ['Name'],
            rows: Category::all(['name'])->toArray(),
        );

        return Command::SUCCESS;
    }
}
