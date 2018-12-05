<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 12:48 PM
 * The configuration provider for the DbManager module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
namespace DbManager;


/**
 * Class ConfigProvider
 * @package DbManager
 */
class ConfigProvider
{

    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    /**
     * Returns the container dependencies
     * @return array
     */
    public function getDependencies()
    {

        return [

            'invokables' => [

            ],
            'factories'  => [

                Table\EmployeesTable::class => Table\Factory\EmployeesTableFactory::class,

            ],

        ];

    }

}