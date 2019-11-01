<?php
include 'header.php';
include 'config.php';

if(isset($_GET['success_msg'])){
    echo "<div class='alert alert-success'>";
//        $message = $_GET['success_msg'];
        echo  $_GET['success_msg'];
    echo "</div>";
}

$email  = $password ='';
if(isset($_POST['loginpBtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

//    hash the password
    $password = md5($password);
//    chec if theres a record with the same email and password
//    if true login the user, take them to index page
        $sql = "SELECT `id`, `username`, `email`, `password` FROM `users` WHERE email='$email' AND password='$password'";
      $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
           $id = $row['id'];
           session_start();
           $_SESSION['kipande'] = $id;
           $_SESSION['loggedin'] = true;
//           $kipande = $id
            $success = "Login is successful, Have fun";
            header('location:index.php?login_success='.$success);
        }
    } else {
        //    if false  take user to login page and ask them to try again
//       $error = "Login unsuccessful, Please try again";
//       header('location:login.php?login_err='.$error);
        echo "Error ".$sql .mysqli_error($conn);
    }



}




?>



<div class="container">
    <div class="row">
        <div class="col col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
        <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter password" class="form-control" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="loginpBtn" value="Log in">
                </div>

            </form>
        </div>
        <div class="col col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
    </div>
</div>







<?php include 'footer.php'?>
