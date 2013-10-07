<?php

class User extends AppModel {
    static $table_name = 'user';

    static $has_many = array(
            array('announcements', 'class_name'=>'Announcement')
        );
}