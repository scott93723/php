<?php

  //echo "-------show data from mysql datbase test-------";
  //echo "<br>";
  $link = mysqli_connect("127.0.0.1","root","12345678","product");
  /*
  if($link){
     echo "CONNECT OK";
     echo "<br>";
  }
  */
  $SQL = "select id,factory,storage,comment from PaperDiaper;";

  $table = mysqli_query($link, $SQL);

  $rows = mysqli_num_rows($table);

  //echo "THERE ARE " . $rows . " ROWS READ OUT!!";
  //echo "<br>";
  $json = "{";
  
  for($i = 0 ; $i < $rows ; $i++){
    $r = mysqli_fetch_row($table);
  
    $json = $json . "\"" .$r[0] . "\":{\"factory\":\"" . $r[1] . "\",\"storage\":\"" . $r[2] . "\",\"comment\":\"" . $r[3] ."\"}";
    
    if($i != $rows -1){
      $json = $json . ",";
    }
    
    //echo "<br>";
   
  }
  $json = $json . "}";
  /*
  $emparray = array();
  while($row =mysqli_fetch_assoc($table))
  {
        $emparray[] = $row;
        //echo $row;
  }
  */
  //echo $total;
  //echo "-------------------OVER------------------";
  //echo json_encode($arr,JSON_UNESCAPED_UNICODE);
  //echo json_encode($emparray);
  echo $json;
  mysqli_close($link);
?>