<?php 
  class Config
  {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "customerr";

    private $connection;

    public function connect()
    {
      $this->connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);

      // if($res)
      // {
      //   echo "connected";
      // }
      // else{
      //   echo "not connected";
      // }
    }

    public function __construct()
    {
      $this->connect();
    }

    public function userAdd($name,$email,$phone)
    {
      $query = "INSERT INTO user(name,email,phone) VALUES('$name','$email','$phone')";
      $res = mysqli_query($this->connection,$query);
      return $res;
    }
    public function fetchUserData()
    {
      $query = "SELECT * FROM user";
      $res = mysqli_query($this->connection,$query);
      return $res;
    }


    //Product Detail
    public function proAdd($pro_name,$price)
    {
      $query = "INSERT INTO product(pro_name,price) VALUES('$pro_name','$price')";
      $res = mysqli_query($this->connection,$query);
      return $res;
    }
    public function proUpdate($id,$pro_name,$price)
    {
      $query = "UPDATE product SET pro_name = '$pro_name',price = $price WHERE id = $id";
      $res = mysqli_query($this->connection,$query);
      return $res;
    }



    //New Order
    public function newOrderAdd($order_date,$status)
    {
      $query = "INSERT INTO order(order_date,status) VALUES('$order_date','$status')";
      $res = mysqli_query($this->connection,$query);
      return $res;
    }

   public function deleteOrder($id)
    {
      $query = "DELETE FROM order WHERE id = $id";
      $res = mysqli_query($this->connection,$query);
      return $res;
    }


}

?>