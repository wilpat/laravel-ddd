<?php

declare(strict_types=1);

namespace Domains\Property\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BatchPropertyCreation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Collection $properties)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $chunks = $this->properties->chunk(1);
        foreach ($chunks as $chunk) {
            try {
                DB::table('properties')->insert($chunk->toArray());
                //code...
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
