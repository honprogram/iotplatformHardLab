<?php
header('Content-Type: application/json');

if (
    isset($_GET['id']) && !empty($_GET['id'])
) {

    

    $id = $_GET['id'];
    
                echo json_encode(
                    array(
                        'id' => $id,
                        'minA' => "0",
                        'maxA' => "0",
                        'Ca' => "0",
                        'minB' => "0",
                        'maxB' => "0",
                        'Cb' => "0",
                        'minC' => "0",
                        'maxC' => "0",
                        'Cc' => "0",
                        'minD' => "0",
                        'maxD' => "0",
                        'Cd' => "0",
                        'minE' => "0",
                        'maxE' => "0",
                        'Ce' => "0",
                        'minF' => "0",
                        'maxF' => "0",
                        'Cf' => "0",
                        'minG' => "0",
                        'maxG' => "0",
                        'Cg' => "0",
                        'minH' => "0",
                        'maxH' => "0",
                        'Ch' => "0"
                        
                    )
                );
           
            }
        
         else {
    echo json_encode(array('status' => 'Invalid information entered'));
}
