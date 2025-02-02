<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];



if(!isset($user_id)){
    header('location:login.php');
     }

     if(isset($_POST['add_to_cart'])){
      $product_name = $_POST['product_name'];
      $product_description = $_POST['product_description'];
      $product_quantity = $_POST['product_quantity'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];

      $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('erreur');
      if(mysqli_num_rows($check_cart_numbers) > 0){
         $message[] = 'Produit déja ajouter à la carte';
      }else{
         mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_quantity', '$product_price', '$product_image')") or die ('erreur');
         $message[] = 'Produit ajouter à la carte';
      }

       }
     ?>

     <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Accueil</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'header.php'; ?>
<section class="home">
   <div class="content">
   <h3>L'effuve parfumerie</h3>   
   <p>N'oubliez pas de decouvrez notre derniere collection</p>
   <a href="about.php" class="white-btn">Découvrire</a>

   </div>

</section>
   <section class="products">
      <h1 class="title">Nouveautés</h1>
      <div class="box-container">
         <?php 
           $select_products = mysqli_query($conn, "SELECT*FROM `products` LIMIT 3") or die ('erreur');
           if(mysqli_num_rows($select_products) > 0){
              while($fetch_products = mysqli_fetch_assoc($select_products)){ 
         ?>
         <form action="" method="post" class="box">
            <img class="image" src="uploaded_img/<?php echo $fetch_products ['image'];  ?>" alt="">
            <div class="name"><?php echo $fetch_products ['name'];  ?></div>
            <div class="description"><?php echo $fetch_products ['description'];  ?></div>
            <div class="price"><?php echo $fetch_products ['price'];  ?> DH</div>
            <input type="hidden" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value=<?php echo $fetch_products ['name']; ?>>
            <input type="hidden" name="product_description" value=<?php echo $fetch_products ['description']; ?>>
            <input type="hidden" name="product_price" value=<?php echo $fetch_products ['price']; ?>>
            <input type="hidden" name="product_image" value=<?php echo $fetch_products ['image']; ?>>
            <input type="submit" value="Acheter" name="add_to_cart" class="btn">

              </form>
         <?php 
      }
           }else{ 
            echo '<p class="empty">Aucun produit ajoutez</p>';
           }
           ?>
   </div>
   <div class="load-more" style="margin-top: 2rem; text-align:center">
<a href="shop.php" class="option-btn">Voir plus</a>
</div>
   </section>
   


<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>