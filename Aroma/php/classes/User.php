<?php

class User {
  private $name;
  private $lastname;
  private $email;
  private $id;

  function __construct($id, $name, $lastname, $email)
  {
    $this->id = $id;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->email = $email;
  }
  function getId() {
    return $this->id;
  }
  function getName() {
    return $this->name;
  }
  function getLastname() {
    return $this->lastname;
  }
  function getEmail() {
    return $this->email;
  }
  //* Статический Метод добавления пользователя
  static function addUser($name, $lastname, $email, $pass) {
    global $mysqli;

    $email = trim(mb_strtolower($email));
    $pass = trim($pass);
    $pass = password_hash("$pass", PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");

    if ($result->num_rows != 0) {
      return json_encode(["result"=>"exist"]);
    } else {
      $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
      return json_encode(["result"=>"success"]);
    }
  }

  //* Статический метод авторизации пользователя
  static function authUser($email, $pass) {
    global $mysqli;

    $email = trim(mb_strtolower($email));
    $pass = trim($_POST["pass"]);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
    $result = $result->fetch_assoc();

    if (password_verify($pass, $result["pass"])) {
      return json_encode(["result"=>"success"]);
    } else {
      return json_encode(["result"=>"exist"]);
    }
  }
}