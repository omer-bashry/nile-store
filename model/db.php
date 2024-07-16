<?php
class DB
{
    private $servername = "localhost";
    private $username = "shadow";
    private $password = "password";
    private $dbname = "nile_store";
    private $conn;

    public function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to handle CRUD operations
    public function query($sql)
    {
        $result = $this->conn->query($sql);
        if ($result === TRUE) {
            return "Success";
        } elseif ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return json_encode($data);
        } else {
            return "0 results";
        }
    }

    // Create a new product
    public function createProduct($name, $buyPrice, $sellPrice, $quantity)
    {
        $sql = "INSERT INTO products (name, sellPrice,buyPrice,quantity) VALUES ('$name', '$sellPrice','$buyPrice','$quantity')";
        return $this->query($sql);
    }

    // Read all products
    public function readProducts()
    {
        $sql = "SELECT * FROM products";
        return $this->query($sql);
    }

    // Update a product
    public function updateProduct($id, $name, $sellPrice, $buyPrice, $quantity)
    {
        $sql = "UPDATE products SET name='$name', sellPrice='$sellPrice',buyPrice='$buyPrice',quantity='$quantity' WHERE id=$id";
        return $this->query($sql);
    }

    // Delete a product
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id=$id";
        return $this->query($sql);
    }

    // create admin 
    public function createAdmin($name, $username,$password){
        $sql = "INSERT INTO `admins`( `name`, `userName`, `password`) VALUES ($name,$username,$password)";
        return $this-> query($sql);
    }

    // read admins
    public function readAdmins(){
        $sql = "SELECT * FROM `admins`";
        return $this -> query($sql);
    }

    // update admin 
    public function updateAdmin($id,$name, $username,$password){
        $sql = "UPDATE `admins` SET `id`='$id',`name`='$name',`userName`='$username',`password`='$password' WHERE $id";
        return $this -> query($sql);
    }

    // delete admin 
    public function deleteAdmin($id){
        $sql = "DELETE FROM `admins` WHERE $id";
        return $this -> query($sql);
    }
    
    // Similar methods can be created for receipts table
    public function createReceipt($products, $date, $buyPrice, $sellPrice)
    {
        $sql = "INSERT INTO receipts ( `date`, `products`, `buyPrice`, `sellPrice`) VALUES ($date,$products,$buyPrice,$sellPrice)";
        return $this->query($sql);
    }

    public function readReceipts()
    {
        $sql = "SELECT * FROM receipts";
        return $this->query($sql);
    }

    public function updateReceipt($id, $products, $date, $buyPrice, $sellPrice)
    {
        $sql = "UPDATE `receipts` SET `date`=$date,`products`=$products,`buyPrice`=$buyPrice,`sellPrice`=$sellPrice WHERE $id";
        return $this->query($sql);
    }

    public function deleteReceipt($id)
    {
        $sql = "DELETE FROM receipts WHERE id=$id";
        return $this->query($sql);
    }
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new DB();
    $action = isset($_POST['action']) ? $_POST['action'] : '';


    switch ($action) {
        case 'createProduct':
            echo $db->createProduct($_POST['name'], $_POST['sellprice'], $_POST['buyPrice'], $_POST['quantity']);
            break;
        case 'readProducts':
            echo $db->readProducts();
            break;
        case 'updateProduct':
            echo $db->updateProduct($_POST['id'], $_POST['name'], $_POST['sellprice'], $_POST['buyPrice'], $_POST['quantity']);
            break;
        case 'deleteProduct':
            echo $db->deleteProduct($_POST['id']);
            break;
        case 'createReceipt':
            echo $db->createReceipt($_POST['product_id'], $_POST['products'], $_POST['date'], $_POST['buyPrice'], $_POST['sellPrice']);
            break;
        case 'readReceipts':
            echo $db->readReceipts();
            break;
        case 'updateReceipt':
            echo $db->updateReceipt($_POST['id'], $_POST['products'], $_POST['date'], $_POST['buyPrice'], $_POST['sellPrice']);
            break;
        case 'deleteReceipt':
            echo $db->deleteReceipt($_POST['id']);
            break;
        default:
            echo "Invalid action";
            break;
    }
   switch($action) {
       case 'createProduct':
           echo $db->createProduct($_POST['name'], $_POST['sellPrice'],$_POST['buyPrice'],$_POST['quantity']);
           break;
       case 'readProducts':
           echo $db->readProducts();
           break;
       case 'updateProduct':
           echo $db->updateProduct($_POST['id'], $_POST['name'],$_POST['sellPrice'],$_POST['buyPrice'],$_POST['quantity']);
           break;
       case 'deleteProduct':
           echo $db->deleteProduct($_POST['id']);
           break;
       case 'createReceipt':
           echo $db->createReceipt($_POST['products'], $_POST['date'] , $_POST['buyPrice'],$_POST['sellPrice']);
           break;
       case 'readReceipts':
           echo $db->readReceipts();
           break;
       case 'updateReceipt':
           echo $db->updateReceipt($_POST['id'],$_POST['products'], $_POST['date'] , $_POST['buyPrice'],$_POST['sellPrice']);
           break;
       case 'deleteReceipt':
           echo $db->deleteReceipt($_POST['id']);
           break;
       default:
           echo "Invalid action";
           break;
   }
} else {
    echo "Invalid request method";
}
