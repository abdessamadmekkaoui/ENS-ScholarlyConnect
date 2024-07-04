<?php
include '../inc/db_conn.php'; 
if(isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM student WHERE name LIKE '{$input}%' or email LIKE '{$input}%'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {?>
    <h4>result of search</h4>
        <table class="table bg-white rounded shadow-sm table-hover">
                         <thead>
                                    <tr>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">password</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">location</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $password = $row['password'];
                                        $classe = $row['classe'];
                                        $location = $row['location'];
                                    
                                    ?>
                                    <tr>
                                       <td><?php echo $id; ?></td>
                                       <td><?php echo $name; ?></td>
                                       <td><?php echo $email; ?></td>
                                       <td><?php echo $password; ?></td>
                                       <td><?php echo $classe; ?></td>
                                       <td><?php echo $location; ?></td>
                                       <td class="text-center">
                                           <div class="btn-group">
                                            <a href="upstudent.php?id=<?php echo $id ?>" class="btn btn-primary btn-flat ">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a name="delete" href="home.php?id=<?php echo $id ?>" class="btn btn-danger btn-flat delete_student">
                                                <i class="fas fa-trash"></i>
                                            </a>  
                                           </div>
                                        </td>

                                    </tr>
                                    <?php

                                //delete php forme 

                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $conn->query("DELETE FROM student WHERE id='".$_GET['id']."'");
                                    echo '<div class="alert alert-success">Student deleted successfully</div>';
                                }}
                                ?>
                                </tbody>
                            
                        </table>
  <?php  }else {
    echo "<div class='bg-danger text-white p-2 m-5 rounded'><p class='text-red'>no name fonded</p></div>";
  
}}
?>



