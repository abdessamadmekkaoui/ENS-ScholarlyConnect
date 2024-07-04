<?php 
if(!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    header("Location: index.php");
    exit;
}
if(!isset($_SESSION['id'])){
    echo 'error';
}else {
    $id = $_SESSION['id'];
}
?>
<div class="sidebar-wrapper mb-4">
      <div class="card">
       <div class="card-header">
       <div class="message-to d-flex">
          <?php 
             $sql = "SELECT *FROM user WHERE unique_id='$id'";
             $res = $db->select($sql);
             if($res){
             foreach($res as $user){ ?>
             <img src="<?php echo $user['img']; ?>"> 
             <i class="fa fa-circle"></i>
             <h6><?php echo $user['username']; ?></h6>
             <p>
                <?php
                 if($user['status'] == "Active"){
                     echo "Active Now";
                 }else{
                     echo "Offline";
                 } 
                ?> 
             </p>
          <?php } } ?>
       </div>
       </div>
       <div class="card-body">
       <div class="user-list-box">
            <ul>
              <?php 
               $query  = "SELECT * FROM user WHERE unique_id != '$id'";
               $result = $db->select($query);
               if($result){
               foreach($result as $list){ ?>
                <li>
                    <a href="chat.php?sender=<?php echo $id; ?>&receiver=<?php echo $list['unique_id']; ?>" class="d-flex align-items-center">
                        <img src="<?php echo $list['img']; ?>">
                        <?php 
                         if($list['status'] == "Active"){
                            echo "<i class='fa fa-circle'></i>";
                         }else{
                             echo "<i class='fa fa-circle offline'></i>";
                         }
                        ?>
                        <h6><?php echo $list['username']; ?></h6>
                    </a>
                </li>
                <?php } } ?>   
            </ul>   
        </div>
       </div>
      </div>
    </div>