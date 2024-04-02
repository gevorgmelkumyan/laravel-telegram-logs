<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class LogMessageJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected ?string $message) {
        $this->queue = 'log';
    }

    public function handle(): void {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHANNEL_ID');

        try {
            $client = new Client();
            $client->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'json' => [
                    'chat_id' => $chatId,
                    'text' => $this->message,
                    'parse_mode' => 'HTML',
                ]
            ]);
        } catch (Throwable) {}
    }
}
