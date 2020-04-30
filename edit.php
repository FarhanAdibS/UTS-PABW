<?php
    include 'koneksi.php';
    if(!isset($_GET['negara'])){
        die("Error: negara Tidak Dimasukkan");
    }
    $query = $db->prepare("SELECT * FROM `corona` WHERE negara = :negara");
    $query->bindParam(":negara", $_GET['negara']);
    $query->execute();
    if($query->rowCount() == 0){
        die("Error: negara Tidak Ditemukan");
    }else{
        $data = $query->fetch();
    }
    if(isset($_POST['submit'])){
        $kasus = htmlentities($_POST['kasus']);
        $meninggal= htmlentities($_POST['meninggal']);
		$sembuh= htmlentities($_POST['sembuh']);
        
        $query = $db->prepare("UPDATE `corona` SET `kasus`=:kasus,`meinggal`=:meninggal,'sembuh'=:sembuh WHERE negara=:negara");
        $query->bindParam(":kasus", $kasus);
        $query->bindParam(":meninggal", $meninggal);
        $query->bindParam(":sembuh", $sembuh);
		
        $query->bindParam(":negara", $_GET['negara']);
        $query->execute();
        header("location: home.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
 <title>CRUD PDO </title>
    <meta charset="utf-8">
    </head>
 <body bgcolor="#CCCCCC">
    <h2><p align="center">EDIT DATA</p></h2>
    <form method="post">
 <table width="546" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center">
  <tr>
    <td width="189" height="20"> </td>
    <td width="26"> </td>
    <td width="331"> </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">negara</td>
    <td align="center" valign="top">:</td>
    <td valign="middle">
      <input type="text" name="negara" size="10" value="<?php echo $data['negara'] ?>" readonly="readonly"> 
    </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">kasus</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input type="text" name="kasus" size="10" value="<?php echo $data['kasus'] ?>">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">meninggal</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="meninggal" type="text" size="10" value="<?php echo $data['meninggal'] ?>">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">sembuh</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="sembuh" type="text" size="10" value="<?php echo $data['sembuh'] ?>">
    </label></td>
  </tr>
  
  <tr>
    <td height="42"> </td>
    <td> </td>
    <td><input type="submit" name="submit" value="EDIT"></td>
  </tr>
  </table>
  </form><p align="center"><a href=farhanakhbar.com>farhanakhbar.com</a></p>
  </body>
</html>
