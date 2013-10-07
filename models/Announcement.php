<?php

class Announcement extends AppModel {

    static $table_name = 'announcement';

    static $belongs_to = array(
            array('user')
        );
}