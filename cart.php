<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
     }
if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die ('query failed');
   $message[] = 'Quantité modifier';
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die  ('query failed');
   header('location:cart.php');
}
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die  ('query failed');
   header('location:cart.php');
}     
     ?>
     <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php';?>
<div class="heading">
   <h3>Panier</h3>
   <p><a href="home.php">Accueil</a> / Panier</p>
 </div>
 <section class="shopping-cart">
   <h1 class="title">Produits ajouter</h1>
   <div class="box-container">
      <?php
      $grand_total = 0;
       $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die ('query failed');
       if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){      
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm ('Vous vouler suprimer ce produit de votre panier ?');"></a>
         <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            
         </form>
         <div class="sub-total"> Total : <span><?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span>DH</div>
      </div>
      <?php
      $grand_total += $sub_total;
       }
      }else{
        echo '<p class="empty">ton panier est vide</p>';
      }     
      ?>
   </div>
   <div style="margin-top: 2rem; text-align:center;">
   <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)? '':'disabled';?>" onclick="return confirm ('Vous vouler tous suprimer de votre panier ?');">Supprimer</a>
</div>
<div class="cart-total">
   <p>Le prix total : <span><?php echo $grand_total; ?></span>DH</p>
   <div class="flex">
      <a href="shop.php" class="option-btn">continue votre achat</a>
      <a href="checkout.php" class="btn <?php echo ($grand_total > 1)? '':'disabled';?>">passer au payment</a>
   </div>
</div>
 </section>
<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>