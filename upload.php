<?php
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// ������ ��� ��� ��� ����� ������� ������
if (file_exists($targetFile)) {
    echo "����ǡ ����� ����� ������.";
    $uploadOk = 0;
}

// ������ �� ��� �����
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "����ǡ ����� ���� ����.";
    $uploadOk = 0;
}

// ���� ��� ���������� ������� �������
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if(!in_array($imageFileType, $allowedExtensions)) {
    echo "����ǡ ����� ��� ������ JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}

// ������ �� ���� $uploadOk ������ �� ��� ��� ���� ����� ����� �� ��
if ($uploadOk == 0) {
    echo "����ǡ ����� �� ��� ������.";
// ��� �� ��� ���� ����ɡ ���� ����� �����
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "�� ����� ����� ". basename( $_FILES["fileToUpload"]["name"]). ".";
    } else {
        echo "��� ��� ����� ����� �����.";
    }
}
?>
