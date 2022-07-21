<?php 
   class CPU {
    private $cpu;
    private $cpu_id;
    function __construct($cpu_id,$cpu) {
        self::setCPU_id($cpu_id);
        self::setCPU($cpu);
        
    }
    public function getCPU_id() { return $this->cpu_id; }
    public function setCPU_id($cpu_id) { $this->cpu=$cpu_id;}
    public function getCPU(){
        return $this->cpu;
    }
    public function setCPU($cpu) { $this->cpu=$cpu;}
   }
?>