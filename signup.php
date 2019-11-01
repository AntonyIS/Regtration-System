<?php
include 'header.php';
include "config.php";
//1.grab data from the html form
//    $check if pass match
//2.check if the user exist in the db
//    $if true take them to login page with a message
//    $if false continue reg proccess
//3. if everything is ok add user to db, then go to login page
//
//1.grabbing data
//1.1 declare varibales that will store form data
$username = $email = $password1 =$password2 = '';
$username_err = $email_err = $password1_err =$password2_err = '';
if(isset($_POST['signupBtn'])){
//    grab data
    $username =$_POST['username'];
    $email =$_POST['email'];
    $password1 =$_POST['password1'];
    $password2 =$_POST['password2'];

//    check if variables are enpty
//    check if pass match
        if($password1 !== $password2){
            $password1_err = "Password did not match";
            header('location:signup.php?passwoord_err='.$password1);
            exit();
        }else{
            $password1 = md5($password1);
        }
    //        check if user exist in bd
        $sql = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
           $signup_err = "User already exist,Please login";
           header('location:login.php?signup_err='.$signup_err);
           exit();
        }
//    Add user into the databse

    $sql = "INSERT INTO `users`(`id`, `username`, `email`, `password`) VALUES (NULL,'$username','$email',
'$password1')";
    if(mysqli_query($conn, $sql)){
//        if successful send user to login with a success message
        $success= "Signup successful, Login";
        header('location:login.php?success_msg='.$success);
        exit();
    }else{
//        if unsuccessful send user back to signup with a messsage
        $error = "Something went wrong, try again";
        header('location:signup.php?error_msg='.$error);
        exit();

    }





}




?>







<div class="container">
    <div class="row">
        <div class="col col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
        <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Enter username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password1" placeholder="Enter password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password2" placeholder="Confirm password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="signupBtn" value="Create account">
                </div>

            </form>
        </div>
        <div class="col col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
    </div>
</div>















<?php include 'footer.php'?>
