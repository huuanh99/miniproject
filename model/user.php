<?php
include_once "model/model.php";

class user extends Model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function login($data)
  {
    $email = mysqli_real_escape_string($this->db->link, $data['email']);
    $password = mysqli_real_escape_string($this->db->link, $data['password']);
    $query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = $this->db->select($query);
    if($result){
      $result = $result->fetch_assoc();
      if(password_verify($password,$result['password'])){
        return $result;
      }
    }
    return false;
  }
}
