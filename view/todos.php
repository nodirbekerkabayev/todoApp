<?php
require 'view/components/header.php';
?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="todo-body my-5 p-3">
                <h1 class="text-center todo-text">Todo App</h1>
                <form method="POST" action="/search">
                    <div class="input-group flex-nowrap col-md-4">
        <span class="input-group-text" id="addon-wrapping">
            <i class="fas fa-search"></i>
        </span>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                               aria-describedby="addon-wrapping" name="search" required>
                        <button name="search" type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <form method="POST" action="/store" class="mt-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                               aria-label="Recipient's username" aria-describedby="button-addon2"
                               name="title"
                               required
                        >
                        <input type="datetime-local" class="form-control" placeholder="Recipient's username"
                               aria-label="Recipient's username" aria-describedby="button-addon2"
                               name="due_date"
                               required
                        >
                        <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                    </div>
                </form>

                <ul class="list-group">

                    <?php
                    /** @var TYPE_NAME $todos */

                    foreach ($todos as $todo) {
                        echo '
                          <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                                <a href="/todos/' . $todo["id"] . '/edit" class="btn btn-outline-primary">Edit</a>
                            <a href="/todos/' . $todo["id"] . '/delete" class="btn btn-outline-danger">Delete</a> 
                            </div>
                        </li>
                            ';
                    }
                    ?>
            </div>
            </ul>
        </div>
    </div>
<?php
require 'view/components/footer.php';
?>