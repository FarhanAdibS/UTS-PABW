<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $negara = htmlentities($_POST['negara']);
  		$kasus = htmlentities($_POST['kasus']);
        $meninggal = htmlentities($_POST['meninggal']);
		$sembuh = htmlentities($_POST['sembuh']);
        $query = $db->prepare("INSERT INTO `corona`(`negara`,`kasus`, `meninggal`,'sembuh')
        VALUES (:negara,:kasus,:meninggal,:sembuh)");
  		$query->bindParam(":negara", $negara);
        $query->bindParam(":kasus", $kasus);
        $query->bindParam(":meninggal", $meninggal);
		$query->bindParam(":sembuh", $sembuh);
        $query->execute();
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
     <meta charset="utf-8">
  <title>CRUD PDO Farhanakhbar </title>
    </head>
<body bgcolor="#CCCCCC">
<h2><p align="center">TAMBAH DATA</p></h2>
<form method="post">
<table width="546" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td width="189" height="20"> </td>
    <td width="26"> </td>
    <td width="331"> </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">negara</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="negara" type="text" size="10">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">kasus</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input type="text" name="kasus" size="10">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">meninggal</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="meninggal" type="text" size="10">
    </label></td>
  </tr>
	<tr>
    <td height="27" align="right" valign="middle">sembuh</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="sembuh" type="text" size="10">
    </label></td>
  </tr>
  
  <tr>
    <td height="42"> </td>
    <td> </td>
    <td><input type="submit" name="submit" value="TAMBAH"></td>
  </tr>
</table>
</form><p align="center"><a href=http://farhanakhbar.com>farhanakhbar.com</a></p>
</body>
</html>
