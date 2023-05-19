<?php
require_once './ModelInstance.php';
final class ModelInstanceCollection implements IteratorAggregate{
    private array $modelInstances;

    public function __construct(modelInstance ...$modelInstances)
    {
        $this-> modelInstances = $modelInstances;
    }
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->modelInstances);
    }
}