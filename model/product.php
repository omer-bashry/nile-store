<?php
class Product  
{
    public $name;
    public $buyPrice;
    public $sellPrice;
    public $quantity;
    
    public function _counstruct($name,$buyPrice,$sellPrice,$quantity)
    {
        $this->$name = $name;
        $this->$buyPrice =$buyPrice;
        $this->$sellPrice = $sellPrice;
        $this->$quantity = $quantity;
    }
    
}

?>
