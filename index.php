<?php
include('partials/header.php')
?>

<?php

    if(isset($_SESSION['accountCreated'])){
        echo $_SESSION['accountCreated'];
        unset($_SESSION['accountCreated']);
    }
?>


    <div class="form-container">
        
        <div class="overlay">
            <!--  -->
        </div>

        <div class="titleDiv">
            <h1 class="title">Login</h1>
            <span class="subTitle">Welcome back!</span>
        </div>

<?php
if(isset($_SESSION['noAdmin'])){
    echo $_SESSION['noAdmin'];
    unset($_SESSION['noAdmin']);
}

?>













        <form action="" method="POST">
            <div class="rows grid">
                <!--username-->
                <div class="row">
                    <label for="username">User name</label>
                    <input type="text" id="username" name="username" placeholder="Enter username" required>
                </div>
                <!-- password -->
                <div class="row">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" placeholder="Enter password" required>
                </div>
                
                <div class="row">
                    <input type="submit" id="submit" name="submit" value="Login" required>
                    <span class="registerLink">Don't have an account? <a href="register.php">Register</a></span>
                </div>
            </div> 

        </form>
        
           
    </div>

<?php
include('partials/footer.php')
?>

<?php

if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE usernames = '$username' AND passwords = '$password'";

    $result = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);

    if($count ==1){
        $_SESSION['loginMessage']= '<span class="success">Welcome '.$username.'</span>';
        header('location:' .SITEURL. 'dashboard.php');
        exit();
    }
    else{
        $_SESSION['noAdmin']= '<span class="fail"> '.$username.' is not registered!</span>';
        header('location:' .SITEURL. 'index.php');
        exit();
    }
}

?>
