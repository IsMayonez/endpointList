<?php
header('Content-Type: application/json');

$minfactor = 0.5;
$maxfactor = 1.5;

if(isset($_GET['minRandFactor']) && isset($_GET['maxRandFactor'])) {
    $param1 = $_GET['minRandFactor'];
    $param2 = $_GET['maxRandFactor'];
}
    
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
    'waited for' => $timemessage
];
http_response_code(200);
 
echo json_encode($response);
?>