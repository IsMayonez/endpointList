<?php
header('Content-Type: application/json');

$status="success";
$message="Works!";
$minfactor = 0.5;
$maxfactor = 1.5;

if(isset($_GET['minRandFactor']) && isset($_GET['maxRandFactor'])) {
    $minfactor = $_GET['minRandFactor'];
    $maxfactor = $_GET['maxRandFactor'];
}
    
$timemessage = 0;
    
if(isset($_GET['duration'])) {
    $factor = $minfactor + mt_rand() / mt_getrandmax() * ($maxfactor - $minfactor);
    $duration = (float)$_GET['duration'] * $factor;
    usleep((int)($duration * 1000000));
    $timemessage = $duration;
    
} else {
    $status="useless";
    $message="You didn't send a duration!";
}
    
$response = [
    'status' => $status,
    'message' => $message,
    'waited for' => $timemessage
];
http_response_code(200);
 
echo json_encode($response);
?>