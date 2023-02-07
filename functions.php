<?php 

    function addTodo($todo_list, $language){
        $todo_list[] = $language;

        file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));

        return $todo_list;
    }
    
    function deleteTodo($todo_list, $index){
        
        unset($todo_list[$index]);

        file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));

        return $todo_list;
    }
    
    function editTodo($todo_list, $post){
        
        $replacement = array( 
            $post['edit'] => array(
                "language"  => $post['language_edit'],
                "done"      => false
            )
        );
        
        $todo_list = array_replace($todo_list, $replacement);
        
        file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));
        
        return $todo_list;
    }
?>