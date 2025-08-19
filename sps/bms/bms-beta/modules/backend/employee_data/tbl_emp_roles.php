<?php

header('Content-Type: application/json');
include(__DIR__ . "/../../../includes/connection.php");



// Collect form data
$emp_role_name   = $_POST['emp_role_name']   ?? '';
$emp_role_status = $_POST['emp_role_status'] ?? 1;
$qualification   = $_POST['qualification']   ?? '';
$knowledge       = $_POST['knowledge']       ?? '';
$skills          = $_POST['skills']          ?? '';
$responsibilities= $_POST['responsibilities']?? '';

// Validation
if (empty($emp_role_name)) {
    echo json_encode(["status" => "error", "message" => "Role Name is required"]);
    exit;
}

// Prepared statement
$sql = "INSERT INTO tbl_emp_roles (emp_role_name, emp_role_status, qualification, knowledge, skills, responsibilities) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sissss", $emp_role_name, $emp_role_status, $qualification, $knowledge, $skills, $responsibilities);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Role added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Query preparation failed: " . $conn->error]);
}

$conn->close();
?>
