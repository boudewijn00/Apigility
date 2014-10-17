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

        $values = array(
        'start' => date("Y-m-d H:i:s"),
        'longitude'=> 1234567890,
        'latitude'=> 1234567890,
        );
        
        // insert sleep record
        $insert = new Insert('sleep');        
        $insert->columns(array(
        'id',
        'start',
        'longitude',
        'latitude',
        ));
        
        $insert->values($values);
        
        $tableGateway = new TableGateway(
            'sleep', $this->adapter
        );
        
        $result = $tableGateway->insertWith($insert);
        $values['id'] = $tableGateway->lastInsertValue;
        
        // query to find factor based on name
        $sql = 'SELECT * FROM factors WHERE name = ?';
        
        // insert sleep has pre factor record
        $sleepPreFactor = new Insert('sleep_has_pre_factors');        
        $sleepPreFactor->columns(array(
            'id_sleep',
            'id_factors',
            'value',
        ));
        
        // instance table gateway for sleep has pre factors table
        $tableGateway = new TableGateway(
            'sleep_has_pre_factors', $this->adapter
        );
        
        // go through send name/ value pairs
        foreach($data AS $name => $value){
            
            
            
            $resultset = $this->adapter->query($sql, array($name))->toArray();
            $factorId = $resultset[0]["id"];
            
            $factorValues = array(
                'id_sleep' => $values['id'],
                'id_factors' => $factorId,
                'value'=> $value,
            );
         
            $sleepPreFactor->values($factorValues);
            $tableGateway->insertWith($sleepPreFactor);
            
        }
        
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