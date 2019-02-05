<?php
class Todos {
    private static $icon = 'fa fa-check-square-o';

    public function index() {
        $id = uriSegment(3);

        if ($id === '0') {
            $title = 'Pending Todos';
        } elseif ($id === '1') {
            $title = 'Completed Todos';
        } else {
            $title = 'All Todos';
        }

        $where = '';

        if (strlen($id)) {
            $where = "WHERE t.completed = '$id'";
        }

        if ($id > 1) {
            $title = 'Category Todos';
            $where = "WHERE c.id = '$id'";
        }

        $todos = ORM::for_table('todos')->raw_query("
                SELECT t.*, c.name as category, c.id as cid
                FROM todos t
                LEFT OUTER JOIN categories c ON t.categories_id = c.id
                $where
                ORDER BY t.completed, t.id asc
            ")->find_array();

        $todos = Todos_Presenter::getTodos($todos);
        //pretty_print($todos);

        Flight::render('todos', array('title' => $title, 'todos' => $todos, 'icon' => self::$icon));
    }

    public function addTodo() {
        $category = $_POST['category'];
        $todo = $_POST['todo'];
        $detail = $_POST['detail'];

        $todo = strip_tags($todo);

        // fix empty content
        // $detail = str_replace('<p></p>', '', $detail);

        if (!$category || !$todo) {
            $message = 'Error adding todo item :(';
            echo $message;
            exit;
        }

        $todos = ORM::for_table('todos')->create();
        $todos->todo = $todo;
        $todos->categories_id = $category;
        $todos->extra = $detail;
        $todos->created = dateFormat(getTimeDate(), true);

        $message = 'Todo item added successfully :)';
        if (!$todos->save()) {
            $message = 'Error adding todo item :(';
        }

        echo $message;
    }

    public function updateTodo() {
        $id = $_POST['id'];
        $category = $_POST['category'];
        $todo = $_POST['todo'];
        $detail = $_POST['detail'];

        $todo = strip_tags($todo);

        // fix empty content
        // $detail = str_replace('<p></p>', '', $detail);

        if (!$category || !$todo) {
            $message = 'Error adding todo item :(';
            echo $message;
            exit;
        }

        $todos = ORM::for_table('todos')->find_one($id);
        $todos->todo = $todo;
        $todos->categories_id = $category;
        $todos->extra = $detail;

        $message = 'Todo item updated successfully :)';
        if (!$todos->save()) {
            $message = 'Error updating todo item :(';
        }

        echo $message;
    }

    public function completed() {
        $id = $_POST['id'];

        $todo = ORM::for_table('todos')->find_one($id);
        $todo->completed = '1';
        $todo->completedon = dateFormat(getTimeDate(), false);

        $message = 'Todo item completed successfully :)';
        if (!$todo->save()) {
            $message = 'Error completing todo item :(';
        }

        echo $message;
    }

    public function active() {
        $id = $_POST['id'];

        $todo = ORM::for_table('todos')->find_one($id);
        $todo->completed = '0';

        $message = 'Todo item set active successfully :)';
        if (!$todo->save()) {
            $message = 'Error setting todo item as active :(';
        }

        echo $message;
    }

    public function deletealltodos() {
        $result = ORM::for_table('todos')->delete_many();

        $message = 'All Todo items deleted successfully !';
        if (!$result) {
            $message = 'Error deleting todo items !';
        }

        echo $message;
    }

    public function cleardb() {
        $result = ORM::for_table('todos')->delete_many();

        $message = 'Todos database cleared successfully !';

        if ($result) {
            $result = ORM::for_table('categories')->delete_many();

            if (!$result) {
                $message = 'Error clearing categories !';
            }
        } else {
            $message = 'Error clearing todo items !';
        }

        echo $message;
    }
}
