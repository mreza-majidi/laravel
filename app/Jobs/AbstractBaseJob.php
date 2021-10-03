<?php


namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

abstract class AbstractBaseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    abstract public function handle();

    /**
     * @param Exception|null $exception
     */
    public function fail($exception = null)
    {
        if ($exception) {
            Log::channel('worker')->error($exception->getMessage(), $exception->getTrace());
        }
    }
}
