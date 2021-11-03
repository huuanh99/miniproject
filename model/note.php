<?php
include_once "model/model.php";
class note extends Model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function shownote()
  {
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
      $email = $_COOKIE['email'];
      $password = $_COOKIE['password'];
    } else {
      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    }
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $this->db->select($query);
    if ($result) {
      $result = $result->fetch_assoc();
      $id = $result['id'];
      $query1 = "SELECT * FROM note WHERE user_id='$id' ";
      $result1 = $this->db->select($query1);
      if ($result1) {
        return $result1;
      }
    }
    return false;
  }

  public function insert_note($data)
  {
    $content = mysqli_real_escape_string($this->db->link, $data['content']);
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    } else {
      $email = $_COOKIE['email'];
      $password = $_COOKIE['password'];
    }
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $this->db->select($query);
    if ($result) {
      $result = $result->fetch_assoc();
      $id = $result['id'];
      $query1 = "INSERT INTO note(user_id,content) VALUES ('$id','$content')";
      $result1 = $this->db->insert($query1);
      if ($result1) {
        return $result1;
      }
    }
    return false;
  }

  public function del_note($id)
  {
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
      $email = $_COOKIE['email'];
      $password = $_COOKIE['password'];
    } else {
      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    }
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $this->db->select($query);
    if($result){
      $query1 = "DELETE FROM note WHERE id = '$id'";
      $result1=$this->db->delete($query1);
      if($result1){
        return $result1;
      }
    }
    return false;
  }

  public function update_note($content, $id)
  {
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
      $email = $_COOKIE['email'];
      $password = $_COOKIE['password'];
    } else {
      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    }
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $this->db->select($query);
    if($result){
      $note_content = mysqli_real_escape_string($this->db->link, $content);
      $note_id = mysqli_real_escape_string($this->db->link, $id);
      $query1 = "UPDATE note SET content='$note_content' WHERE id='$note_id'";
      $result1 = $this->db->update($query1);
      if($result1){
        return $result1;
      }
    }
    return false;
  }

  public function getNoteById($id)
  {
    $query = "SELECT * FROM note WHERE id='$id' LIMIT 1";
    $result = $this->db->select($query);
    if ($result != false) {
      $value = $result->fetch_assoc();
      return $value;
    } else {
      return false;
    }
  }
}
