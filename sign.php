<?php
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']== 'POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if (!empty($USERNAME) && preg_match('/^(?=.*[A-Z])(?=.*\d).{6,}$/', $password)) {
        $sql = "SELECT * FROM `Registration` 
                WHERE Username = '$username'";

        $result=mysqli_query($con,$sql);

        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                $user=1;
            }else{
                $sql = "INSERT into `Registration` (Username, Password) 
                VALUES ('$username', '$password')";
        $result=mysqli_query($con,$sql);

        if($result){
            $success=1;
        }else{
            die(mysqli_error($con));
        }
    }
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> Username must not be blank and password must be at least 6 characters long, 
        contain at least one uppercase letter and at least one number.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="sign_in.css">
  </head>
  <body>
  <h1>KARIBU SUPERMARKET</h1>
<?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>User already exists!</strong> Try a different username.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>

<?php
if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registration complete!</strong> You have been successfully registered.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      </body>
      <div class="container">
        <div class="card">
          <div class="card-header">
          <h2 style="text-align:center;">Sign Up</h2>
          </div>
          <div class="card-body">
            <form action="sign.php" method="POST">
              <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Enter your password"><br>
              </div>
              <button type="submit" class="btn btn-primary w-100">REGISTER</button><br><br>
              <a href="login.php" class="btn btn-secondary w-100">LOGIN</a>
            </form>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </footer>
  </body>
  </html>