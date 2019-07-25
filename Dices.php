
<?php
    

    class Dice {
        private $_nbOfSides;
        private $_currentValue;
    
    
        public function __construct($nbSides){
            $this->setCurrentValue($nbSides);
            $this->rollDice();
        }
        
        public function getCurrentValue(){
            return $this->_currentValue;
        }
        private function setCurrentValue($nbSides){
            if(!is_int($nbSides)){
                trigger_error('le nombre de face d\'un dé doit etre un nombre entier', E_USER_WARNING);
            }
            $this->_nbOfSides = $nbSides;
        }
        
        public function rollDice(){
            $this->_currentValue = rand(1,$this->_nbOfSides); 
            return $this->getCurrentValue();
        }

    }



