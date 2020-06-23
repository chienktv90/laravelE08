<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BIRTHDAY MEMBERSHIP MANAGEMENT</title>
<script language="javascript">
    function xoatype()
    {
        form1.Type.value="";
    }
    function tieudiem()
    {
        form1.Type.focus();
    }
    function test()
    {
        if(form1.date.value==""){
            alert("Enter data for input Date");
            form1.date.focus();
            return false;
        }
        else 
        {
        
        }
        if(form1.Type.value==""){
            alert("Enter data for input Member Name");
            form1.Type.focus();
            return false;
        }
        else 
        {
        
        }
    }
</script>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover{background-color:#f5f5f5}
</style>
</head>
<body onload="tieudiem()">
<?php
      $sl_dong_tren_trang = 10;
      $tranghientai       = 1;
      
      $con = mysqli_connect('localhost', 'root', '', 'sn') or die('Không thể kết nối đến CSDL');
      mysqli_set_charset($con, 'utf8');
      
      if (isset($_POST['Submit']) && !isset($_GET['action']))
          {
          $ngaycat  = substr($_POST['date'], 0, 2);
          $thangcat = substr($_POST['date'], 3, 2);
          $namcat   = substr($_POST['date'], 6, 4);
          $_date    = $namcat . '/' . $thangcat . '/' . $ngaycat;
          $sql      = "INSERT INTO `sinhnhat` (`id`, `doanhnghiep`, `ngay_sinhnhat`, `trangthai_an_hien`) VALUES (NULL,'" . $_POST['Type'] . "','" . $_date . "',0) ";
          mysqli_query($con, $sql);
          //echo "<script language='javascript'>alert('Thêm thành công!')</script>";
          echo '<meta http-equiv="REFRESH" content="0;URL=comSinhNhat.php"/>';
          }
      if (isset($_POST['Submit']) && isset($_GET['action']) && $_GET['action'] == 'sua' && isset($_GET['id']))
          {
          $ngaycat  = substr($_POST['date'], 0, 2);
          $thangcat = substr($_POST['date'], 3, 2);
          $namcat   = substr($_POST['date'], 6, 4);
          $_date    = $namcat . '/' . $thangcat . '/' . $ngaycat;
          $sql3     = "UPDATE  sinhnhat SET  `doanhnghiep` =  '" . $_POST['Type'] . "', ngay_sinhnhat = '" . $_date . "' WHERE  `sinhnhat`.`id` ='" . $_GET['id'] . "'";
          mysqli_query($con, $sql3);
          //echo "<script language='javascript'>alert('Cập nhật thành công!')</script>";
          echo '<meta http-equiv="REFRESH" content="0;URL=comSinhNhat.php"/>';
          }
?>
<?php
      if (isset($_GET['action']) && $_GET['action'] == 'xoa' && isset($_GET['id']))
          {
          $sql_del = 'DELETE FROM `sinhnhat` Where `id` = ' . $_GET['id'];
          mysqli_query($con, $sql_del);
          echo "<script language='javascript'>alert('Xóa thành công!')</script>";
          echo '<meta http-equiv="REFRESH" content="0;URL=comSinhNhat.php"/>';
          }
      
	  if (isset($_GET['action']) && $_GET['action'] == 'sua' && isset($_GET['id']))
          {
          $sql_select = 'SELECT `id`,`doanhnghiep`,' . "DATE_FORMAT(`ngay_sinhnhat`,'%d-%m-%Y')" . ' FROM `sinhnhat` Where `id` = ' . $_GET['id'];
          $dongcansua = mysqli_query($con, $sql_select);
          $data       = mysqli_fetch_array($dongcansua);
          $type       = $data[1];
          $date       = $data[2];
          }
      else
          {
          $type = "";
          $date = "";
          }
?>

<a href="comSinhNhat.php">BIRTHDAY MEMBERSHIP MANAGEMENT</a>
<form action="<?php
      $_SERVER['PHP_SELF'];
?>" method="post" id="form1" name="form1" onsubmit="return test();">
Member Name:
<input name="Type" type="text" id="Type" onFocus="tieudiem()"  value="<?php
      print $type;
?>" size="100"/>
Date:
<input name="date" type="text" id="date" value="<?php
      print $date;
?>" size="10"/>(dd/mm/yyyy)
&nbsp;&nbsp;__&nbsp;&nbsp;
<input type="submit" name="Submit" value="Save" />
<a href="comSinhNhat.php"><input type="button" name="btnhuy" id="btnhuy" value="Cancel"/></a>
<hr>
<?php 
//echo ceil(3/2);
?>
</br><div align="right">N.o Page
  <?php
      $sql2      = "SELECT Count(id) as SL FROM `sinhnhat`";
      $sl_vanban = mysqli_query($con, $sql2);
      $sl        = mysqli_fetch_array($sl_vanban);
      $sl_trang  = ceil($sl['SL'] / $sl_dong_tren_trang);
      for ($sotrang = 1; $sotrang <= $sl_trang; $sotrang++)
          {
          echo '<a href="?page=' . $sotrang . '">' . $sotrang . '</a>';
          echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
          }
?>
 </div>
<table width="100%">
  <tr bgcolor="#CCCCCC" style="text-align:center">
        <td>ID</td>
        <td>Member</td>
        <td>Date</td>
        <td>Delete</td>
        <td>Edit</td>
      </tr>
      <?php
      if (isset($_GET['page']))
          {
          $tranghientai = $_GET['page'];
          }
      $sql2   = 'SELECT `id`,`doanhnghiep`,' . "DATE_FORMAT(`ngay_sinhnhat`,'%d-%m-%Y')" . ' FROM `sinhnhat` LIMIT ' . ($tranghientai - 1) * $sl_dong_tren_trang . ',' . $sl_dong_tren_trang;
      $ketqua = mysqli_query($con, $sql2);
      while ($row = mysqli_fetch_array($ketqua))
          {
?>
     <tr>
        <td><?php
          echo $row[0];
?></td>
        <td><?php
          echo $row[1];
?></td>
        <td><?php
          echo $row[2];
?></td>
        <td><a href="?action=xoa&id=<?php
          echo $row[0];
?>">Del</a></td>
        <td><a href="?action=sua&id=<?php
          echo $row[0];
?>">Edit</a></td>
      </tr>
      <?php
          }
?>
</table>

<div align="right">N.o Page
  <?php
      $sql2      = "SELECT Count(id) as SL FROM `sinhnhat`";
      $sl_vanban = mysqli_query($con, $sql2);
      $sl        = mysqli_fetch_array($sl_vanban);
      $sl_trang  = ceil($sl['SL'] / $sl_dong_tren_trang);
      for ($sotrang = 1; $sotrang <= $sl_trang; $sotrang++)
          {
          echo '<a href="?page=' . $sotrang . '">' . $sotrang . '</a>';
          echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
          }
?>
 </div>
</form>
</body>
</html>