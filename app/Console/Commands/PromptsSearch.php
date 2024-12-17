<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Console\Command;
use function Laravel\Prompts\search;

class PromptsSearch extends Command
{
    public function __construct(
        private CategoryService $categoryService,
    )
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompts-search';

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
        $name = search(
            label: 'Search for the user that should receive the mail',
            options: fn (string $value) => strlen($value) > 0
                ? $this->categoryService->findAllByName($value)
                : [],
        );

        dd($name);
    }
}
