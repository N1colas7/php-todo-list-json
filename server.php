<?php 

    include __DIR__ .'/functions.php';

    $string = file_get_contents('todo-list.json');
    
    $todo_list = json_decode($string, true);
    
    if(isset($_POST['language'])){
        $todo_list = addTodo($todo_list, $_POST);
    }

    if(isset($_POST['delete'])){
        $todo_list = deleteTodo($todo_list, $_POST['delete']);
    }

    if(isset($_POST['edit'])){
        $todo_list = editTodo($todo_list, $_POST);
    }

    header('Content-Type: application/json');
    echo json_encode($todo_list);
?>