<?php

                include '../inc/db_conn.php'; 
                session_start();
                $user_id = $_SESSION['id'];
                
                $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                $admin = mysqli_fetch_assoc($select);
                }
                $id = $_GET['id'];
                if(isset($_POST['addtab']) //&& isset($_POST['nheur']) && isset($_POST['date'])
                ){
                $tab = mysqli_real_escape_string($conn, $_POST['tabrir']);
                $insert = mysqli_query($conn, "UPDATE `absence` SET tabrir = '$tab' where idstudent = '$id'") or die('query failed');
                                if($insert){
                                    echo "<script>alert('added successfully!');</script>";
                                }else{
                                    echo "<script>alert('addition failed!');</script>";
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

                <link rel="stylesheet" href="../inc/style.css">

                </head>
                <body>
                <div class="d-flex" id="wrapper">
                               
                        

                <?php include 'header.php'?>

                <div class="update-profile">
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `student` WHERE id = '$id'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">                            
                            <div class="flex">
                            <div class="inputBox">
                            <span>name of student :</span>
                            <input type="text" name="teacher" value="<?php echo $fetch['name'];?>" class="box" readonly></div>
                            <div class="inputBox">
                            <span>justification :</span>
                            <input type="text" name="tabrir" class="box"></div>
                            <div class="inputBox">
                            <input type="submit" value="add justification" name="addtab" class="btn">
                            <a href="classe.php" class="delete-btn">go back</a>
                            </div>
                            </div>
                            
                            
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