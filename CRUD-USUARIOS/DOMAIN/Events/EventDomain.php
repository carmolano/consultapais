<?php

abstract class DomainEvent

{
    private $eventname;
    private $occurredOn;

    public function __construct($eventname)
    {
        $this->eventname = $eventname;
        $this->occurredOn = date('y-m-d h:is');
    }

    public function eventname() {return $this->eventname;}
    public function occurredOn(){return $this->occurredOn;}

    abstract public function payload();

}