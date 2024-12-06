<?php

use App\Bot;

$bot = new Bot();

$update = json_decode(file_get_contents('php://input'));

if (isset($update->message)) {
    var_dump(1);
    $from_id = $update->message->from->id;
    $message = $update->message->text;
    $username = $update->message->from->first_name;

    if ($message == '/start') {
        var_dump(2);
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