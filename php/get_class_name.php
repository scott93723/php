<?php


// step1: connect to database
$link = mysqli_connect("127.0.0.1", "root", "12345678", "student_data");

// step2: do things
// check if connection ok
if($link){
    // connection ok
    
    $SQL = "select name from class_name;";
    $result = mysqli_query($link, $SQL);
    /*
    $result_array = mysqli_fetch_assoc($result);
    // total string

    $total = "";
    
    for( $counter = 0 ; $count < mysqli_num_rows($result)  ;  $count = $count + 1){
       $total = $total . "," . $result_array[$counter];
    }
    echo $total;
    */

    $total = "";
    while($rowData = mysqli_fetch_array($result)){
        if($total==""){
            $total = $total  . $rowData["name"];
        }else{
            $total = $total . "," . $rowData["name"];
        }
        
    }
    echo $total;
}else{
    // connection fail
    echo "FAIL";
}
// step3: close
mysqli_close($link);

?>

