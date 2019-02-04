<?php
class Dashboard {
    private static $title = 'Dashboard';
    private static $icon = 'glyphicon-home';

    public function index() {

        $todos = ORM::for_table('todos')->raw_query("
                SELECT t.todo, c.id as cid, c.name as category
                FROM todos t
                LEFT OUTER JOIN categories c ON t.categories_id = c.id
                WHERE t.completed = '0'
                ORDER BY t.id desc
                LIMIT 10
            ")->find_array();

        $todos = Todos_Presenter::getTodosList($todos);

        $activeTodos = ORM::for_table('todos')->where('completed', '0')->find_result_set();
        $activeTodosCount = count($activeTodos);

        Flight::render('dashboard', array('title' => self::$title, 'todos' => $todos, 'totalActive' => $activeTodosCount, 'icon' => self::$icon));
    }
}