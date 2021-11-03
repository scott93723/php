<?php
  header("Content-type: image/jpeg");
  // 
  // step1: connect to database
  $link = mysqli_connect("127.0.0.1", "root", "12345678", "student_data");

  // step2: do things
  // check if connection ok
  if($link){
      // connection ok
      $account = $_GET["account"];
      
      $SQL = "select picture from members where account='" . $account . "';";
      $result = mysqli_query($link, $SQL);
      $row_count = mysqli_num_rows($result);
      if($row_count == 1){
        $row = mysqli_fetch_row($result);
        $pic_blob = $row[0];
        echo $pic_blob;
      }else{
        $fp = fopen("anonymous.jpeg", 'rb');
        fpassthru($fp);
        fclose($fp);
      }
      
  }else{
      // connection fail
      $fp = fopen("fail.jpeg", 'rb');
      fpassthru($fp);
      fclose($fp);
      
  }
  // step3: close
  mysqli_close($link);
  
?>