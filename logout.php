<?php
session_start();

if (isset($_SESSION['Username'])) {
    session_destroy();
    header('location:login.php');
  }
else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Unabe to logout</strong> Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

?>
