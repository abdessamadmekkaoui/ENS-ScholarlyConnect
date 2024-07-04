
<?php
include '../inc/db_conn.php'; 
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    header("Location: index.php");
    exit;
}
$user_id = $_SESSION['id'];
            $select = mysqli_query($conn, "SELECT * FROM `student` WHERE id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $admin = mysqli_fetch_assoc($select);
            }
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

     
    <title>notes-space</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
      <?php include 'header.php'?>
                    <!-- Page Content -->
            <div class="container-fluid px-4">
                    <div class="row my-5">
                       <div class="col">
                        <h3>my absences </h3>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                         <thead>
                                    <tr>
                                    <th scope="col">#<button class="btn btn-sm btn-link" onclick="sortTable(1)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">teacher<button class="btn btn-sm btn-link" onclick="sortTable(2)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">jour<button class="btn btn-sm btn-link" onclick="sortTable(3)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">heur<button class="btn btn-sm btn-link" onclick="sortTable(4)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">situation<button class="btn btn-sm btn-link" onclick="sortTable(5)"><i class="fas fa-sort"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $qry = $conn->query("SELECT absence.jour as jourr,absence.nbheur as heurr,absence.tabrir as tabrirr,student.id,teacher.name as namee ,absence.idstudent,teacher.id,absence.teacher 
                                        FROM absence JOIN student ON student.id=absence.idstudent JOIN teacher ON teacher.id=absence.teacher
                                        where absence.idstudent= '$user_id'");
                                        while($row= $qry->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td><?php echo ucwords($row['namee']) ?></td>
                                        <td><?php echo $row['jourr']?></td>
                                        <td><?php echo $row['heurr']?></td>
                                        <td><?php if ($row['tabrirr']==''){
                                            echo'<span class="badge rounded-pill bg-danger"> not justificated</span>';
                                            }else {
                                                echo '<span class="badge rounded-pill bg-success">justificated</span>';
                                            } ?>
                                        </td>
                                    </tr>	
                                    <?php endwhile; ?>
                                </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <h3>my notes</h3>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                         <thead>
                                    <tr>
                                    <th scope="col">#<button class="btn btn-sm btn-link" onclick="sortTable(1)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">teacher<button class="btn btn-sm btn-link" onclick="sortTable(2)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">controle<button class="btn btn-sm btn-link" onclick="sortTable(3)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">note<button class="btn btn-sm btn-link" onclick="sortTable(4)"><i class="fas fa-sort"></i></button></th>
                                    <th scope="col">situation<button class="btn btn-sm btn-link" onclick="sortTable(5)"><i class="fas fa-sort"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $qry = $conn->query("SELECT notes.controle as jourr,notes.note as heurr,student.id,teacher.name as namee ,notes.idstudent,teacher.id,notes.idteacher 
                                        FROM notes JOIN student ON student.id=notes.idstudent JOIN teacher ON teacher.id=notes.idteacher
                                        where notes.idstudent= '$user_id'");
                                        while($row= $qry->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td><?php echo ucwords($row['namee']) ?></td>
                                        <td><?php echo $row['jourr']?></td>
                                        <td><?php echo $row['heurr']?></td>
                                        <td><?php if ($row['heurr']<10){
                                            echo'<span class="badge rounded-pill bg-danger"> Repeats</span>';
                                            }elseif($row['heurr']<=12){
                                                echo'<span class="badge rounded-pill bg-warning text-dark"> Passable</span>';
                                                }elseif($row['heurr']<=14){
                                                    echo'<span class="badge rounded-pill bg-info text-dark"> Quite Well</span>';
                                                    }elseif($row['heurr']<=16){
                                                        echo'<span class="badge rounded-pill bg-primary"> Good</span>';
                                                        }elseif($row['heurr']<18){
                                                            echo'<span class="badge rounded-pill bg-success"> Very Good</span>';
                                                            }else {
                                                echo '<span class="badge rounded-pill bg-success">Excellent</span>';
                                            } ?>
                                        </td>
                                    </tr>	
                                    <?php endwhile; ?>
                                </tbody>
                        </table>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>
<h6 class="text-center bg-dark text-white p-3 m-0"> Copyright @ MEKKAOUI ABD-ESSAMAD  <?php echo date("M/Y")?> SCHOOL MANAGMENT SYSTEM| ECOL NORMAL SUPERIEUR, MARRAKECH.  All Rights Reserved.</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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