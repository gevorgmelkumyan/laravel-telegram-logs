<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use function Laravel\Prompts\text;

class GenerateLogs extends Command {
    protected $signature = 'app:generate-logs {--count=}';

    protected $description = 'Generate logs';

    public function handle(): void {
        $this->info('=== START ===');
        $count = $this->option('count') ?? 1;

        $this->info("Count: $count");

        for ($i = 0; $i < $count; ++$i) {
            Log::debug('Some random log', [
                'some_uuid' => Str::uuid(),
                'some_id' => random_int(10, 1000),
                'some_text' => Str::random(32),
            ]);

            $this->info('Successfully sent a log');
        }

        $this->info('=== END ===');
    }
}
