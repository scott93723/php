<?php

    // step1: connect to database
    $link = mysqli_connect("127.0.0.1", "root", "12345678", "student_data");

    // step2: do things
    // check if connection ok
    if($link){
        // connection ok
        $number = "23";
        
        $SQL = "select picture from members where number='$number';";
        $result = mysqli_query($link, $SQL);
        $x = mysqli_num_rows($result);
        if($x==1){
          //echo "YES";
          $row = mysqli_fetch_row($result);
          //header("Content-type: image/jpeg");
    
          echo $row[0];
        }else{
          echo "NO";  
        }
  
    }else{
        // connection fail
        echo "FAIL";
    }
    // step3: close
    mysqli_close($link);
    
?>