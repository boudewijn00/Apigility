<?php
namespace Theridiid\V1\Rest\Sleep;

class SleepEntity
{

    public $id;
    public $start;
    public $longitude;
    public $latitude;
 
    public function getArrayCopy()
    {
        return array(
            'id'     => $this->id,
            'start' => $this->start,
            'longitude'  => $this->longitude,
            'longitude'  => $this->latitude
        );
    }
 
    public function exchangeArray(array $array)
    {
        $this->id     = $array['id'];
        $this->alchohol = $array['start'];
        $this->longitude  = $array['longitude'];
        $this->latitude  = $array['latitude'];
    }
    
}
