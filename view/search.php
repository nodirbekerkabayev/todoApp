<?php
require 'view/components/header.php';
?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Search Results</h1>
            <ul class="list-group">
                <?php
                // Qidiruv so'rovini olish
                $searchQuery = isset($_POST['search']) ? trim($_POST['search']) : '';

                $todos = (new \App\Todo())->search($_POST['search']);

                // Qidiruv natijalarini filtr qilish
                $filteredTodos = array_filter($todos, function ($todo) use ($searchQuery) {
                    return stripos($todo['title'], $searchQuery) !== false;
                });

                if (!empty($filteredTodos)) {
                    foreach ($filteredTodos as $todo) {
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
                } else {
                    echo '<li class="list-group-item">No results found for "' . htmlspecialchars($searchQuery) . '"</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php
require 'view/components/footer.php';
?>
