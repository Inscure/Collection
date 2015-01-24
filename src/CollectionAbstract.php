<?php

namespace Collection;

abstract class CollectionAbstract implements \Countable, \ArrayAccess, \Iterator
{
    protected $items = array();
    
    protected $pointer = 0;
    
    public function __construct(array $items = array()) 
    {
        $this->items = $items;
    }
    
    public function count()
    {
        return count($this->items);
    }
    
    public function offsetSet($offset, $value) 
    {
        $this->items[$offset] = $value;
    }
    
    public function offsetGet($offset) 
    {
        return $this->items[$offset];
    }
    
    public function offsetExists($offset) 
    {
        return array_key_exists($offset, $this->items);
    }
    
    public function offsetUnset($offset) 
    {
        unset($this->items[$offset]);
    }
    
    public function current()
    {
        $values = array_values($this->items);
        
        return $values[$this->pointer];
    }
    
    public function key()
    {
        $keys = array_keys($this->items);
        
        return $keys[$this->pointer];
    }
    
    public function valid()
    {
        return $this->pointer < $this->count();
    }
    
    public function next() 
    {
        $this->pointer++;
    }
    
    public function rewind()
    {
        $this->pointer = 0;
    }
}