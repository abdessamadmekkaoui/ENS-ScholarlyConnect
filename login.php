<?php 
session_start(); 
include "inc/db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['email']);
	$pass = validate($_POST['password']);
    $user = validate($_POST['user']);

	if (empty($uname)) {
		header("Location: index.php?error=User email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else if(empty($user)){
        header("Location: index.php?error=user type is required");
	    exit();
	}else{
         switch ($user) {
                case '1':
                    $sql = "SELECT * FROM student WHERE email='$uname' AND password='$pass'";
                        $result = mysqli_query($conn, $sql);
                        $x='student';
                    break;
                case '2':
                    $sql = "SELECT * FROM teacher WHERE email='$uname' AND password='$pass'";
                        $result = mysqli_query($conn, $sql);
                        $x='teacher';
                    break;
                    case '3':
                    $sql = "SELECT * FROM parents WHERE email='$uname' AND password='$pass'";
                        $result = mysqli_query($conn, $sql);
                        $x='parents';
                    break;
                    case '4':
                    $sql = "SELECT * FROM admin WHERE email='$uname' AND password='$pass'";
                        $result = mysqli_query($conn, $sql);
                        $x='admin';
                    break;
         }
         if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $uname && $row['password'] === $pass) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: $x/home.php");
                exit();
            }else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }

		
	}
	
}else{
	header("Location: index.php");
	exit();
}