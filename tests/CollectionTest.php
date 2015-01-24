<?php

class CollectionTest extends PHPUnit_Framework_TestCase
{
    private $array;
    
    public function setUp() 
    {
        $this->array = new \Collection\Collection;
        
        $this->array->set(0, 1);
    }
    
    public function testSetter()
    {
        $this->assertSame(1, $this->array[0]);
        
        $this->array->set('test', 5);
        
        $this->assertSame(5, $this->array['test']);
        
        $this->assertCount(2, $this->array);
    }
    
    public function testGetter()
    {
        $this->assertSame(1, $this->array->get(0));
    }
}
