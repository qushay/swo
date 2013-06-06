<?php
  session_start();
  include '../session.php';
//$allowedExts = array("gif", "jpeg", "jpg", "pngxls", "xlsx");
$allowedExts = array("xls", "xlsx");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("../excelfile/" . $_FILES["file"]["name"]))
      {
        move_uploaded_file($_FILES["file"]["tmp_name"],
      "../excelfile/" . $_FILES["file"]["name"]);
      $namaawal =  $_FILES["file"]["name"];
      rename("../excelfile/".$namaawal, "../excelfile/".$id_sto.$username.".".$ekstensi);
      header("Location: ../pelanggan/");
      //echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../excelfile/" . $_FILES["file"]["name"]);
      $namaawal =  $_FILES["file"]["name"];
      $ekstensi = $extension;
      rename("../excelfile/".$namaawal, "../excelfile/".$id_sto.$username.".".$ekstensi);
      //echo "Stored in: " . "../excelfile/" . $_FILES["file"]["name"];
      header("Location: ../pelanggan/");
      }
    }
  }
else
  {
  echo "Invalid file";
  header("Location: ../pelanggan/");
  }
?>