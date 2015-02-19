<?php

namespace Collection;

abstract class CollectionAbstract implements \Countable, \ArrayAccess, \Iterator
{
    protected $items = array();
    
    protected $count;
    
    protected $last_item_key;
    
    protected $pointer = 0;
    
    const INCREMENT = 1;
    
    const DECREMENT = 2;
    
    public function __construct(array $items = array()) 
    {
        $this->items = $items;
        
        $this->count = count($items);
    }
    
    public function count()
    {
        return $this->count;
    }
    
    public function offsetSet($offset, $value) 
    {
        $has = $this->offsetExists($offset);
        
        $this->items[$offset] = $value;
        
        if (! $has) {
            $this->updateCounter(self::INCREMENT);
        }
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
        
        $this->updateCounter(self::DECREMENT);
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
    
    protected function updateCounter($type)
    {
        if ($type == self::INCREMENT) {
            $this->count++;
        } elseif ($type == self::DECREMENT) {
            $this->count--;
        } else {
            throw new \Exception('Wrong parameter for counter updating.');
        }
        
        if ($this->count == 0) {
            $this->last_item_key = null;
        } else {
            $this->last_item_key = array_keys($this->items)[$this->count() - 1];
        }
    }
}