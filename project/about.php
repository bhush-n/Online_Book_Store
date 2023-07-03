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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>"Bhushan's Book Corner" is an online store dedicated to serving book lovers with a wide range of literary treasures. We are passionate about connecting readers with their favorite authors and fostering a love for reading. Our extensive collection includes a diverse selection of genres, from gripping thrillers to thought-provoking classics, ensuring there's something for every reader. With a user-friendly interface, secure transactions, and prompt delivery, we strive to provide a seamless and satisfying book-buying experience. At "Bhushan's Book Corner," we aim to ignite the joy of reading and be your go-to destination for all your literary needs.</p>
         <p>Choose "Bhushan's Book Corner" for an unparalleled online book shopping experience. With our vast selection and commitment to customer satisfaction, we are dedicated to providing a convenient and reliable platform for book enthusiasts to explore, discover, and indulge in their passion for reading.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>