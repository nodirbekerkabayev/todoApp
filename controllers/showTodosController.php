<?php
$todos = (new \App\Todo())->get();
view('todos', [
    'todos' => $todos
]);