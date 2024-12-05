<?php

require 'src/Bot.php';

$bot = new Bot();

$update = json_decode(file_get_contents('php://input')); // Obyekt sifatida

if (isset($update->message)) {
    $from_id = $update->message->from->id;
    $message = $update->message->text;
    $username = $update->message->from->first_name;

    if ($message == '/start') {
        $reply_keyboard = json_encode([
            'keyboard' => [
                [
                    ['text' => 'Todos'],
                    ['text' => 'Add Task'],
                ]
            ],
            'resize_keyboard' => true,
        ]);

        $bot->makeRequest('sendMessage', [
            'chat_id' => $from_id,
            'parse_mode' => 'HTML',
            'text' => 'Xush kelibsiz botimiz yaqinda ishlaydi',
            'reply_markup' => $reply_keyboard,
        ]);
    }
}
