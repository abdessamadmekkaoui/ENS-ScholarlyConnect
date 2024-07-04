<?php

    include '../inc/db_conn.php'; 
    session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    header("Location: index.php");
    exit;
    }
    $user_id = $_SESSION['id'];
    $id = $_GET['id'];
    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
    $admin = mysqli_fetch_assoc($select);
    }

    if(isset($_POST['upparentsinfos'])){

    $update_loca = mysqli_real_escape_string($conn, $_POST['phonee']);
    $update_email = mysqli_real_escape_string($conn, $_POST['emaill']);

    mysqli_query($conn, "UPDATE `parents` SET phone = '$update_loca', email = '$update_email' WHERE id = '$id'") or die('query failed');

    $old_pass = $_POST['passs'];
    $new_pass = $_POST['cpasss'];

    if(!empty($old_pass) && !empty($new_pass)){
        if($new_pass != $old_pass){
            $message[] = 'new password not matched!';
        }else{
            mysqli_query($conn, "UPDATE `parents` SET password = '$new_pass' WHERE id = '$id'") or die('query failed');
            $message[] = 'password updated successfully!';
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = '../uploaded_img/'.$update_image;

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'image is too large';
        }else{
            $image_update_query = mysqli_query($conn, "UPDATE `parents` SET image = '$update_image' WHERE id = '$id'") or die('query failed');
            if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image updated succssfully!';
        }
    }

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" />

            <style>

                    :root {
                    --main-text-color: #00a;
                    --second-text-color: #a00;
                    --second-bg-color: #aaa;
                    }

                    .primary-text {
                    color: var(--main-text-color);
                    }

                    .second-text {
                    color: var(--second-text-color);
                    }

                    .secondary-bg {
                    background-color: var(--second-bg-color);
                    }

                    .rounded-full {
                    border-radius: 100%;
                    }

                    #wrapper {
                    overflow-x: hidden;
                    background-color: #bcc;
                    }

                    #sidebar-wrapper {
                    min-height: 100vh;
                    margin-left: -15rem;
                    -webkit-transition: margin 0.25s ease-out;
                    -moz-transition: margin 0.25s ease-out;
                    -o-transition: margin 0.25s ease-out;
                    transition: margin 0.25s ease-out;
                    }

                    #sidebar-wrapper .sidebar-heading {
                    padding: 0.875rem 1.25rem;
                    font-size: 1.2rem;
                    }

                    #sidebar-wrapper .list-group {
                    width: 15rem;
                    }

                    #page-content-wrapper {
                    min-width: 100vw;
                    }

                    #wrapper.toggled #sidebar-wrapper {
                    margin-left: 0;
                    }

                    #menu-toggle {
                    cursor: pointer;
                    }

                    .list-group-item {
                    border: none;
                    padding: 20px 30px;
                    }

                    .list-group-item.active {
                    background-color: transparent;
                    color: var(--main-text-color);
                    font-weight: bold;
                    border: none;
                    }

                    @media (min-width: 768px) {
                    #sidebar-wrapper {
                        margin-left: 0;
                    }

                    #page-content-wrapper {
                        min-width: 0;
                        width: 100%;
                    }

                    #wrapper.toggled #sidebar-wrapper {
                        margin-left: -15rem;
                    }
                    }

                    </style>
                    <title>update profile</title>

                    <!-- custom css file link  -->
                    <style>
                    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

                    :root{
                    --blue: #00a;
                    --dark-blue:#2980b9;
                    --red:#e74c3c;
                    --dark-red:#a00;
                    --black:#333;
                    --white:#fff;
                    --light-bg:#bcc;
                    --box-shadow:0 5px 10px rgba(0,0,0,.1);
                    }

                    *{
                    font-family: 'Poppins', sans-serif;
                    margin:0; padding:0;
                    box-sizing: border-box;
                    outline: none; border: none;
                    text-decoration: none;
                    }

                    *::-webkit-scrollbar{
                    width: 10px;
                    }

                    *::-webkit-scrollbar-track{
                    background-color: transparent;
                    }

                    *::-webkit-scrollbar-thumb{
                    background-color: var(--blue);
                    }

                    .btn,
                    .delete-btn{
                    width: 100%;
                    border-radius: 5px;
                    padding:10px 30px;
                    color:var(--white);
                    display: block;
                    text-align: center;
                    cursor: pointer;
                    font-size: 20px;
                    margin-top: 10px;
                    }

                    .btn{
                    background-color: var(--blue);
                    }

                    .btn:hover{
                    background-color: var(--dark-blue);
                    }

                    .delete-btn{
                    background-color: var(--red);
                    }

                    .delete-btn:hover{
                    background-color: var(--dark-red);
                    }

                    .message{
                    margin:10px 0;
                    width: 100%;
                    border-radius: 5px;
                    padding:10px;
                    text-align: center;
                    background-color: var(--red);
                    color:var(--white);
                    font-size: 20px;
                    }

                    .form-container{
                    min-height: 100vh;
                    background-color: var(--light-bg);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding:20px;
                    }

                    .form-container form{
                    padding:20px;
                    background-color: var(--white);
                    box-shadow: var(--box-shadow);
                    text-align: center;
                    width: 500px;
                    border-radius: 5px;
                    }

                    .form-container form h3{
                    margin-bottom: 10px;
                    font-size: 30px;
                    color:var(--black);
                    text-transform: uppercase;
                    }

                    .form-container form .box{
                    width: 100%;
                    border-radius: 5px;
                    padding:12px 14px;
                    font-size: 18px;
                    color:var(--black);
                    margin:10px 0;
                    background-color: var(--light-bg);
                    }

                    .form-container form p{
                    margin-top: 15px;
                    font-size: 20px;
                    color:var(--black);
                    }

                    .form-container form p a{
                    color:var(--red);
                    }

                    .form-container form p a:hover{
                    text-decoration: underline;
                    }

                    .container{
                    min-height: 100vh;
                    background-color: var(--light-bg);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding:20px;
                    }

                    .container .profile{
                    padding:20px;
                    background-color: var(--white);
                    box-shadow: var(--box-shadow);
                    text-align: center;
                    width: 400px;
                    border-radius: 5px;
                    }

                    .container .profile img{
                    height: 150px;
                    width: 150px;
                    border-radius: 50%;
                    object-fit: cover;
                    margin-bottom: 5px;
                    }

                    .container .profile h3{
                    margin:5px 0;
                    font-size: 20px;
                    color:var(--black);
                    }

                    .container .profile p{
                    margin-top: 20px;
                    color:var(--black);
                    font-size: 20px;
                    }

                    .container .profile p a{
                    color:var(--red);
                    }

                    .container .profile p a:hover{
                    text-decoration: underline;
                    }

                    .update-profile{
                    min-height: 100vh;
                    background-color: var(--light-bg);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding:20px;
                    }

                    .update-profile form{
                    padding:20px;
                    background-color: var(--white);
                    box-shadow: var(--box-shadow);
                    text-align: center;
                    width: 700px;
                    text-align: center;
                    border-radius: 5px;
                    }

                    .update-profile form img{
                    height: 200px;
                    width: 200p;
                    border-radius: 50%;
                    object-fit: cover;
                    margin-bottom: 5px;
                    }

                    .update-profile form .flex{
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 20px;
                    gap:15px;
                    }

                    .update-profile form .flex .inputBox{
                    width: 49%;
                    }

                    .update-profile form .flex .inputBox span{
                    text-align: left;
                    display: block;
                    margin-top: 15px;
                    font-size: 17px;
                    color:var(--black);
                    }

                    .update-profile form .flex .inputBox .box{
                    width: 100%;
                    border-radius: 5px;
                    background-color: var(--light-bg);
                    padding:12px 14px;
                    font-size: 17px;
                    color:var(--black);
                    margin-top: 10px;
                    }

                    @media (max-width:650px){
                    .update-profile form .flex{
                        flex-wrap: wrap;
                        gap:0;
                    }
                    .update-profile form .flex .inputBox{
                        width: 100%;
                    }
                    }
            </style>
    </head>
