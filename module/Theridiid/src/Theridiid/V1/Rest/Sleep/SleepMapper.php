<?php

namespace Theridiid\V1\Rest\Sleep;
 
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;

use Zend\Db\Sql\Select;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Sql;

class SleepMapper
{
    protected $adapter;
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
 
    public function fetchAll()
    {
        
        $select = new Select('sleep');
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        $collection = new SleepCollection($paginatorAdapter);
        
        return $collection;
        
    }
 
    public function fetchOne($sleepId)
    {
        
        $sql = 'SELECT * FROM sleep WHERE id = ?';
        $resultset = $this->adapter->query($sql, array($sleepId));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }
 
        $entity = new SleepEntity();
        $entity->exchangeArray($data[0]);
        
        return $entity;
        
    }
    
    public function insert($data)
    {
        
        //\Zend\Debug\Debug::dump($data);die();
        
        $values = array(
        'alchohol' => (string) $data->alchohol,
        'rating'=> (string) $data->rating
        );
        
        //\Zend\Debug\Debug::dump($values);die();
        
        $insert = new Sql($this->adapter);
        $insert = new Insert('sleep');
        
        $insert->columns(array(
        'id',
        'alchohol',
        'rating'
        ));
        
        $insert->values($values);
        
        $tableGateway = new TableGateway(
            'sleep', $this->adapter
        );
        
        $result = $tableGateway->insertWith($insert);
        $values['id'] = $tableGateway->lastInsertValue;
        
        //\Zend\Debug\Debug::dump($id);die();
        
        $entity = new SleepEntity();
        $entity->exchangeArray($values);
        
        return $entity;
        
    }
    
    public function delete($id)
    {
        
        echo $id;
        //\Zend\Debug\Debug::dump($id);die();
        
    }
    
}