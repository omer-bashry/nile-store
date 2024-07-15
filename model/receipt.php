<?php
class Receipt {
    private $id;
    private $date;
    private $buyPrice;
    private $sellPrice;
    private $products;

    public function __construct($id, $date, $buyPrice, $sellPrice, $products) {
        $this->id = $id;
        $this->date = $date;
        $this->buyPrice = $buyPrice;
        $this->sellPrice = $sellPrice;
        $this->products = $products;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getBuyPrice() {
        return $this->buyPrice;
    }

    public function getSellPrice() {
        return $this->sellPrice;
    }

    public function getProducts() {
        return $this->products;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setBuyPrice($buyPrice) {
        $this->buyPrice = $buyPrice;
    }

    public function setSellPrice($sellPrice) {
        $this->sellPrice = $sellPrice;
    }

    public function setProducts($products) {
        $this->products = $products;
    }
}
?>
