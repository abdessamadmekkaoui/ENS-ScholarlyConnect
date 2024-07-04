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
?>
<?php
if(!empty($_GET['id'])){
$id = $_GET['id'];
if(!empty($id)){
    $sql = "SELECT * FROM student WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    $value = mysqli_fetch_assoc($res);
}
}
?>
   
<div class="home-content">
        <button  class="hidden-print" id="btnPrint" style="position: relative; left: 45%"> Imprimer <i class='bx bx-printer'></i></button>
    <div class="page">
         <img src="../uploaded_img/a.jpg" style="width: 180px; border-radius: 100%; margin-top:-50px;margin-bottom:-10px;">
           <h2>CERTIFICAT SCOLAIRE</h2>
           <h3 style="color: #328;">L'ecole Normale Supérieure Marrakech</h3>
           <h4>Nous déclarons que</h4>
            <h1 style="color: #fac;"><?= $value['name'] . " ". $value['email'] ?></h1>
            <h3>de l'id : <?= $value['id']?></h3>
            <hr style="margin-left:8%;">
            <h3>a satisfait aux exigences de la licence en admnistration d'affaires.</h3>
           
        <div class="cote-a-cote" style="width: 40%">
             <div> <hr style="margin-left:80%; width:200px;"> </div>
             <div> <hr style="margin-left:120%; width:200px;"> </div>
        </div>
        <div class="cote-a-cote" style="width: 40%">
             <div> <hr style="margin-left:120%; width:200px;"> </div>
             <div> <hr style="margin-left:160%; width:200px;"> </div>
        </div>
        <div class="cote-a-cote" style="width: 40%">
             <div> <hr style="margin-left:80%; width:200px;"> </div>
             <div> <hr style="margin-left:100%; width:200px;"> </div>
        </div>
        <div class="cote-a-cote" style="width: 70%">
            <h3 class="dd">Telephone: </h3>
            <h3>Adresse: </h3>
        </div>
        <div class="cote-a-cote" style="width: 70%">
            <p class="dd"><?= $value['sphone'] ?></p>
            <p><?= $value['location'] ?></p>
        </div>
        <br><br>
        
    </div>
    <div class="overview-boxes"></div>
</div>

    <style>
            div hr {
            border: none;
            border-bottom: 6px solid black;
            margin: 10px 0;
            max-width:80%;
            }
            .dd{
                margin-left: 200px;
            }
            .cote-a-cote{
            display: flex;
            justify-content: space-between;
            }

            .page {
            text-align: center;
            justify-content: center;
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
            }

            @page {
            size: A1;
            margin: 0;
            }
            @media print {
            html, body {
                width: 210mm;
                height: 297mm;        
            }
            .hidden-print, 
            .hidden-print * {
                display: none !important;
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
              }
            }
    </style>

<script>
    var btnPrint = document.querySelector("#btnPrint");
    btnPrint.addEventListener("click", () => {
        window.print();
    });
</script>

