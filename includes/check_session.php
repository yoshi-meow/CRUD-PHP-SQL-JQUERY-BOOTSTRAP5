<?php
session_start();

if (isset($_SESSION['status']) && isset($_SESSION['status_code']) && isset($_SESSION['status_title'])) {
    $status = $_SESSION['status'];
    $status_code = $_SESSION['status_code'];
    $status_title = $_SESSION['status_title'];

    // Reset the session variables
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    unset($_SESSION['status_title']);

    $response = array(
        'status' => $status,
        'status_code' => $status_code,
        'status_title' => $status_title
    );

    echo json_encode($response);
} else {
    echo json_encode(array('status' => '', 'status_code' => '', 'status_title' => ''));
}
?>
