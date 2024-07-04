
<?php
        include '../inc/db_conn.php'; 
        session_start();
        if(!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
            header("Location: index.php");
            exit;
        }
        $user_id = $_SESSION['id'];
                    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $admin = mysqli_fetch_assoc($select);
                    }
                //add student modal
                    if(isset($_POST['submittt'])){
                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $name = mysqli_real_escape_string($conn, $_POST['name']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
                        $location = mysqli_real_escape_string($conn, $_POST['location']);
                        $pass = mysqli_real_escape_string($conn, $_POST['password']);
                        $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
                        $classe = mysqli_real_escape_string($conn, $_POST['classe']);
                        $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
                        $image = $_FILES['image']['name'];
                        $image_size = $_FILES['image']['size'];
                        $image_tmp_name = $_FILES['image']['tmp_name'];
                        $image_folder = '../uploaded_img/'.$image;
                        $select = mysqli_query($conn, "SELECT * FROM `student` WHERE (email = '$email' AND password = '$pass') OR id = '$id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                            $student = mysqli_fetch_assoc($select);
                            if ($student['id'] == $id ) {
                            $message[] = 'id already exist'; 
                            }elseif ($student['email'] == $email && $student['password'] == $pass){
                            $message[] = 'user already exist';
                            }
                        }else{
                            if($pass != $cpass){
                                $message[] = 'confirm password not matched!';
                            }elseif($email != $cemail){
                                $message[] = 'confirm email not matched!';
                            }
                            else{
                                $insert = mysqli_query($conn, "INSERT INTO `student`(id, name, email, location, password, image, classe , sexe) VALUES('$id','$name', '$cemail','$location','$cpass', '$image', '$classe', '$sexe')") or die('query failed');

                                if($insert){
                                    move_uploaded_file($image_tmp_name, $image_folder);
                                    $message[] = 'registered successfully!';
                                }else{
                                    $message[] = 'registeration failed!';
                                }
                            }
                        }

                        }
                // PROFILE MODAL


                //add teacher modal
                    if(isset($_POST['submitatos'])){
                        $iddd = mysqli_real_escape_string($conn, $_POST['iddd']);
                        $name = mysqli_real_escape_string($conn, $_POST['name']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
                        $pass = mysqli_real_escape_string($conn, $_POST['password']);
                        $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
                        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
                        $image = $_FILES['image']['name'];
                        $image_size = $_FILES['image']['size'];
                        $image_tmp_name = $_FILES['image']['tmp_name'];
                        $image_folder = '../uploaded_img/'.$image;

                        $select = mysqli_query($conn, "SELECT * FROM `teacher` WHERE email = '$email' AND password = '$pass'") or die('query failed');

                        if(mysqli_num_rows($select) > 0){
                            $message[] = 'user already exist'; 
                        }else{
                            if($pass != $cpass){
                                $message[] = 'confirm password not matched!';
                            }elseif($email != $cemail){
                                $message[] = 'confirm email not matched!';
                            }elseif ($iddd<1000) {
                                $message[] = 'change id!';
                            }
                            else{
                                $insert = mysqli_query($conn, "INSERT INTO `teacher`(id,name, email, password,dept , image) VALUES('$iddd', '$name', '$email', '$cpass','$dept' , '$image')") or die('query failed');
                                $message[] = 'registered successfully!';
                            }
                        }

                        }
                // PROFILE MODAL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" />

     

    <title>Admin Dashboard</title>
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

                                                        <?php
                                                        $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
                                                        if(mysqli_num_rows($select) > 0){
                                                            $fetch = mysqli_fetch_assoc($select);
                                                        }
                                                        ?>

                                                        <form action="" method="post" enctype="multipart/form-data">
                                                        
                                                        <div class="flex">
                                                            <div class="inputBox">
                                                                <span>Id :</span>
                                                                <input type="number" value="<?php echo $fetch['id']; ?>" class="box" readonly>
                                                                <span>Username :</span>
                                                                <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box" readonly>
                                                                <span>Your email :</span>
                                                                <input type="text" name="update_email" value="<?php echo $fetch['email']; ?>" class="box" readonly>
                                                                
                                                            </div>
                                                            <div class="inputBox">
                                                                <span>password :</span>
                                                                <input type="text"  value="<?php echo $fetch['password']; ?>" class="box" readonly>
                                                                <span>your image :</span>
                                                                <?php
                                                                    if($fetch['image'] == ''){
                                                                    echo '<img src="images/default-avatar.png">';
                                                                    }else{
                                                                    echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                                                                    }
                                                                    if(isset($message)){
                                                                    foreach($message as $message){
                                                                        echo '<div class="message">'.$message.'</div>';
                                                                    }
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

                                                    <?php
                                                    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
                                                    if(mysqli_num_rows($select) > 0){
                                                        $fetch = mysqli_fetch_assoc($select);
                                                    }
                                                    ?>

                                                    <form action="" method="post" enctype="multipart/form-data">
                                                    <div class=" image-container p-5">
                                                    <?php
                                                        if($fetch['image'] == ''){
                                                            echo '<img src="images/default-avatar.png">';
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
                                                            <span>name :</span>
                                                            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                                                            <span>your email :</span>
                                                            <input type="text" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                                                            <span>conferm email :</span>
                                                            <input type="text" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                                                        </div>
                                                        <div class="inputBox">
                                                            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                                                            <span>old password :</span>
                                                            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                                                            <span>new password :</span>
                                                            <input type="password" name="new_pass" placeholder="enter new password" class="box">
                                                            <span>confirm password :</span>
                                                            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                                                        </div>
                                                    </div>
                                                    <input type="submit" value="update profile" name="update_profile" class="btn btn-success">
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                    </div>  
                                        <?php
                                                $user_id = $_SESSION['id'];
                                                if(isset($_POST['update_profile'])){
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

                                                $update_image = $_FILES['update_image']['name'];
                                                $update_image_size = $_FILES['update_image']['size'];
                                                $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
                                                $update_image_folder = '../uploaded_img/'.$update_image;

                                                if(!empty($update_image)){
                                                    if($update_image_size > 2000000){
                                                        $message[] = 'image is too large';
                                                    }else{
                                                        $image_update_query = mysqli_query($conn, "UPDATE `admin` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
                                                        if($image_update_query){
                                                            move_uploaded_file($update_image_tmp_name, $update_image_folder);
                                                        }
                                                        $message[] = 'image updated succssfully!';
                                                    }
                                                }
                                                }
                                        ?>
                        <!--fin UAPDATE profile form-->
      <?php include 'header.php'?>

                    <!-- Page Content -->

            <div class="container-fluid px-4">
                
            <div class="card-tools mb-3 mt-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa fa-plus"></i> Add New</button>
            </div>

                       <div class="row my-5">
                       <form action="" method="post">
                       <select class="form-select" aria-label="user select exemple" name="user_select">
                            <option value="1">student</option>
                            <option value="2">teacher</option>
                            <option value="3">parent</option>
                        </select>
                        <button type="subnet">chose</button>
                       </form>
                       <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $selectedOption = $_POST['user_select'];
                            if ($selectedOption == 1) { ?>
                            
                                    <div  class="col">
                                                <form method="post" action="student.php">
                                                    <div style="width:100%; float:left;" class="row mt-3">
                                                    <div class="col-md-3 ms-5 me-5">
                                                        <h4>Search with a hint</h4>
                                                        
                                                            <div id="search-autocomplete" class="form-outline">
                                                                <input type="text" placeholder="search..." id="sear" class="form-control" autocomplete="off"/>
                                                            </div>
                                                            
                                                </div>
                                                    <div class="col-md-3 ms-5">
                                                            <h4>choose the dept</h4>
                                                            <select style="width:100%; height: 40px;" name="dept" classe="form-control">
                                                                <option value=999>all</option>
                                                                <?php 
                                                                $query = "SELECT * FROM dept";
                                                                $result= mysqli_query($conn, $query) or die ('error');
                                                                if(mysqli_num_rows($result) > 0){
                                                                    while($row = mysqli_fetch_assoc($result)){
                                                                        ?>
                                                                <option value=<?php echo $row['id'];?>><?php echo $row['name'];?> </option>
                                                                <?php $x = $row['id']; } } ?>
                                                            </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h4>choose the classe</h4>
                                                            <select style="width:100%; height: 40px;" name="classe" classe="form-control">
                                                            <option value=999>all</option> 
                                                            <option value=1>1</option> 
                                                            <option value=2>2</option> 
                                                            <option value=3>3</option> 
                                                            <?php //$query = "SELECT * FROM classe where classe.dept = $x";
                                                            // $result= mysqli_query($conn, $query) or die ('error'); 
                                                            // if(mysqli_num_rows($result) > 0){ 
                                                        //while($row = mysqli_fetch_assoc($result)){?>
                                                        <!--<option value=<?php// echo $row['id']?>><?php// echo $row['name']?> </option> 
                                                                <?php //} } ?>-->
                                                            </select>
                                                    </div>
                                                
                                                    <div class="col-md-1 ms-5">
                                                        <br>
                                                        <input class="btn btn-primary mt-3" name="ssubmit" value="submit" type="submit" id="ssubmit">
                                                    </div>
                                                    </div>
                                                </form>
                                            <br><br><br>
                                            <div id="searchres">

                                        </div><br>
                                            <form action="" method="get">
                                                    <label for="rows" class="my-4"><h5>Select number of rows:</h5></label>
                                                    <select name="rows" id="rows" onchange="this.form.submit()" style="width:5%; height: 30px;">
                                                        <option value="5" <?php if(isset($_GET['rows']) && $_GET['rows'] == '5') echo 'selected'; ?>>5</option>
                                                        <option value="10" <?php if(isset($_GET['rows']) && $_GET['rows'] == '10') echo 'selected'; ?>>10</option>
                                                        <option value="15" <?php if(isset($_GET['rows']) && $_GET['rows'] == '15') echo 'selected'; ?>>15</option>
                                                        <option value="30" <?php if(isset($_GET['rows']) && $_GET['rows'] == '30') echo 'selected'; ?>>30</option>
                                                        <option value="50" <?php if(isset($_GET['rows']) && $_GET['rows'] == '50') echo 'selected'; ?>>50</option>
                                                    </select>
                                                </form>
                                    <table class="table bg-white rounded shadow-sm  table-hover">
                                        <thead>
                                            <tr>
                                            <th scope="col">#<button class="btn btn-sm btn-link" onclick="sortTable(1)"><i class="fas fa-sort"></i></button></th>
                                            <th scope="col">ID<button class="btn btn-sm btn-link" onclick="sortTable(2)"><i class="fas fa-sort"></i></button></th>
                                            <th scope="col">Name<button class="btn btn-sm btn-link" onclick="sortTable(3)"><i class="fas fa-sort"></i></button></th>
                                            <th scope="col">email<button class="btn btn-sm btn-link" onclick="sortTable(4)"><i class="fas fa-sort"></i></button></th>
                                            <th scope="col">password</th>
                                            <th scope="col">Classe<button class="btn btn-sm btn-link" onclick="sortTable(6)"><i class="fas fa-sort"></i></button></th>
                                            <th scope="col">dept<button class="btn btn-sm btn-link" onclick="sortTable(7)"><i class="fas fa-sort"></i></button></th>
                                            <th scope="col">parents<button class="btn btn-sm btn-link" onclick="sortTable(8)"><i class="fas fa-sort"></i></button></th>
                                            <th scope="col">certificat</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            $i = 1;
                                            $limit = isset($_GET['rows']) ? intval($_GET['rows']) : 4;
                                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            $start = ($page - 1) * $limit;
                                            $count_query = "SELECT count(*) as count FROM student";
                                            $count_result = $conn->query($count_query);
                                            $count_row = $count_result->fetch_assoc();
                                            $total_records = $count_row['count'];
                                            $total_pages = ceil($total_records / $limit);
                                            if (!isset($_POST['ssubmit'])||(isset($_POST['ssubmit']) && $_POST['dept']==999 && $_POST['classe']==999)){
                                                $query = "SELECT student.id, student.name, student.email, student.password, classe.name as classe, dept.name as dept, student.location FROM student
                                                JOIN classe ON student.classe=classe.id
                                                JOIN dept ON classe.dept=dept.id
                                                LIMIT $start, $limit";
                                            }elseif(isset($_POST['ssubmit']) && isset($_POST['dept']) && isset($_POST['classe'])){
                                                $dept = $_POST['dept'];
                                                $classe = $_POST['classe'];
                                                if ($dept!=999 && $classe!=999){
                                                    $query = "SELECT student.id, student.name, student.email, student.password, classe.name as classe, dept.name as dept, student.location FROM student
                                                    JOIN classe ON student.classe=classe.id
                                                    JOIN dept ON classe.dept=dept.id
                                                    where dept.id=$dept and classe=$classe
                                                    LIMIT $start, $limit";
                                                }elseif($dept==999 && $classe!=999){
                                                    $query = "SELECT student.id, student.name, student.email, student.password, classe.name as classe, dept.name as dept, student.location FROM student
                                                    JOIN classe ON student.classe=classe.id
                                                    JOIN dept ON classe.dept=dept.id
                                                    where classe=$classe
                                                    LIMIT $start, $limit";
                                                }elseif($dept!=999 && $classe==999){
                                                    $query = "SELECT student.id, student.name, student.email, student.password, classe.name as classe, dept.name as dept, student.location FROM student
                                                    JOIN classe ON student.classe=classe.id
                                                    JOIN dept ON classe.dept=dept.id
                                                    where dept.id=$dept
                                                    LIMIT $start, $limit";
                                                }elseif($dept==999 && $classe==999){
                                                    $query = "SELECT student.id, student.name, student.email, student.password, classe.name as classe, dept.name as dept, student.location FROM student
                                                    JOIN classe ON student.classe=classe.id
                                                    JOIN dept ON classe.dept=dept.id
                                                    LIMIT $start, $limit";
                                                }
                                            }
                                            $result = $conn->query($query);
                                            while($row = $result->fetch_assoc()):
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i++ ?></td>
                                                    <td class=""><b><?php echo $row['id'] ?></b></td>
                                                    <td><b><?php echo ucwords($row['name']) ?></b></td>
                                                    <td><?php echo $row['email']?></td>
                                                    <td><?php echo $row['password']?></td>
                                                    <td><?php echo $row['classe']?></td>
                                                    <td><?php echo $row['dept']?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="upparents.php?id=<?php echo $row['id'];?>" class="btn btn-success btn-flat ">
                                                            <i class="fas fa-eye mx-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="imprimer.php?id=<?php echo $row['id'];?>" class="btn btn-success btn-flat ">
                                                            <i class="fa-solid fa-print mx-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="viewst.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-flat">
                                                                <i class="fas fa-eye mx-2"></i>
                                                            </a>

                                                            <a href="upstudent.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
                                                                <i class="fas fa-edit mx-2"></i>
                                                            </a>
                                                            <a name="delete" href="student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure you want to delete this record?')">
                                                                <i class="fas fa-trash mx-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>   
                                            

                                            <?php endwhile;

                                            //delete php forme 

                                            if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $conn->query("DELETE FROM sturent WHERE idstudent='" . $id . "'");
                                                $conn->query("DELETE FROM absence WHERE idstudent='" . $id . "'");                            
                                                $conn->query("DELETE FROM notes WHERE idstudent='" . $id . "'");                            
                                                $conn->query("DELETE FROM student WHERE id='" . $id . "'");
                                                echo '<div class="alert alert-success">Student deleted successfully</div>';
                                            }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php 
                                    $end = min($start + $limit - 1, $total_records - 1);
                                    echo "<nav aria-label='Page navigation example'>
                                            <ul class='pagination'>
                                                <li>Showing " . ($start + 1) . " to " . ($end + 1) . " from " . $total_records . "</li>
                                            </ul>
                                        </nav>";
                                        ?>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <?php if($page > 1): ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a></li>
                                            <?php else: ?>
                                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                            <?php endif; ?>

                                            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                            <?php endfor; ?>

                                            <?php if($page < $total_pages): ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a></li>
                                            <?php else: ?>
                                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>

                                    </div>
                            
                           <?php } elseif ($selectedOption == 2) {?>
                                
                                <div class="mb-3"><h4>Search with a hint</h4>
                                        <div style="width:30%" class="form-outline ">
                                            <input type="text" placeholder="search..." id="sear" class="form-control" autocomplete="off"/>
                                        </div>
                                        <br>
                                    </div><br>
                                    <div id="searchres" class="mb-3">
        
                                    </div>
                                <div class="col">
                                    <h3>all teachers</h3>
                                    <table class="table bg-white rounded shadow-sm  table-hover">
                                    <thead>
                                                <tr>
                                                    <th scope="col">#<button class="btn btn-sm btn-link" onclick="sortTable(1)"><i class="fas fa-sort"></i></th>
                                                    <th scope="col">ID<button class="btn btn-sm btn-link" onclick="sortTable(2)"><i class="fas fa-sort"></i></th>
                                                    <th scope="col">Name<button class="btn btn-sm btn-link" onclick="sortTable(3)"><i class="fas fa-sort"></i></th>
                                                    <th scope="col">email<button class="btn btn-sm btn-link" onclick="sortTable(4)"><i class="fas fa-sort"></i></th>
                                                    <th scope="col">password</th>
                                                    <th scope="col">filier<button class="btn btn-sm btn-link" onclick="sortTable(6)"><i class="fas fa-sort"></i></th>
                                                    <th scope="col">Add absence</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    $qry = $conn->query("SELECT * FROM teacher");
                                                    while($row= $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i++ ?></td>
                                                    <td class=""><b><?php echo $row['id'] ?></b></td>
                                                    <td><b><?php echo ucwords($row['name']) ?></b></td>
                                                    <td><?php echo $row['email']?></td>
                                                    <td><?php echo $row['password']?></td>
                                                    <td><?php echo $row['dept']?></td>
                                                    <td><a href="teachabs.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-flat ms-4">
                                                            <i class="fas fa-add mx-3"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="upteacher.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
                                                            <i class="fas fa-edit mx-2"></i> 
                                                            </a>
                                                            <a name="delete" href="teachers.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-flat delete_student">
                                                            <i class="fas fa-trash mx-2"></i>
                                                        </a>  
                                                    </div>
                                                    </td>
                                                </tr>	
                                                <?php endwhile;
                                                if (isset($_GET['id'])) {
                                                    $id = $_GET['id'];
                                                
                                                    // Delete associated records from teachabs
                                                    $conn->query("DELETE FROM teachabs WHERE idteach IN (SELECT id FROM teacher WHERE id = '" . $id . "')");
                                                
                                                    // Delete associated records from emploi
                                                    $conn->query("DELETE FROM emploi WHERE teachclasse IN (SELECT id FROM teachclasse WHERE teachid = '" . $id . "')");
                                                
                                                    // Delete associated records from teachclasse
                                                    $conn->query("DELETE FROM teachclasse WHERE teachid = '" . $id . "'");
                                                
                                                    // Delete the teacher record
                                                    $conn->query("DELETE FROM teacher WHERE id = '" . $id . "'");
                                                
                                                    echo '<div class="alert alert-success">Teacher deleted successfully</div>';
                                                }
                                                
                                                
                                                
                                                ?>
        
                                            </tbody>
                                        
                                    </table>
                                    
                                </div>
                            
                                <?php  }
                       } else {
                            $greeting = '';
                        }
                        ?>
                      
                            
                     <!--add student formbox-->
                        <div class="modal fade " id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg ">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h3 style=" font-size: 30px; color: green; text-transform: uppercase;">register now</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="update-profile">
                                    <form  method="post" enctype="multipart/form-data">
                                    
                                        <?php
                                            if(isset($message)){
                                                foreach($message as $message){
                                                    echo "<script>alert('$message');</script>";
                                                }
                                            }
                                        ?>
                                        <div class="flex ">
                                            <div class="inputBox">
                                                <label class="form-label">username</label>
                                                <input type="text" name="name" placeholder="enter username" class="form-control" required>
                                            </div>
                                            <div class="inputBox">
                                                <label  class="form-label">image</label>
                                                <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png">
                                            </div>
                                            
                                        </div>
                                        <div class="flex">
                                            <div class="inputBox">
                                                <label class="form-label">id</label>
                                                <input type="number" name="id" placeholder="enter id" class="form-control" required>
                                            </div>
                                            <div class="inputBox">
                                                <label class="form-label">location</label>
                                                <input type="text" name="location" placeholder="enter location" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="inputBox">
                                                <label  class="form-label">email</label>
                                                <input type="email" name="email" placeholder="enter email" class="form-control" required>
                                        </div>
                                        <div class="inputBox">
                                                <label  class="form-label">conferm email</label>
                                                <input type="email" name="cemail" placeholder="conferm email" class="form-control" required>
                                        </div>
                                        </div>
                                        <div class="flex">
                                        <div class="inputBox">
                                            <label  class="form-label">Password</label>
                                            <input type="password" name="password" placeholder="enter password" class="form-control" required>
                                        </div>
                                        <div class="inputBox">
                                            <label  class="form-label">Confirm password</label>
                                            <input type="password" name="cpassword" placeholder="confirm password" class="form-control" required>
                                        </div>
                                        </div>
                                        <div class="flex" >
                                        <div class="inputBox">
                                        <label  class="form-label">sexe</label>
                                            <select name="sexe" id="sexe" class="form-control">
                                                <option selected>-------</option>
                                                <?php 
                                                 $query = "SELECT * FROM sexe";
                                                 $result= mysqli_query($conn, $query) or die ('error');
                                                 if(mysqli_num_rows($result) > 0){
                                                    while($row = mysqli_fetch_assoc($result)){?>
                                                   <option value=<?php echo $row['id']?>><?php echo $row['name']?> </option>
                                                   <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="inputBox">
                                        <label  class="form-label">classe</label>
                                            <select name="classe" id="classe" class="form-control">
                                                <option selected>-------</option>
                                                <?php 
                                                 $query = "SELECT classe.id as idd, classe.name as namee, classe.dept, dept.id, dept.name as deptt FROM classe
                                                 JOIN dept ON classe.dept=dept.id";
                                                 $result= mysqli_query($conn, $query) or die ('error');
                                                 if(mysqli_num_rows($result) > 0){
                                                    while($row = mysqli_fetch_assoc($result)){?>
                                                   <option value=<?php echo $row['idd']?>><?php echo $row['deptt']; echo $row['namee'];?></option>
                                                   <?php }} ?>
                                            </select>
                                        </div>
                                        </div>
                                        <input type="submit" name="submittt" value="register now" class="btn btn-primary">

                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- fin add student formbox-->

                     <!--add teacher formbox-->
                                    <div class="modal fade " id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg ">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h3 style=" font-size: 30px; color: green; text-transform: uppercase;">register now</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            <div class="update-profile">
                                                <form  method="post" enctype="multipart/form-data">
                                                
                                                    <?php
                                                        if(isset($message)){
                                                            foreach($message as $message){
                                                                echo "<script>alert('$message');</script>";
                                                            }
                                                        }
                                                    ?>
                                                    <div class="flex ">
                                                        <div class="inputBox">
                                                            <label class="form-label">username</label>
                                                            <input type="text" name="name" placeholder="enter username" class="form-control" required>
                                                        </div>
                                                        <div class="inputBox">
                                                            <label  class="form-label">image</label>
                                                            <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                    <div class="inputBox">
                                                            <label  class="form-label">email</label>
                                                            <input type="email" name="email" placeholder="enter email" class="form-control" required>
                                                    </div>
                                                    <div class="inputBox">
                                                            <label  class="form-label">conferm email</label>
                                                            <input type="email" name="cemail" placeholder="conferm email" class="form-control" required>
                                                    </div>
                                                    </div>
                                                    <div class="flex">
                                                    <div class="inputBox">
                                                        <label  class="form-label">Password</label>
                                                        <input type="password" name="password" placeholder="enter password" class="form-control" required>
                                                    </div>
                                                    <div class="inputBox">
                                                        <label  class="form-label">Confirm password</label>
                                                        <input type="password" name="cpassword" placeholder="confirm password" class="form-control" required>
                                                    </div>
                                                    </div>
                                                    <div class="flex" >
                                                    <div class="inputBox">
                                                        <label class="form-label">Departement</label>
                                                        <select name="dept" class="form-control">
                                                                <option value=999>all</option>
                                                                <?php 
                                                                $query = "SELECT * FROM dept";
                                                                $result= mysqli_query($conn, $query) or die ('error');
                                                                if(mysqli_num_rows($result) > 0){
                                                                    while($row = mysqli_fetch_assoc($result)){
                                                                        ?>
                                                                <option value=<?php echo $row['id'];?>><?php echo $row['name'];?> </option>
                                                                <?php } } ?>
                                                        </select>
                                                    </div>
                                                    <div class="inputBox">
                                                        <label  class="form-label"> id</label>
                                                        <input type="number" name="iddd" class="form-control" required>
                                                    </div>
                                                        <input type="submit" name="submitatos" value="register now" class="btn btn-primary">
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <!-- fin add teacher formbox-->

                    

                    

                   
                </div>
            </div>
        </div>
    </div>
<h6 class="text-center bg-dark text-white p-3 m-0"> Copyright @ <?php echo date("Y")?>. MEKKAOUI ABD-ESSAMAD | 15/03/2023 | SCHOOL MANAGMENT SYSTEM| ECOL NORMAL SUPERIEUR, MARRAKECH.  All Rights Reserved.</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

         $("#sear").keyup(function () {
                var input = $(this).val();
                if(input != ""){
                    $.ajax({
                        url: "studentsearch.php",
                        method: "POST",
                        data: {input: input},

                        success: function (data) {
                            $("#searchres").html(data);
                            $("#searchres").css("display","block");
                        }
                        });

                    }else{
                        $("#searchres").css("display","none");
                    }
                });
            });

    </script>
    
    <script>
       function sortTable(colIndex) {
        var table = document.querySelector('.table');
        var tbody = table.querySelector('tbody');
        var rows = Array.from(tbody.querySelectorAll('tr'));
        var sortOrder = table.getAttribute('data-sort-order') || 'asc';

        rows.sort(function(a, b) {
            var aValue = a.querySelector('td:nth-child(' + colIndex + ')').textContent;
            var bValue = b.querySelector('td:nth-child(' + colIndex + ')').textContent;
            return sortOrder === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
        });

        tbody.innerHTML = '';
        rows.forEach(function(row) {
            tbody.appendChild(row);
        });

        if (sortOrder === 'asc') {
            table.setAttribute('data-sort-order', 'desc');
        } else {
            table.setAttribute('data-sort-order', 'asc');
        }
        }

    </script>
</body>

</html>