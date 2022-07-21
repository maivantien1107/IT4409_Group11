<?php 
  class Memory{
    private $memory;
    public function __construct($memory){
        self::setMemory($memory);

    }
    public function getMemory(){
        return $this->memory;
    }
    public function setMemory($memory){
        $this->memory = $memory;
    }
  }
?>