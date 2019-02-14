<?php
//for parameters like name of site or database configuration
Config::set('site_name','Messaging System');

Config::set('routes',array(
    'default' => '',
    'admin' => 'admin'
));

Config::set('default_route','default');

Config::set('default_controller','pages');

Config::set('default_action','index');
