<?php
class Categories {
    private static $title = 'Categories';
    private static $icon = 'fa fa-folder';

    public function index() {

        $categories = ORM::for_table('categories')->raw_query("
                SELECT c.*
                    ,count(t.id) AS total
                FROM categories c
                LEFT OUTER JOIN todos t ON c.id = t.categories_id
                GROUP BY c.name
                ORDER BY c.name
            ")->find_array();

        $categories = Categories_Presenter::getCategories($categories);

        Flight::render('categories', array('title' => self::$title, 'categories' => $categories, 'icon' => self::$icon));
    }

    public function add_or_update() {
        $pk = $_POST['pk'];
        $value = $_POST['value'];

        // update category
        if ($pk) {
            if (empty($value)) {
                header('HTTP 400 Bad Request', true, 400);
                echo "Cannot be empty!";
                exit;
            }

            $category = ORM::for_table('categories')->where('id', $pk)->find_one();
            $category->name = $value;

            $message = 'Category added successfully :)';
            if (!$category->save()) {
                $message = 'Error adding category :(';
            }

            echo $message;

            exit;
        }

        // add category
        $name = $_POST['category'];

        if (!$name) {
            flashRedirect('categories', 'Error: Category Name is required!');
        }

        // check if same category name already exists
        $exists = ORM::for_table('categories')->where('name', $name)->find_one();

        if ($exists) {
            flashRedirect('categories', 'Error: Category with specified name already exists, please choose another name!');
        }

        // save category in table
        $categories = ORM::for_table('categories')->create();
        $categories->name = $name; // setting properties

        $message = 'Category added successfully :)';
        if (!$categories->save()) {
            $message = 'Error adding category :(';
        }

        flashRedirect('categories', $message);
    }
}