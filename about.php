<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>O nama</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>O nama</h3>
    <p> <a href="home.php">početna</a> / o nama </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about1.jpeg" alt="">
        </div>

        <div class="content">
            <h3>Zašto odabrati nas?</h3>
            <p>Što nas čini posebnima? Personalizirani pristup, svježina i kvaliteta naših proizvoda, jednostavno online iskustvo i brza dostava,
             sve s ljubavlju prema cvijeću i posvećenosti svakom detalju.</p>
            <a href="shop.php" class="btn">Pregledaj ponudu</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>Što nudimo?</h3>
            <p>Strast prema cvijeću nije samo posao, to je poziv! Naša ponuda uključuje samo najljepše i najkvalitetnije cvijeće,
             pažljivo odabrano kako bi svaki buket i biljka donijeli radost i ljepotu u vaš život. Bilo da tražite savršen buket za 
             posebnu prigodu ili jednostavno želite unijeti prirodu u svoj prostor, u našem webshopu pronaći ćete sve što vam treba.</p>
            <a href="contact.php" class="btn">Kontaktirajte nas</a>
        </div>

        <div class="image">
            <img src="images/about2.jpeg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/logo.jpeg" alt="">
        </div>

        <div class="content">
            <h3>Tko smo mi?</h3>
            <p>Strastveni ljubitelji cvijeća s dugogodišnjim iskustvom u aranžiranju i dostavi cvijeća. Naš cilj je unijeti ljepotu i radost u vaš
             život putem cvjetnih kreacija. Odaberite nas jer volimo cvijeće, i želimo da vi osjetite tu ljubav u svakom buketu i biljci! 🌸</p>
        </div>

    </div>

</section>
<?php @include 'footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>