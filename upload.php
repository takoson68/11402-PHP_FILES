<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

if(!empty($_FILES['file']['tmp_name'])){
  move_uploaded_file($_FILES['file']['tmp_name'],"upload/{$_FILES['file']['name']}");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>檔案上傳</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .album{
      display:flex;
      flex-wrap:wrap;
      gap:16px;
    }
    .album .item{
      width:250px;
      height:250px;
      border:1em solid #8BC34A;
      display:flex;
      align-items:center;
      justify-content:center;
      background:#f5f5f5;
      overflow:hidden;
      text-align:center;
      padding:8px;
      box-sizing:border-box;
    }
    .album .item.img{
      background-size:contain;
      background-repeat:no-repeat;
      background-position:center;
    }
    .album .item span{
      word-break:break-all;
      color:#333;
      font-weight:bold;
    }
  </style>
</head>

<body>
  <h1 class="header">檔案上傳練習</h1>
  <!----建立你的表單及設定編碼----->
  <form action="?" method="post" enctype="multipart/form-data">
    <div class="fileBOx">
      <label for="file">
        <input type="file" name="file" id="file">
      </label>
    </div>  
    <div>
      <input type="submit" value="上傳">
    </div>
  </form>


  <!----建立一個連結來查看上傳後的圖檔---->
  <!-- <img src="<?=$file;?>" alt=""> -->
  <?php 
  $path = "upload/";
  $files=scandir($path);
  unset($files[0],$files[1]);

  echo "<div class='album'>";
  foreach($files as $file){
    $mime = mime_content_type("upload/{$file}");
    $type = explode("/",$mime)[0];
    if($type=="image"){
      echo "<div class='item img' style='background-image:url(upload/{$file});'></div>";
    }else {
      echo "<div class='item other'><span>{$file}</span></div>";
    }
  }
  echo "</div>";

  ?>


</body>

</html>
