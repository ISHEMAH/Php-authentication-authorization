<?php
include('partials/header.php');

?>
    <div class="form-container-reg">
        <div class="overlay">
            <!--  -->
        </div>

        <div class="titleDiv">
            <h1 class="title">Sign Up</h1>
            <span class="subTitle">Get started</span>
        </div>
        <form action="" method="POST">
            <div class="rows grid">
                <!--username-->
                <div class="row">
                    <label for="username">User name</label>
                    <input type="text" id="username" name="username" placeholder="Enter username" required>
                </div>
                <!-- email -->
                <div class="row">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your Email" required>
                </div>
                <div class="row">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <!-- password -->
                <div class="row">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" placeholder="Enter password" required>
                </div>
                
                <div class="row">
                    <input type="submit" id="submit" name="submit" value="Register" required>
                    <span class="registerLink">Have an account? <a href="index.php">Login</a></span>
                </div>
            </div> 

        </form>
        
    </div> 

<?php
include('partials/footer.php');

?>


<?php

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO admin (usernames, email, passwords, phone) VALUES ('$username', '$email', '$password', '$phone')";



    $res = mysqli_query($conn, $sql);

    if($res == true){
        $_SESSION['accountCreated'] = '<span class="success">Account '.$username.'
        created!</span>';
        header('location:' .SITEURL.'index.php');
        exit();
    }
    else{
        $_SESSION['unSuccessful'] = '<span class="success">Account '.$username.'
        failed!</span>';
        header('location:' .SITEURL.'register.php');
        exit();  
    }
}

?>
