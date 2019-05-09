<?php 

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["myFile"]["name"]);

var_dump($_FILES["myFile"]);

echo "<br><hr><br>";

if($_FILES["myFile"]["size"] > 100000)
{
    echo "File is too large!";
    return;
}

echo "File Type: ".$_FILES["myFile"]["type"];

echo "<br><hr><br>";

if(file_exists($target_file))
{
    echo "File already exists";
    return;
}

if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["myFile"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>