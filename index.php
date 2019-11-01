<?php
include 'header.php';
include 'config.php';
?>

<div class="container">
    <?php
    $sql ="SELECT * FROM `users`";
    $users = mysqli_query($conn, $sql);

    echo "<div class='row'>";
        while($rows = mysqli_fetch_assoc($users)){
            $id = $rows['id'];
            $email = $rows['email'];
            $username = $rows['username'];

            echo "<div class='col-md-4'>";
                echo "<a href=''>";
                    echo  "<div class='img-thumbnail'>";
                        echo "<img src='images/profile.png' class='img-thumbnail'>";
                        echo $username;
                        echo $email;
                    echo  "</div>";
                echo "</a>";
            echo "</div>";
        }
    echo "</div>";
    ?>
</div>
