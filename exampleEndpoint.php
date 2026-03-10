<?php
header('Content-Type: application/json');

if(isset($_GET['arg1']) && isset($_GET['arg2'])) {
    $param1 = $_GET['arg1'];
    $param2 = $_GET['arg2'];

    $combinedString = $param1 . ' ' . $param2;
    $response = [
        'status' => 'success',
        'message' => 'Parameters received',
        'combined_result' => $combinedString
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