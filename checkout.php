<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'stan br. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('d-m-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if(empty($name) || empty($number) || empty($email) || empty($method) || empty($_POST['flat']) || empty($_POST['street']) || empty($_POST['city']) || empty($_POST['country']) || empty($_POST['pin_code'])){
        $message[] = 'Molimo ispunite sva polja!';
    } elseif($cart_total == 0){
        $message[] = 'Tvoja košarica je prazna!';
    } elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'Narudžba je već zaprimljena!';
    } else {
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'Narudžba poslana uspješno!';
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Proces naplate</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>završetak narudžbe</h3>
    <p> <a href="home.php">početna</a> / završetak narudžbe </p>
</section>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo '€'.$fetch_cart['price'].''.' x '.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">TVOJA KOŠARICA JE PRAZNA</p>';
        }
    ?>
    <div class="grand-total">ukupan iznos : <span>€<?php echo $grand_total; ?></span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3>naručite:</h3>

        <div class="flex">
            <div class="inputBox">
                <span>vaše ime :</span>
                <input type="text" name="name" placeholder="unesite svoje ime">
            </div>
            <div class="inputBox">
                <span>vaš broj :</span>
                <input type="number" name="number" min="0" placeholder="unesite broj telefona">
            </div>
            <div class="inputBox">
                <span> vaša email adresa :</span>
                <input type="email" name="email" placeholder="unesite svoju email adresu">
            </div>
            <div class="inputBox">
                <span>način plaćanja :</span>
                <select name="method">
                    <option value="plaćanje pouzećem">plaćanje pouzećem</option>
                    <option value="kreditna kartica">kreditna kartica</option>
                    <option value="paypal">paypal</option>
                </select>
            </div>
            <div class="inputBox">
                <span>broj stana ili kuće :</span>
                <input type="text" name="flat" placeholder="npr. stan br.">
            </div>
            <div class="inputBox">
                <span>naziv ulice :</span>
                <input type="text" name="street" placeholder="npr. Ilica 10">
            </div>
            <div class="inputBox">
                <span>grad :</span>
                <input type="text" name="city" placeholder="npr. Zagreb">
            </div>
            <div class="inputBox">
                <span>županija :</span>
                <input type="text" name="state" placeholder="npr. Zagrebačka županija">
            </div>
            <div class="inputBox">
                <span>država :</span>
                <input type="text" name="country" placeholder="npr. Hrvatska">
            </div>
            <div class="inputBox">
                <span>poštanski broj :</span>
                <input type="number" min="0" name="pin_code" placeholder="npr. 10000">
            </div>
        </div>

        <input type="submit" name="order" value="naruči sad" class="btn">

    </form>

</section>
<?php @include 'footer.php'; ?>
<script>
document.querySelector("form").addEventListener("submit", function(event) {
    let name = document.querySelector('input[name="name"]').value.trim();
    let number = document.querySelector('input[name="number"]').value.trim();
    let email = document.querySelector('input[name="email"]').value.trim();
    let flat = document.querySelector('input[name="flat"]').value.trim();
    let street = document.querySelector('input[name="street"]').value.trim();
    let city = document.querySelector('input[name="city"]').value.trim();
    let country = document.querySelector('input[name="country"]').value.trim();
    let pin_code = document.querySelector('input[name="pin_code"]').value.trim();
    let cartTotal = <?php echo $grand_total; ?>;

    if (name === "" || number === "" || email === "" || flat === "" || street === "" || city === "" || country === "" || pin_code === "") {
        alert("Molimo ispunite sva polja!");
        event.preventDefault();
    } else if (cartTotal === 0) {
        alert("Tvoja košarica je prazna!");
        event.preventDefault();
    }
});
</script>

</script>
</body>
</html>