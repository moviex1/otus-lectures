<?php

namespace App\Jobs;

use Database\Factories\CategoryFactory;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateCategoriesJob implements ShouldQueue
{
    use Queueable, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $count)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        CategoryFactory::new()->count($this->count)->create();
    }
}
