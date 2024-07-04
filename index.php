<!DOCTYPE html>
<html>
<head>
	<title> LOGIN</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        *{
            font-family: sans-serif;
            box-sizing: border-box;
        }

        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }
        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }
        button:hover{
            opacity: .7;
        }
        .error {
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        a {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
        }
        a:hover{
            opacity: .7;
        }
        select {
        width: 100%;
        margin-top: 15px;
        padding: 8px 24px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.6 11l4.7 4.7c.4.4 1 .4 1.4 0l4.7-4.7c.4-.4.4-1 0-1.4l-1.4-1.4c-.4-.4-1-.4-1.4 0L13 12.8V3c0-.6-.4-1-1-1H8c-.6 0-1 .4-1 1v9.8L5.3 8.3c-.4-.4-1-.4-1.4 0l-1.4 1.4c-.4.4-.4 1 0 1.4l4.7 4.7z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 8px center;
        background-size: 24px 24px;
        cursor: pointer;
        }

        select:focus {
        outline: none;
        box-shadow: 0 0 0 2px #007bff;
        }

    </style> 
<body>
       <a href="accueil.php">
			<button class="btn btn-primary stretched-link">accueil</button>
	   </a>
     <form action="login.php" method="post">
     	<h2> LOGIN PAGE</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<label>select user</label>
        <select name="user" class="form-control" style="margin-bottom: 20px;">
            <option value=0 selected>------</option>
            <option value=1>student</option>
            <option value=2>teacher</option>
            <option value=3>parent</option>
            <option value=4>admin</option>
        </select>
        <br>
     	<label >User Name</label>
     	<input type="text" name="email" placeholder="User email" ><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
     
</body>
</html>