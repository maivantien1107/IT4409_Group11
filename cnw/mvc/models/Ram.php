<?php 
   class Ram {
    private $ram;
    public function __construct($ram) {
        self::setRam($ram);

    }
    public function getRam() {
        return $this->ram;
    }
    public function setRam($ram) {
        $this->ram = $ram;
    }
   }
?>