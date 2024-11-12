<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Tangerine">
<header class="header">
    <div class="header-1">
    <div class="flex">
        <div class="share"> </div>
         <a href="login.php">Se connecter</h1></a><a href="register.php">S'inscrire</h1></a>
         
         </div>
    </div>
    <div class="header-2">
        <div class="flex">
        <a href="home.php"></a>
        <img src="images/logosite.png" class="logo"><h1>L'effuve parfumerie</h1>
        <nav class="navbar">
            <a href="home.php">Accueil</a>
            <a href="about.php">A propos</a>
            <a href="shop.php">Produit</a>
            <a href="contact.php">Contact</a>
            <a href="orders.php">Commande</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <a id="user-btn" class="fas fa-user"></a>
            <?php $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id' ") or die ('erreur');
            $cart_rows_number = mysqli_num_rows($select_cart_number);
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span></a>
        </div>
        <div class="user-box">
            <p>Utilisateur: <span><?php echo $_SESSION['user_name']?></span></p>
            <p>Email: <span><?php echo $_SESSION['user_email']?></span></p>
            <a href="logout.php" class="delete-btn">Déconnecté</a>
        </div>
        </div>
        </div>
</header>