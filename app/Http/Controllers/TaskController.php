<?php

namespace App\Http\Controllers;


use App\Jobs\CreateCategoriesJob;
use App\Jobs\CreateTasksJob;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\JsonResponse;

class TaskController extends Controller
{
    public function sync(): JsonResponse
    {
        CreateTasksJob::dispatch(2000)->onConnection('sync');

        return response()->json([
            'success' => true,
        ]);
    }

    public function database(): JsonResponse
    {
        CreateTasksJob::dispatch(1000)->onConnection('database');

        return response()->json([
            'success' => true,
        ]);
    }

    public function redis(): JsonResponse
    {
        CreateTasksJob::dispatch(1000)->onConnection('redis');

        return response()->json([
            'success' => true,
        ]);
    }

    public function batches(): JsonResponse
    {
        $batch = Bus::batch([
            new CreateCategoriesJob(3000),
            new CreateTasksJob(3000),
        ])->then(function (Batch $batch) {
            Log::info('All jobs completed successfully');
        })->catch(function (Batch $batch, \Throwable $e) {
            Log::error('Job failed', ['exception' => $e]);
        })->finally(function (Batch $batch) {
            Log::info('Batch finished');
        })->onConnection('database')->dispatch();

        return response()->json([
            'success' => true,
            'batch_id' => $batch->id,
        ]);
    }

    public function afterResponse(): JsonResponse
    {
        CreateTasksJob::dispatch(1000)->afterResponse();

        return response()->json([
            'success' => true,
        ]);
    }

    public function delay(): JsonResponse
    {
        CreateTasksJob::dispatch(1000)->delay(now()->addSeconds(10));

        return response()->json([
            'success' => true,
        ]);
    }
}