<body>
<div class="d-flex" id="wrapper">
            <!--profile form-->
                        <div class="modal fade " id="profilModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h3 style=" font-size: 30px; color: green; text-transform: uppercase;">your profile</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="update-profile">

                                           

                                            <form action="" method="post" enctype="multipart/form-data">
                                            
                                            <div class="flex">
                                                <div class="inputBox">
                                                    <span>Id :</span>
                                                    <input type="number" value="<?php echo $admin['id']; ?>" class="box" readonly>
                                                    <span>Username :</span>
                                                    <input type="text" name="update_name" value="<?php echo $admin['name']; ?>" class="box" readonly>
                                                    <span>Your email :</span>
                                                    <input type="text" name="update_email" value="<?php echo $admin['email']; ?>" class="box" readonly>
                                                    
                                                </div>
                                                <div class="inputBox">
                                                    <span>password :</span>
                                                    <input type="text"  value="<?php echo $admin['password']; ?>" class="box" readonly>
                                                    <span>your image :</span>
                                                    <?php
                                                        if($admin['image'] == ''){
                                                        echo '<img src="images/default-avatar.png">';
                                                        }else{
                                                        echo '<img src="../uploaded_img/'.$admin['image'].'">';
                                                        }
                                                       
                                                    ?>
                                                </div>
                                            </div>
                                            <a class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#upprofilModal">Update Profile</a>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                                    <style>
                                            .update-profile{
                                            background-color: #bcc;
                                            display: flex;
                                            }

                                            .update-profile form{
                                            margin:10%;
                                            padding:2%;
                                            background-color: #fff;
                                            box-shadow: 0 5px 10px rgba(0,0,0,.1);
                                            width: 700px;
                                            text-align: center;
                                            border-radius: 5px;
                                            }

                                            .update-profile form img{
                                            height: 50%;
                                            width: 50%;
                                            border-radius: 10%;
                                            object-fit: cover;
                                            margin-top:10px;
                                            margin-bottom: 5px;
                                            margin-left: -30px;
                                            }

                                            .update-profile form .flex{
                                            display: flex;
                                            justify-content: space-between;
                                            margin-bottom: 20px;
                                            gap:15px;
                                            }

                                            .update-profile form .flex .inputBox{
                                            width: 49%;
                                            }

                                            .update-profile form .flex .inputBox span{
                                            text-align: left;
                                            display: block;
                                            margin-top: 15px;
                                            font-size: 17px;
                                            color:#333;
                                            }

                                            .update-profile form .flex .inputBox .box{
                                            width: 100%;
                                            border-radius: 5px;
                                            background-color: #bcc;
                                            padding:12px 14px;
                                            font-size: 17px;
                                            color:#333;
                                            margin-top: 10px;
                                            }

                                            @media (max-width:650px){
                                            .update-profile form .flex{
                                                flex-wrap: wrap;
                                                gap:0;
                                            }
                                            .update-profile form .flex .inputBox{
                                                width: 100%;
                                            }
                                            }
                                    </style>
            <!--fin profile form-->
            <!--UPDATE profile form-->
                        <div class="modal fade " id="upprofilModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg ">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h3 style=" font-size: 30px; color: green; text-transform: uppercase;">Update profile</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="update-profile">
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class=" image-container p-5">
                                        <?php
                                            if($admin['image'] == ''){
                                                echo '<img src="images/default-avatar.png">';
                                            }else{
                                                echo '<img src="../uploaded_img/'.$admin['image'].'">';
                                            }
                                           
                                        ?>
                                        <style>
                                            .image-container {
                                            position: relative;
                                            }

                                            .icon-overlay {
                                            position: absolute;
                                            top: -120px;
                                            left: 90px;
                                            width: 100%;
                                            height: 100%;
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                            opacity: 0;
                                            transition: opacity 0.2s ease-in-out;
                                            }

                                            .image-container:hover .icon-overlay {
                                            opacity: 1;
                                            }

                                            .fa-file {
                                            color: #fff;
                                            font-size: 24px;
                                            }

                                        </style>
                                        <div class="icon-overlay">
                                        <label for="finput">
                                            <i class="fa-solid fa-pen-to-square fa-2xl" style="width:350%; color: #05d5ff;"></i>
                                        </label>
                                        </div> 
                                    </div>
                                        <div class="flex">
                                            <div class="inputBox">
                                                <span>name :</span>
                                                <input type="text" name="update_name" value="<?php echo $admin['name']; ?>" class="box">
                                                <span>your email :</span>
                                                <input type="text" name="update_email" value="<?php echo $admin['email']; ?>" class="box">
                                                <span>conferm email :</span>
                                                <input type="text" name="update_email" value="<?php echo $admin['email']; ?>" class="box">
                                            </div>
                                            <div class="inputBox">
                                                <input type="hidden" name="old_pass" value="<?php echo $admin['password']; ?>">
                                                <span>old password :</span>
                                                <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                                                <span>new password :</span>
                                                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                                                <span>confirm password :</span>
                                                <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                                            </div>
                                        </div>
                                        <input type="submit" value="update profile" name="upprofile" class="btn btn-success">
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                        </div>  
                            <?php
                                    if(isset($_POST['upprofile'])){
                                    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
                                    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
                                    mysqli_query($conn, "UPDATE `admin` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
                                    $old_pass = $_POST['old_pass'];
                                    $update_pass = $_POST['update_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $confirm_pass = $_POST['confirm_pass'];

                                    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
                                        if($update_pass != $old_pass){
                                            $message[] = 'old password not matched!';
                                        }elseif($new_pass != $confirm_pass){
                                            $message[] = 'confirm password not matched!';
                                        }else{
                                            mysqli_query($conn, "UPDATE `admin` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
                                            $message[] = 'password updated successfully!';
                                        }
                                    }

                                 

                                    }

                            ?>
            <!--fin UAPDATE profile form-->

<?php include 'header.php'?>

<div class="update-profile">

<?php
            $select = mysqli_query($conn, "SELECT parents.image,parents.name,parents.email,parents.password,parents.id as idd,parents.phone,student.id,sturent.idparent,sturent.idstudent 
            FROM student join sturent on student.id=sturent.idstudent 
            join parents on sturent.idparent=parents.id 
            WHERE sturent.idstudent = '$id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
            }
?>

<form action="" method="post" enctype="multipart/form-data">
            <div class=" image-container p-5">
               <?php
                    if($fetch['image'] == ''){
                        echo '<img src="../uploaded_img/avatar.png"> <h5 style="color:red;">No picture has been entered!!</h5>';
                    }else{
                        echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                    }
                    if(isset($message)){
                        foreach($message as $message){
                            echo '<div class="message">'.$message.'</div>';
                        }
                    }
               ?>
                <style>
                    .image-container {
                    position: relative;
                    }

                    .icon-overlay {
                    position: absolute;
                    top: -120px;
                    left: 90px;
                    width: 100%;
                    height: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    opacity: 0;
                    transition: opacity 0.2s ease-in-out;
                    }

                    .image-container:hover .icon-overlay {
                    opacity: 1;
                    }

                    .fa-file {
                    color: #fff;
                    font-size: 24px;
                    }

                </style>
                <div class="icon-overlay">
                <label for="finput">
                    <i class="fa-solid fa-pen-to-square fa-2xl" style="width:350%; color: #05d5ff;"></i>
                </label>
                </div> 
                <input id="finput" style="display:none;" type="file" name="update_image" accept="image/jpg, image/jpeg, image/png">
              </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Name :</span>
                        <input type="text" name="namee" value="<?php echo $fetch['name']; ?>" class="box">
                        <span>Your email :</span>
                        <input type="text" name="emaill" value="<?php echo $fetch['email']; ?>" class="box">
                        <span> Your password :</span>
                        <input type="text" name="passs" value="<?php echo $fetch['password']; ?>" class="box">
                        </div>
                        <div class="inputBox">
                        <span>ID :</span>
                        <input type="number" name="idd" value="<?php echo $fetch['idd']; ?>"  class="box">
                        <span>Phone :</span>
                        <input type="number" name="phonee" value="<?php echo $fetch['phone']; ?>" class="box">
                        <span>Confirm password :</span>
                        <input type="password" name="cpasss" placeholder="confirm new password" class="box">
                        </div>
                        </div>
                        <input type="submit" value="update profile" name="upparentsinfos" class="btn">
                        <a href="student.php" class="delete-btn">go back</a>
                        </form>
                    </div>
                </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
    el.classList.toggle("toggled");
    };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>