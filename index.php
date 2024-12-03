<?php

require 'src/Todo.php';

require 'helpers.php';

require 'src/Router.php';

$router = new Router();

$todo = new Todo();

$router->get('/', callback: function () use ($todo) {
    $todos = $todo->get();
    view('home', [
        'todos' => $todos
    ]);
});

$router->get('/todos', function () use ($todo) {
    $todos = $todo->get();
    view('todos', [
        'todos' => $todos
    ]);
});

$router->post('/store', function () use ($todo) {
    if (!empty($_POST['title']) && !empty($_POST['due_date'])) {
        $todo->store($_POST['title'], $_POST['due_date']);
    }
    header('Location: /todos');
    exit();
});

$router->get('/complete/{id}', function ($todoId) use ($todo) {
        $todo->complete($todoId);
        header('Location: /todos');
        exit();
});

$router->get('/inProgress/{id}', function ($todoId) use ($todo) {
        $todo->inProgress($todoId);
        header('Location: /todos');
        exit();
});

$router->get('/pending/{id}', function ($todoId) use ($todo) {
        $todo->pending($todoId);
        header('Location: /todos');
        exit();
});