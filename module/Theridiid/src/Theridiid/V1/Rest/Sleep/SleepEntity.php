<?php
namespace Theridiid\V1\Rest\Sleep;

class SleepEntity
{

    public $id;
    public $alchohol;
    public $rating;
 
    public function getArrayCopy()
    {
        return array(
            'id'     => $this->id,
            'alchohol' => $this->alchohol,
            'rating'  => $this->rating,
        );
    }
 
    public function exchangeArray(array $array)
    {
        $this->id     = $array['id'];
        $this->alchohol = $array['alchohol'];
        $this->rating  = $array['rating'];
    }
    
}
