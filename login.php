<?php
session_start();
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['email'] = $row['email'];
      echo "login success";

    } else {
      echo "password invelid";
    }
  } else {
    echo 'user not found';
  }

  // $data=$result->fetch_assoc();
  // if($data["password"]==$password){
  //   $_SESSION['name'] = $data['name'];
  //   $_SESSION['email'] = $data['email'];
  // }
  // else{
  //   echo "password wrong";
  // }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Signup Form</title>
  <style>
    body {
      background-color: #e0e0e0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }

    button {
      background-color: #007bff;
      color: #fff;
      padding: 12px 20px;
      margin: 15px 0;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      background-color: #0069d9;
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      width: 48%;
    }
  </style>
</head>

<body>
  <form method="post">

    <div class="container">
      <h2>login Form</h2>

      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <a href="signup.php">singup</a>
      <button type="submit">Signup</button>
    </div>
  </form>

</body>