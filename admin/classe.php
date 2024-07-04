
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

           //add CLASSE modal

            if(isset($_POST['submittt'])){

                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $dept = mysqli_real_escape_string($conn, $_POST['dept']);
             

                $select = mysqli_query($conn, "SELECT * FROM `classe` WHERE name = '$name' AND dept = '$dept'") or die('query failed');

                if(mysqli_num_rows($select) > 0){
                    $message[] = 'user already exist'; 
                }else{
                        $insert = mysqli_query($conn, "INSERT INTO `classe`(name, dept) VALUES('$name', '$dept')") or die('query failed');
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

     
    <title>CLASSES-space</title>
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
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                    <div class=" image-container p-5">
                                                    <?php
                                                        if($admin['image'] == ''){
                                                            echo '<img src="images/default-avatar.png">';
                                                        }else{
                                                            echo '<img src="../uploaded_img/'.$admin['image'].'">';
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
                            
                            

                                <div class="row my-5">
                                        <div class="card-tools mb-3 mt-5">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa fa-plus"></i> Add New</button>
                                        </div>
                                    
                    <!--add classe formbox-->
                        <div class="modal fade " id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg ">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h3 style=" font-size: 30px; color: green; text-transform: uppercase;">register now</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="update-profile">
                                        <form  method="post" enctype="multipart/form-data">
                                            <div class="flex ">
                                                <div class="inputBox">
                                                    <label class="form-label">name</label>
                                                    <input type="number" name="name" placeholder="enter nb name" class="form-control" required>
                                                </div>
                                                <div class="inputBox">
                                                        <label  class="form-label">dept</label>
                                                        <select style="width:100%; height: 40px;" name="dept" classe="form-control">
                                                            <?php 
                                                            $query = "SELECT * FROM dept";
                                                            $result= mysqli_query($conn, $query) or die ('error');
                                                            if(mysqli_num_rows($result) > 0){
                                                                while($row = mysqli_fetch_assoc($result)){ ?>
                                                            <option value=<?php echo $row['id'];?>><?php echo $row['name'];} }?> </option>
                                                        </select>
                                                </div>
                                                <input type="submit" name="submittt" value="register now" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- fin add teacher formbox-->

                   

                        <div class="mb-3"><h4>Search with a hint</h4>
                            <div style="width:30%" class="form-outline ">
                                <input type="text" placeholder="search..." id="sear" class="form-control" autocomplete="off"/>
                            </div>
                            <br>
                        </div><br>
                        <div id="searchres" class="mb-3">

                        </div>
                       <div class="col">
                        <h3>all classes</h3>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                         <thead>
                                    <tr>
                                        <th scope="col">#<button class="btn btn-sm btn-link" onclick="sortTable(1)"><i class="fas fa-sort"></i></button></th>
                                        <th scope="col"> ID<button class="btn btn-sm btn-link" onclick="sortTable(2)"><i class="fas fa-sort"></i></button></th>
                                        <th scope="col">dept<button class="btn btn-sm btn-link" onclick="sortTable(3)"><i class="fas fa-sort"></i></button></th>
                                        <th scope="col">Name<button class="btn btn-sm btn-link" onclick="sortTable(4)"><i class="fas fa-sort"></i></button></th>
                                      
                                        <th scope="col">absence</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $qry = $conn->query("SELECT classe.id as id ,classe.name as name ,dept.name as dept FROM classe JOIN dept ON classe.dept=dept.id");
                                        while($row= $qry->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td class=""><b><?php echo $row['id'] ?></b></td>
                                        <td><?php echo $row['dept']?></td>
                                        <td><?php echo ucwords($row['name']) ?></td>
                                        
                                        <td><a href="classeabs.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-flat ">
                                                <i class="fas fa-add"></i>
                                            </a>
                                        </td>
                                        

                                        <td><a href="sclasse.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-flat ">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="upclasse.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a name="delete" href="classe.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure you want to delete this record?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        
                                        
                                    </tr>	
                                    <?php endwhile;

                                        //delete php forme 

                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            $conn->query("DELETE FROM classe WHERE id='".$id."'");
                                            echo '<div class="alert alert-success">classe deleted successfully</div>';
                                        }
                                    ?>
                                </tbody>
                            
                        </table>
                        
                    </div>
                </div>      
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
                //alert(input);
                if(input != ""){
                    $.ajax({
                        url: "livesearch.php",
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