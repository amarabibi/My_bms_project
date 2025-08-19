<?php
include(__DIR__ . "/../../includes/connection.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect inputs safely
    $emp_id          = mysqli_real_escape_string($conn, $_POST['emp_id'] ?? '');
    $ed_id           = mysqli_real_escape_string($conn, $_POST['ed_id'] ?? '');
    $user_id         = mysqli_real_escape_string($conn, $_POST['user_id'] ?? '');
    $count_writing   = mysqli_real_escape_string($conn, $_POST['count_writing'] ?? '');
    $count_listening = mysqli_real_escape_string($conn, $_POST['count_listening'] ?? '');
    $count_speaking  = mysqli_real_escape_string($conn, $_POST['count_speaking'] ?? '');
    $comments        = mysqli_real_escape_string($conn, $_POST['comments'] ?? '');
    $added_on        = mysqli_real_escape_string($conn, $_POST['added_on'] ?? '');

    // Basic validation
    if (empty($emp_id) || empty($added_on)) {
        echo json_encode([
            "status" => "error", 
            "message" => "Employee ID and Added On date are required."
        ]);
        exit;
    }

    // SQL insert query
    $sql = "INSERT INTO timelive_emp_communication_skills (
                emp_id, ed_id, user_id, 
                count_writing, count_listening, count_speaking, 
                comments, added_on
            ) VALUES (
                '$emp_id', 
                " . (!empty($ed_id) ? "'$ed_id'" : "NULL") . ",
                " . (!empty($user_id) ? "'$user_id'" : "NULL") . ",
                " . (!empty($count_writing) ? "'$count_writing'" : "NULL") . ",
                " . (!empty($count_listening) ? "'$count_listening'" : "NULL") . ",
                " . (!empty($count_speaking) ? "'$count_speaking'" : "NULL") . ",
                " . (!empty($comments) ? "'$comments'" : "NULL") . ",
                '$added_on'
            )";

    if (mysqli_query($conn, $sql)) {
        echo json_encode([
            "status" => "success", 
            "message" => "Learning & Development record saved successfully."
        ]);
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "Database error: " . mysqli_error($conn)
        ]);
    }

} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Invalid request method."
    ]);
}
?>
