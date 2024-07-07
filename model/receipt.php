<?php
class Receipt
{
    public $date;
    public $listOfProducts=[];
    public $profit;
    public $sales;

    public function _construct ($date,$listOfProducts,$profit,$sales)
    {
        $this->$date = $date;
        $this->$listOfProducts = $listOfProducts;
        $this->$profit = $profit;
        $this->$sales = $sales;
    }
}

?>