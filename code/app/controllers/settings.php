<?php
class Settings {
    private static $title = 'Settings';
    private static $icon = 'glyphicon-cog';

    public function index() {

        $html = '';
        foreach (glob('dbbackups/*.sqlite') as $filename) {
            if (is_file($filename)) {
                $file = str_replace('dbbackups/', '', $filename);
                $html .= '
                    <input class="dbbackup" name="backup" id="' . $filename . '" type="radio" value="' . $filename . '">
                    <label for="'.$filename.'">'.$file.'</label><br>';
            }
        }


        Flight::render('settings', array('title' => self::$title, 'backups' => $html, 'icon' => self::$icon));
    }
}