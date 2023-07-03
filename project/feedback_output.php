<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit();
}

// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
   $deleteId = $_GET['delete_id'];

   // Retrieve the user_id of the feedback entry
   $selectFeedbackQuery = mysqli_query($conn, "SELECT user_id FROM `message` WHERE id = '$deleteId'");

   if (mysqli_num_rows($selectFeedbackQuery) > 0) {
      $feedbackData = mysqli_fetch_assoc($selectFeedbackQuery);
      $feedbackUserId = $feedbackData['user_id'];

      // Check if the feedback entry belongs to the logged-in user
      if ($feedbackUserId == $user_id) {
         // Delete the feedback entry from the database
         $deleteQuery = mysqli_query($conn, "DELETE FROM `message` WHERE id = '$deleteId'") or die('Delete query failed');
      }
   }

   // Redirect to the same page after deleting the entry
   header("Location: feedback_output.php");
   exit();
}

$select_feedback = mysqli_query($conn, "SELECT * FROM `message`") or die('Query failed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Feedback Output</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      /* Add your CSS styles here */
      .heading {
         background-color: #f2f2f2;
         padding: 20px;
         text-align: center;
      }

      .heading h3 {
         margin: 0;
      }

      .heading p {
         margin: 0;
         color: #888;
      }

      .feedback-output {
         max-width: 600px;
         margin: 20px auto;
         padding: 20px;
         background-color: #f9f9f9;
         border-radius: 5px;
      }

      .feedback-item {
         margin-bottom: 20px;
         border: 1px solid #ccc;
         padding: 10px;
         border-radius: 5px;
      }

      .feedback-item h4 {
         margin: 0;
         font-size: 18px;
         margin-bottom: 5px;
      }

      .feedback-item p {
         margin: 0;
         color: #555;
      }

      .btn-delete {
         display: inline-block;
         padding: 2px 300px;
         /* background-color: #f4433; */
         color: black;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         font-size: 16px;
         text-decoration: none;
      }

      
   </style>
</head>
<body>

<div class="heading">
   <h3>Feedback Output</h3>
   <p><a href="home.php">Home</a> / Feedback Output</p>
</div>

<section class="feedback-output">

   <?php while ($row = mysqli_fetch_assoc($select_feedback)): ?>
   <div class="feedback-item">
      <h4><?php echo $row['name']; ?></h4>
      <p><?php echo $row['message']; ?></p>
      <?php if ($row['user_id'] == $user_id): ?>
         <a href="feedback_output.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
      <?php endif; ?>
   </div>
   <?php endwhile; ?>

</section>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
