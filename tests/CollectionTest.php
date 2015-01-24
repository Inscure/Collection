<?php

class CollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Collection\Collection
     */
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
    
    public function testRemoving()
    {
        $this->array->remove(0);
        
        $this->assertCount(0, $this->array);
    }
    
    public function testCount()
    {
        $this->assertCount(1, $this->array);
        
        $this->array->set('set', 0);
        
        $this->assertCount(2, $this->array);
        
        $this->array->set('set', false);
        
        $this->assertCount(2, $this->array);
    }
}
