<?php
session_start();
include_once("bd.php");

if (isset($_POST['autorisation']))
	{
		if (isset($_POST['email'])){
			$email = $_POST['email']; 
			if ($email == '') {
				unset($email);
				echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/login.php'>";
			} 
		}
		if (isset($_POST['password'])){
			$password = $_POST['password']; 
			if ($password == '') {
				unset($password);
				echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/login.php'>";
			}
		}
		$email = stripslashes($email);
		$email = htmlspecialchars($email);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);

		$email = trim($email);
		$password = trim($password);
		$password = md5($password);
		$user = mysql_query("SELECT REG.*, class_users.* FROM REG,class_users WHERE REG.EMAIL='$email' AND REG.PASSWORD='$password' AND REG.id_class=class_users.id_class");
		$row = mysql_fetch_array($user);
		if (empty($row['ID'])){
			echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/login.php'>";
		}
		else {
			$_SESSION['password'] = $row['PASSWORD']; 
			$_SESSION['login'] = $row['LOGIN']; 
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['avatar'] = $row['AVATAR'];
			$_SESSION['priv'] = $row['count_priv'];
			echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/index.php'>";
			}
	}
else if(isset($_POST['registration']))
	{
		$email = $_POST['email'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$mdPassword = md5($password);
		$rdate = date('Y-m-d');
		
		$query = ("SELECT ID FROM REG WHERE LOGIN='$login'");
		$sql = mysql_query($query) or die(mysql_error());
		if (mysql_num_rows($sql) > 0) {
		echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/login.php'>";
		}
		else 
		{
			$query2 = ("SELECT ID FROM REG WHERE EMAIL='$email'");
			$sql = mysql_query($query2) or die(mysql_error());
			if (mysql_num_rows($sql) > 0)
			{
				echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/login.php'>";
			}
				else
				{
					$query = "INSERT INTO REG (login, password, email, reg_date, name_user, lastname, id_class )
					VALUES ('$login', '$mdPassword', '$email', '$rdate', '', '', '2')";
					$result = mysql_query($query) or die(mysql_error());;
					echo"<meta http-equiv='Refresh' content='0; URL=http://kursovoy/login.php'>";
				}
		}
	}

else if(isset($_POST['password_vost']))
	{
	
	}
?>