<?php
    require_once 'admin/connect.php';

    // Extract leave data from POST
    extract($_POST);

    // Insert leave record into the database
    $insert = $conn->query("INSERT INTO leave_records (employee_id, leave_type, start_date, end_date, status) VALUES ('$employee_id', '$leave_type', '$start_date', '$end_date', '$status')");

    if ($insert) {
        echo json_encode(array('status' => 1, 'msg' => 'Leave request submitted successfully.'));
    } else {
        echo json_encode(array('status' => 0, 'msg' => 'Failed to submit leave request.'));
    }
?>
