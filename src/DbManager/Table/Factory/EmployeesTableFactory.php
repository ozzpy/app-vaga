<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 12:42 AM
 */

namespace DbManager\Table\Factory;

use DbManager\Model\Employees;
use DbManager\Table\EmployeesTable;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class EmployeesTableFactory
 * @package DbManager\Table\Factory
 */
class EmployeesTableFactory
{

    /**
     * @param ContainerInterface $container
     * @return EmployeesTable
     */
    public function __invoke(ContainerInterface $container)
    {
        $dbAdapter          = $container->get( AdapterInterface::class );
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype( new Employees());
        $tableGateway       = new TableGateway('employees', $dbAdapter, null, $resultSetPrototype);
        return new EmployeesTable($tableGateway);
    }
}