<?php

require 'src/Todo.php';

require 'helpers.php';

require 'src/Router.php';

$router = new Router();

$todo = new Todo();

$router->get('/', function () {
    echo '
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <a href="/todos" style="
            display: inline-block;
            width: 300px;
            height: 100px;
            line-height: 100px;
            font-size: 20px;
            text-align: center;
            text-decoration: none;
            color: white;
            background-image: url(\'https://images.pexels.com/photos/628241/pexels-photo-628241.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1\');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        " onmouseover="this.style.transform=\'scale(1.1)\'; this.style.boxShadow=\'0 6px 12px rgba(0, 0, 0, 0.3)\';"
        onmouseout="this.style.transform=\'scale(1)\'; this.style.boxShadow=\'0 4px 8px rgba(0, 0, 0, 0.2)\';">
            Bosh sahifa
        </a>
    </div>';
});




$router->get('/todos', function () use ($todo) {
    $todos = $todo->get();
    view('home', [
        'todos' => $todos
    ]);
});

$router->post('/store', function () use ($todo) {
    if (!empty($_POST['title']) && !empty($_POST['due_date'])) {
        $todo->store($_POST['title'], $_POST['due_date']);
    }
    header('Location: /');
    exit();
});

$router->get('/complete', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $todo->complete($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/inProgress', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $todo->inProgress($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/pending', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $todo->pending($_GET['id']);
        header('Location: /todos');
        exit();
    }
});