<?php
header('Content-Type: application/json');
$token='EOQmeqYqUuq1ZoSx17AS';
if (isset($_GET['tkn']) && !empty($_GET['tkn'])) {
    if(($_GET['tkn']) == $token){
           include_once 'classes/autoload.php';
    $db = new Database;
        $query = $db->conn->query("UPDATE `user` SET `active`= 1");
        if($query){
    echo json_encode(array('status' => 'all ID active'));
        }else{
    echo json_encode(array('status' => 'active not update'));

        }

    $db->conn->close(); 
    }else{
            echo json_encode(array('status' => 'tkn false'));

    }


} else {
    echo json_encode(array('status' => 'Invalid information entered'));
}