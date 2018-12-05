<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 12:39 AM
 */

namespace DbManager\Table;

use DbManager\Model\Employees;
use DbManager\Table\Helper\DbHydratorFactory;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;
use Exception;


/**
 * Class EmployeesTable
 * @package DbManager\Table
 */
class EmployeesTable extends DbHydratorFactory
{

    /**
     * @var string
     */
    private $primary_id;

    /**
     * EmployeesTable constructor.
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        parent::__construct($tableGateway);
        $this->primary_id = "id";
    }

    /**
     * @param array $data
     * @return int
     * @throws Exception
     */
    public function save(array $data)
    {
        $id = isset($data[$this->primary_id]) ?  $data[$this->primary_id] : null;
        if ( is_null($id) ){
            if ($this->tableGateway->insert($data) ){
                return $this->tableGateway->lastInsertValue;
            } else{
                throw new Exception("Could not save data");
            }
        } else {
            unset($data[$this->primary_id]);
            $where = new Where();
            $where->equalTo($this->primary_id,$id);
            if( $this->tableGateway->update($data,$where) ) {
                return (int) $id;
            } else{
                throw new Exception("Could not update data");
            }
        }
    }

    /**
     * @param int $id
     * @return array|\ArrayObject|null
     * @throws Exception
     */
    public function getById(int $id)
    {
        $where = new Where();
        $where->equalTo($this->primary_id, $id);
        $selected = $this->tableGateway->select($where);
        if ($selected->count() == 1) {
            return $selected->current();
        } else {
            throw new Exception("Row " . $id . " do not exists");
        }
    }


    public function getAll($order=null)
    {

        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select(
            ['a'=>$this->table]
        );

        if ( $order ){
            $select->order("$order ASC");
        }

        $stt = $sql->prepareStatementForSqlObject($select);
        $res = $stt->execute();

        $hydrate = $this->hydrate($res,new Employees());
        return $hydrate;

    }

    public function getAllVagaTeste($list=null)
    {

        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select(
            ['a'=>$this->table]
        );

        if ( $list && $list=='month'){
            $select->order( new Expression("DATE_FORMAT(`hiring_date`, '%m')"));
            $select->order("name ASC");
        }


        $stt = $sql->prepareStatementForSqlObject($select);
        $res = $stt->execute();

        $hydrate = $this->hydrate($res,new Employees());
        return $hydrate;

    }

    /**
     * @param int $id
     * @return int
     * @throws Exception
     */
    public function delete(int $id)
    {
        $data = [$this->primary_id,$id];
        $where = new Where();
        $where->equalTo($this->primary_id,$id);
        if($this->tableGateway->delete($where) ) {
            return (int) $id;
        } else{
            throw new Exception("Could not delete data");
        }
    }

}