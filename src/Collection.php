<?php

namespace Collection;

use Collection\CollectionAbstract;

class Collection extends CollectionAbstract
{
    public function set($key, $value)
    {
        $this->offsetSet($key, $value);
        
        return $this;
    }
    
    public function get($key) 
    {
        if (! $this->has($key)) {
            throw new \Exception('Próba pobrania elementu, który nie istnieje.');
        }
        
        return $this->items[$key];
    }
    
    public function has($key)
    {
        return $this->offsetExists($key);
    }
    
    public function remove($key)
    {
        $this->offsetUnset($key);
        
        return $this;
    }
    
    public function getAll()
    {
        return $this->items;
    }
}
