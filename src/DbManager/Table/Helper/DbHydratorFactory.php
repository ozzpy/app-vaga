<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 12:37 PM
 */

namespace DbManager\Table\Helper;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\Reflection as ReflectionHydrator;

/**
 * Class DbHydratorFactory
 * @package DbManager\Table\Helper
 */
class DbHydratorFactory
{

    /**
     * @var TableGateway
     */
    protected $tableGateway;

    /**
     * @var \Zend\Db\Adapter\AdapterInterface
     */
    protected $dbAdapter;

    /**
     * DbHydratorFactory constructor.
     * @param TableGateway $tableGateway
     */
    protected function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway   = $tableGateway;
        $this->dbAdapter      = $this->tableGateway->getAdapter();
        $this->table          = $this->tableGateway->getTable();
        $this->tableColumns   = $this->tableGateway->getColumns();
    }

    /**
     * @return false|string
     */
    protected function getCurrentDate()
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * @param $result
     * @param $model
     * @return HydratingResultSet
     */
    protected function hydrate($result, $model)
    {
        return $this->hydrateByModel($result,$model);
    }

    /**
     * @param $result
     * @param $model
     * @return HydratingResultSet
     */
    protected function hydrateByModel($result, $model)
    {
        $resultSet = new HydratingResultSet( null, $model );  // follow values defined in model
        $resultSet->initialize($result);
        return $resultSet;
    }

    /**
     * @param $result
     * @param $model
     * @return HydratingResultSet
     */
    protected function hydrateByDatabase($result, $model)
    {
        $resultSet = new HydratingResultSet( new ReflectionHydrator(), $model ); // follow values defined in database
        $resultSet->initialize($result);
        return $resultSet;
   }

}