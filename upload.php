<?php
    /**
     * 1.建立表單
     * 2.建立處理檔案程式
     * 3.搬移檔案
     * 4.顯示檔案列表
     */

    if (! empty($_FILES['file']['tmp_name'])) {
        move_uploaded_file($_FILES['file']['tmp_name'], "upload/{$_FILES['file']['name']}");
        $file = "upload/{$_FILES['file']['name']}";
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
        .album-item{
             width:250px;
             height:250px;
             background-size:contain;
             background-repeat:no-repeat;
             background-position:center;
             border:16px solid skyblue;
             display:flex;
             justify-content:center;
             align-items:center;

        }
    </style>
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->
<form action="?" method="post" enctype="multipart/form-data">
    <div>
        <label for="file">選擇檔案：</label>
        <input type="file" name="file" id="file">
    </div>
<div>
    <input type="submit" value="上傳">
</div>
</form>


<!----建立一個連結來查看上傳後的圖檔---->
<?php
    $path  = "upload/";
    $files = scandir($path);

    /* echo "<pre>";
print_r($files);
echo "</pre>"; */

    unset($files[0], $files[1]);

    /* echo "<pre>";
print_r($files);
echo "</pre>"; */

    echo "<div id='album'>";
    foreach ($files as $file) {
        if (explode("/", mime_content_type("upload/{$file}"))[0] == 'image') {
            echo "<div class='album-item' style='background-image:url(upload/{$file});'>";
            echo "</div>";
        } else {
            //word,txt,ppt,pdf,mp4,
            $type = explode("/", mime_content_type("upload/{$file}"))[1];
            switch ($type) {
                case "pdf":
                    echo "<div class='album-item'>";
                    echo "<img src='thumb/thumb_pdf.png' style='width:150px;height:150px'>";
                    echo "</div>";
                    break;
                case "plain":  //txt
                    echo "<div class='album-item'>";
                    echo "<img src='thumb/thumb_txt.png' style='width:150px;height:150px'>";
                    echo "</div>";
                    break;
                case "vnd.openxmlformats-officedocument.presentationml.presentation": //ppt
                    echo "<div class='album-item'>";
                    echo "<img src='thumb/thumb_ppt.png' style='width:150px;height:150px'>";
                    echo "</div>";
                    break;
                case "x-empty": //word
                    echo "<div class='album-item'>";
                    echo "<img src='thumb/thumb_word.png' style='width:150px;height:150px'>";
                    echo "</div>";
                    break;
                case "mp4":
                    echo "<div class='album-item'>";
                    echo "<img src='thumb/thumb_mp4.png' style='width:150px;height:150px'>";
                    echo "</div>";
                    break;
            }

        }
    }
    echo "</div>";
?>



</body>
</html>