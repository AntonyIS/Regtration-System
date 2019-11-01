<?php
include 'header.php';
include 'config.php';

if(isset($_GET['success_msg'])){
    echo "<div class='alert alert-success'>";
//        $message = $_GET['success_msg'];
        echo  $_GET['success_msg'];
    echo "</div>";
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
