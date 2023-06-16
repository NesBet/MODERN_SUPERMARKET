<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']== 'POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql = "SELECT * FROM `Registration` 
            WHERE Username = '$username' 
            and Password='$password'";

    $result=mysqli_query($con,$sql);
    
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['Username']=$username;
            header('location:home.php');
        }
        else{
            $invalid=1;
    }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>LOGIN</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="login.css">
    </head>
  <body>
<?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Authentication complete</strong> Successfully logged in!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
?>

<?php
if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Invalid credentials!!</strong> Please try again or create an account.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
?>
  <h1>KARIBU SUPERMARKET</h1>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <div class="card">
      <div class="card-title">Login</div>
      <form action="login.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-primary w-100">LOGIN</button>
        <a href="sign.php" class="btn btn-secondary w-100" style="color: #fff" >Sign Up</a>
      </form>
    </div>
</html>