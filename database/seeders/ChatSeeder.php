<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ChatSeeder extends Seeder
{
    public function run(): void
    {
        Chat::factory(100)
            ->create()
            ->each(function ($chat) {
                $messages = collect();

                for ($i = 0; $i < rand(10, 100); $i++) {
                    $randomDate = Carbon::now()->subDays(rand(0, 365))->setTime(rand(0, 23), rand(0, 59), 0);

                    $messages->push(
                        Message::create([
                            'chat_id' => $chat->id,
                            'text' => fake()->sentence(rand(5, 15)),
                            'created_at' => $randomDate->format('Y-m-d H:i:s'),
                            'updated_at' => now(),
                        ]),
                    );
                }

                $chat->update([
                    'last_message_id' => $messages->sortByDesc('created_at')->first()?->id,
                ]);
            });
    }
}
