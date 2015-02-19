<?php

class CollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Collection\Collection
     */
    private $collection;
    
    public function setUp() 
    {
        $this->collection = new \Collection\Collection;
        
        $this->collection->set(0, 1);
    }
    
    public function testSetter()
    {
        $this->assertSame(1, $this->collection[0]);
        
        $this->collection->set('test', 5);
        
        $this->assertSame(5, $this->collection['test']);
        
        $this->assertCount(2, $this->collection);
    }
    
    public function testGetter()
    {
        $this->assertSame(1, $this->collection->get(0));
    }
    
    /**
     * @expectedException \Exception
     */
    public function testGetterException()
    {
        $this->collection->get('id');
    }
    
    public function testRemoving()
    {
        $this->collection->remove(0);
        
        $this->assertCount(0, $this->collection);
    }
    
    public function testCount()
    {
        $this->assertCount(1, $this->collection);
        
        $this->collection->set('set', 0);
        
        $this->assertCount(2, $this->collection);
        
        $this->collection->set('set', false);
        
        $this->assertCount(2, $this->collection);
    }
    
    public function testLastItemValue()
    {
        $this->assertSame(1, $this->collection->getLast());
        
        $this->collection->set('foo', 'value');
        
        $this->assertSame('value', $this->collection->getLast());
        
        $this->collection->remove('foo');
        
        $this->assertSame(1, $this->collection->getLast());
        
        $this->setExpectedException('\Exception');
        
        $this->collection->remove(0);
        
        $this->collection->getLast();
    }
}
