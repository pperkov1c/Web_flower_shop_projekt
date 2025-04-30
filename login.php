<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['pass'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      
      $row = mysqli_fetch_assoc($select_users);
      
      if(password_verify($password, $row['password'])) { // Provjera hashirane lozinke
         
         if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');
            exit();
         }elseif($row['user_type'] == 'user'){
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
            exit();
         }
      } else {
         $message[] = 'Netočna lozinka!';
      }
   } else {
      $message[] = 'Korisnik ne postoji!';
   }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prijava</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '<div class="message"><span>'.$msg.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>';
   }
}
?>
   
<section class="form-container">
   <form action="" method="post">
      <h3>Prijava</h3>
      <input type="email" name="email" class="box" placeholder="Unesite svoju email adresu" required>
      <input type="password" name="pass" class="box" placeholder="Unesite svoju lozinku" required>
      <input type="submit" class="btn" name="submit" value="Prijava">
      <p>Nemate još račun? <a href="register.php">Registriraj me</a></p>
   </form>
</section>

</body>
</html>
