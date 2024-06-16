<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the data from the POST request
    $data = json_decode(file_get_contents('php://input'), true);

    // Set the session variable
    if (isset($data['userID'])) {
        $_SESSION['userID'] = $data['userID'];
        echo json_encode(['status' => 'success', 'message' => 'Session variable set']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No variable provided']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
