<?php
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// ÇáÊÍÞÞ ããÇ ÅÐÇ ßÇä ÇáãáÝ ãæÌæÏðÇ ÈÇáÝÚá
if (file_exists($targetFile)) {
    echo "ÚÐÑðÇ¡ ÇáãáÝ ãæÌæÏ ÈÇáÝÚá.";
    $uploadOk = 0;
}

// ÇáÊÍÞÞ ãä ÍÌã ÇáãáÝ
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "ÚÐÑðÇ¡ ÇáãáÝ ßÈíÑ ÌÏðÇ.";
    $uploadOk = 0;
}

// ÞÈæá ÈÚÖ ÇáÇãÊÏÇÏÇÊ ÇáãáÝÇÊ ÇáãÍÏÏÉ
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if(!in_array($imageFileType, $allowedExtensions)) {
    echo "ÚÐÑðÇ¡ íõÓãÍ ÝÞØ ÈãáÝÇÊ JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}

// ÇáÊÍÞÞ ãä ÞíãÉ $uploadOk áãÚÑÝÉ ãÇ ÅÐÇ ßÇä íãßä ÊÍãíá ÇáãáÝ Ãã áÇ
if ($uploadOk == 0) {
    echo "ÚÐÑðÇ¡ ÇáãáÝ áã íÊã ÊÍãíáå.";
// ÅÐÇ áã íßä åäÇß ãÔßáÉ¡ ÍÇæá ÊÍãíá ÇáãáÝ
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "Êã ÊÍãíá ÇáãáÝ ". basename( $_FILES["fileToUpload"]["name"]). ".";
    } else {
        echo "ÍÏË ÎØÃ ÃËäÇÁ ÊÍãíá ÇáãáÝ.";
    }
}
?>
