<?php
session_start();
include_once("bd.php");
$id_status_read_list=$_POST['status_read_list'];
$id_user=$_POST['id_user'];
$id_book=$_POST['id_book'];
$result1=mysql_query("SELECT * FROM REG WHERE ID=$id_user");
$row1=mysql_fetch_array($result1);
if(isset($row1))
{
	$result=mysql_query("SELECT * FROM read_list 
						WHERE id_user='$id_user' AND id_book='$id_book'");
	$row=mysql_fetch_array($result);
	if($row!='')
	{
		if ($id_status_read_list==10)
		{
			$result_delete=mysql_query("DELETE FROM `read_list` 
										WHERE `id_list`='$row[id_list]'");
		}
		else
		{
			$result_update=mysql_query("UPDATE `read_list` SET `id_status_read_list`='$id_status_read_list' 
										WHERE id_list='$row[id_list]'");
		}
	}
	else 
	{
		$result_insert=mysql_query("INSERT INTO `read_list`(`id_list`, `id_status_read_list`, `id_user`, `id_book`, `count`) 
									VALUES ('NULL','$id_status_read_list','$id_user','$id_book','0')");
	}
	echo "<html><head><meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'></head></html>";
}
else
{
	echo "<html><head><meta http-equiv='Refresh' content='0; URL=http://kursovoy/login.php'></head></html>";
}
?>