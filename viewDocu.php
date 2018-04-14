<?php
if(!empty($_GET['id'])){

    include("db_connect.php");
    session_start();
    
    $query = mysqli_query($conn, "SELECT * FROM documents WHERE id = '".$_GET['id']."'");
    
    if($query->num_rows > 0){
        $row = $query->fetch_assoc();
        echo "<img src='upload/".$row['imagename']."'>";
    }else{
        echo 'Content not found....';
    }
}else{
    echo 'Content not found....';
}
?>