<?php
    class Digital {
        public $a;
        public $b;

        function __construct($a, $b){
            $this->a = $a;
            $this->b = $b;
        }

        public function sum(){
            return $this->a + $this->b;
        }
        public function dif(){
            return $this->a - $this->b;
        }
        public function mult(){
            return $this->a * $this->b;
        }
        public function dev(){
            return $this->a / $this->b;
        }
    }

    $numb = new Digital(10,2);
    echo $numb->sum() . "<br>";
    echo $numb->dif() . "<br>";
    echo $numb->mult() . "<br>";
    echo $numb->dev() . "<br>";
?>