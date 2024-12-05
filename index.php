<?php

require 'src/Todo.php';

require 'helpers.php';

require 'src/Router.php';

require 'bootstrap.php';

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

$router->get('/todos/{id}/delete', function ($todoId) use ($todo) {
    $todo->destroy($todoId);
    redirect('/todos');
});

$router->get('/todos/{id}/edit', function ($todoId) use ($todo) {
    $getTodo = $todo->getTodo($todoId);
    view('edit', [
        'todo' => $getTodo
    ]);
});

$router->put('/todos/{id}/update', function ($todoId) use ($todo) {
    $todo->update(
        $todoId,
        $_POST['title'],
        $_POST['status'],
        $_POST['due_date']
    );
    redirect('/todos');
});