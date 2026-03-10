<?php
header('Content-Type: application/json');



if(isset($_GET['arg1']) && isset($_GET['arg2'])) {
    $param1 = $_GET['arg1'];
    $param2 = $_GET['arg2'];

    $combinedString = $param1 . ' ' . $param2;
    //$timemessage = 0
    if(isset($_GET['duration'])) {
        sleep((int)$_GET['duration']);
        //$timemessage = $_GET['duration']
    }
    
    $response = [
        'status' => 'success',
        'message' => 'Works',
        'combined_result' => $combinedString
        //'waited for' => $timemessage
    ];

    http_response_code(200);
} else {
    $response = [
        'status' => 'failed',
        'message' => 'Wrong params',
    ];
    http_response_code(400);
}
echo json_encode($response);
?>