<!DOCTYPE html>
<html>
<title>Happy Birthday</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
<style type="text/css">
@font-face {
    font-family: MyFont;
    src: url(font/MYRIADPRO-BOLDCOND.woff);
    //src: url(font/MYRIADPRO-COND.woff);
}

 body{
     /*font-family: 'Cambria', Helvetica, Verdana;*/
     font-family: MyFont;
 }
 


.mySlides 
{
    background-image: url("banner_sinhnhat.png"); 
    height:102px; 
    width:847px;
    text-align: center;
    /*color: #0082C6;*/
    color: #ED2D6A; /*hong*/
}
.mySlides_area {
    width:310px;
    height:60px;
    padding-top:35px;
    padding-left:295px;
}
.mySlides_name {
        /*font-size: 1rem;*/
        font-size: 1.2rem;
        /*font-weight: 700;*/
}

.mySlides_date {
font-size: 0.8rem;
/*
    float: right;
    padding-top:40px;
    */
}
</style>
<body>
<?php
      $conn = mysqli_connect('localhost', 'root', '', 'sinhnhat') or die ('Không thể kết nối đến CSDL');
	   mysqli_set_charset($conn, 'utf8');
	
      $g_date  = date("d");
      $g_month = date("m");
	  
      $sql     = "SELECT `id`,`doanhnghiep`,DATE_FORMAT(`ngay_sinhnhat`,'%d-%m-%Y'),`trangthai_an_hien` FROM `sinhnhat` where day(ngay_sinhnhat)=$g_date and month(ngay_sinhnhat)=$g_month";
	  //$total = mysqli_num_rows($conn, $sql);
	  $ketqua = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($ketqua))
          {
              echo '<div class="mySlides">';
              echo '<div class="mySlides_area">';
              echo '<span class="mySlides_date">';
              echo $row[2];
              echo '</span>';
              echo '</br>';
              echo '<span class="mySlides_name">';
              echo $row[1];
              echo '</span>';
              echo '</div>';
              echo '</div>';
          }
?>
<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 2000); 
}
</script>

</body>
</html> 