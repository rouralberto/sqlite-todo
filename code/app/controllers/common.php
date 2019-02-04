<?php
class Common {

    // common delete for tables
    public function delete() {
        $id = $_POST['id'];
        $page = $_POST['page'];

        $table = ORM::for_table($page)->find_one($id);

        if (!$table->delete()) {
            echo 'Error Deleting :(';
        } else {
            echo 'Deleted Successfully !';
        }
    }

    // backup database
    public function backup() {
        $name = $_POST['name'];

        if (!trim($name)) {
            echo 'Error: no backup filename specified!';
            exit;
        }

        if (!file_exists('dbbackups')) {
            mkdir('dbbackups', 0777, true);
        }

        if (chmod('dbbackups', 0777)) {
            $destination = 'dbbackups/' . $name . '.sqlite';

            if (copy('db.sqlite', $destination)) {
                echo 'Database backup successful :)';
            } else {
                echo 'Error occured while making backup :(';
            }
        }

    }

    // restore database
    public function restore() {
        $name = $_POST['name'];

        if (!trim($name)) {
            echo 'Error: no backup filename specified!';
            exit;
        }

        $destination = 'db.sqlite';

        if (copy($name, $destination)) {
            echo 'Database restore successful :)';
        } else {
            echo 'Error restoring database backup :(';
        }

    }
}