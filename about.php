<?php
include 'config.php';
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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>A propos</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">

</head>
<body>
<?php include 'header.php';?>
 <div class="heading">
   <h3>A propos de nous</h3>
   <p><a href="home.php">Accueil</a> / about</p>
 </div>

 <section class="about">
      <div class="flex">
         <div class="image">
            <img src="images/aboutimagee.png" alt="">
         </div>
         <div class="content">
            <h3>Pourquoi nous choisir?</h3>
            <p>Notre boutique est un endroit unique pour les amateurs de parfums de luxe. Nous sommes fiers de proposer une sélection exquise de parfums haut de gamme provenant des meilleures marques du monde entier.
Nous comprenons l'importance de la qualité et de l'exclusivité, c'est pourquoi nous nous efforçons de trouver les parfums les plus rares et les plus convoités pour notre clientèle sophistiquée.</p>
            <a href="contact.php" class="btn">Contactez-nous</a>
         </div>
      </div>
   </section>
   <section class="reviews">
      <h1 class="title">Avis des clients</h1>
      <div class="box-container">

         <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Très satisfaite de ma commande chez parfumerie en ligne. Livraison très rapide, je l’ai reçu en 3 jours. Colis en très bon état avec 2 échantillons offerts avec la commande. De plus, c’est le prix le plus bas que j’ai trouvé pour ce parfum et cette contenance, je recommande ce site!</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Amine Arabi</h3>
         </div>

         <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>Super site ! J'ai reçu ma commande rapidement, j'ai eu pas mal d'échantillons ce qui est très appréciable et les prix sont inférieurs à quasiment tous les autres sites, je recommande !</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Yassmine Nardi</h3>
         </div>

         <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>Rapidité de livraison. Conforme à la commande. Et Pas mal d'échantillons. Je recommande ce site</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Ahmed Bachir</h3>
         </div>

         <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>Très contente de mon achat livraison rapide et et très bien emballé l emballage cadeau ras merci je vous recommande+++</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Nourhane Zaim</h3>
         </div>


      </div>
   </section>


<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>