<?php

namespace App\Jobs;

use Database\Factories\TaskFactory;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateTasksJob implements ShouldQueue
{
    use Queueable, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $count, public int $id = 3)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        $this->fail();
        $this->release();
        TaskFactory::new()->count($this->count)->create();
    }

//    public function uniqueId(): int
//    {
//        return $this->id;
//    }
//
//    public function retryUntil()
//    {
//        return now()->addSeconds(5);
//    }
}
