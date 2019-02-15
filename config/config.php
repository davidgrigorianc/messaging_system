<?php
//for parameters like name of site or database configuration
Config::set('site_name','Messaging System');

Config::set('routes',array(
    'default' => '',
//    'error' => 'error',
//    'admin' => 'admin'
));

Config::set('default_route','default');

Config::set('default_controller','pages');

Config::set('default_action','index');

Config::set('db_host', 'localhost');
Config::set('db_user', 'root');
Config::set('db_pass', '');
Config::set('db_name', 'messaging_system');
Config::set('db_char', 'utf8');

Config::set('debug', true);