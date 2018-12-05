<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 01:00 PM
 */
define('DBHOST','localhost');
define('DBNAME','testevaga');
define('DBUSER','webmaster');
define('DBPASS','in147369');


use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\AdapterServiceFactory;

##################################
### RETURN ARRAY CONFIGURATION ###
##################################

return [
    'db' => [
        'driver' => 'Pdo',
        'dsn'    => 'mysql:dbname='.DBNAME.';host='.DBHOST,
        'driver_options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ],
        'username' => DBUSER,
        'password' => DBPASS,
    ],
    'db-export'=>[
        'host'   => DBHOST,
        'dbname' => DBNAME,
        'user'   => DBUSER,
        'pass'   => DBPASS
    ],
    'dependencies' => [
        'factories'  => [
            Adapter::class => AdapterServiceFactory::class,
            AdapterInterface::class => AdapterServiceFactory::class,
        ],
    ],
];