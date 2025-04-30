<?php

@include 'config.php';

if(isset($_POST['submit'])){
   $filter_name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
   $name = mysqli_real_escape_string($conn, $filter_name);

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $email = mysqli_real_escape_string($conn, $filter_email);

   $filter_pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
   $filter_cpass = htmlspecialchars($_POST['cpass'], ENT_QUOTES, 'UTF-8');

   // Provjera postoji li korisnik
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
       $message[] = 'Korisnik već postoji!';
   } else {
       if($filter_pass !== $filter_cpass){
           $message[] = 'Lozinke se ne podudaraju!';
       } else {
           // Sigurno hashiranje lozinke
           $hashed_pass = password_hash($filter_pass, PASSWORD_DEFAULT);

           mysqli_query($conn, "INSERT INTO `users` (name, email, password) VALUES ('$name', '$email', '$hashed_pass')") 
           or die('query failed');

           $message[] = 'Registracija uspješna!';
           header('Location: login.php');
           exit(); // Prekid izvršavanja nakon preusmjeravanja
       }
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registracija</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<section class="form-container">

   <form action="" method="post">
      <h3>Registriraj se</h3>
      <input type="text" name="name" class="box" placeholder="Unesite korisničko ime" required>
      <input type="email" name="email" class="box" placeholder="Unesite svoju email adresu" required>
      <input type="password" name="pass" class="box" placeholder="Unesite svoju lozinku" required>
      <input type="password" name="cpass" class="box" placeholder="Potvrdite svoju lozinku" required>
      <input type="submit" class="btn" name="submit" value="registriraj me">
      <p>Već imate račun? <a href="login.php">Prijava</a></p>
   </form>

</section>

</body>
</html>