<?php




include_once('Dices.php');


class Cup {
    
    private $_compt = 0;


    // creation du tableau de dés
    private $_dicelist = [];
    

    // creation des dés
    public function __construct($nbDeDes){

        for($i=0; $i< $nbDeDes; $i++) {
            $this->_dicelist[]= new Dice(6);

        }
        
    }   
    
    
    // fonction pour le lancement des dés
    public function rollCup(){

        foreach ($this->_dicelist as $dice){
            
            $dice->rollDice();
        }
    }

    // fonction pour afficher les valeurs des dés
    public function displayDicesValues(){

        foreach ($this->_dicelist as $dice) {
            echo $dice->getCurrentValue() . '<br>';
        }
    }



    public function rerollDice($index) {

        
        return $this->_dicelist[$index]->rollDice();
       

    }

    public function getCompt() {

        return $this->_compt;
    }

    public function incrementCompt() {

        $this->_compt+=1;
    }


    public function getDicesValues() {

        $dicesValues=[];

        foreach ($this->_dicelist as  $value) {

            $dicesValues[] = $value->getCurrentValue();
            
        }
        return $dicesValues;


    }



}


