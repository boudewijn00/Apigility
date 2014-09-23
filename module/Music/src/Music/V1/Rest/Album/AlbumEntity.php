<?php
namespace Music\V1\Rest\Album;

class AlbumEntity
{
    
    public $id;
    public $artist;
    public $title;
    
    public function getArrayCopy()
    {
        return array(
            'id'     => $this->id,
            'artist' => $this->artist,
            'title'  => $this->title,
        );
    }
    
    public function exchangeArray(array $array)
    {
        $this->id     = $array['id'];
        $this->artist = $array['artist'];
        $this->title  = $array['title'];
    }
    
    
}
