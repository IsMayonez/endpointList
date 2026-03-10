<?php
header('Content-Type: application/json');



if(isset($_GET['arg1']) && isset($_GET['arg2'])) {
    $param1 = $_GET['arg1'];
    $param2 = $_GET['arg2'];
    $minfactor = 0.5;
    $maxfactor = 1.5;

    $combinedString = $param1 . ' ' . $param2;
    $timemessage = 0;
    if(isset($_GET['duration'])) {
        $factor = $minfactor + mt_rand() / mt_getrandmax() * ($maxfactor - $minfactor);
        $duration = (float)$_GET['duration'] * $factor;
        usleep((int)($duration * 1000000));
        $timemessage = $duration;
    }
    
    $response = [
        'status' => 'success',
        'message' => 'Works',
        'combined_result' => $combinedString,
        'waited for' => $timemessage
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