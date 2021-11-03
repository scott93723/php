<?php

   $account = $_GET["account"];
   $password = $_GET["password"];


   $link = mysqli_connect("127.0.0.1", "root", "12345678", "student_data");

   if($link){

      $SQL = "insert into members(account, password, power) values(";
      $SQL = $SQL . "'" . $account . "',";
      $SQL = $SQL . "'" . $password . "',";
      $SQL = $SQL . "'" . 2 . "');";
      //echo $SQL;
      $result = mysqli_query($link, $SQL);
      echo $result;
   }else{
      echo "link fail";
   }


   mysqli_close($link);

?>