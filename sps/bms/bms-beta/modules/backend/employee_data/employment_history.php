<?php
include(__DIR__ . "/../../includes/connection.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect inputs
    $emp_id           = $_POST['emp_id'] ?? null;
    $ed_id            = $_POST['ed_id'] ?? null;
    $department_id    = $_POST['department_id'] ?? null;
    $group_id         = $_POST['group_id'] ?? null;
    $practice_id      = $_POST['practice_id'] ?? null;
    $role_id          = $_POST['role_id'] ?? null;
    $hire_date        = $_POST['hire_date'] ?? null;
    $job_title        = $_POST['job_title'] ?? null;
    $functional_role  = $_POST['functional_role'] ?? null;
    $corporate_role   = $_POST['corporate_role'] ?? null;
    $termination_date = !empty($_POST['termination_date']) ? $_POST['termination_date'] : null;
    $letter_attachment= $_POST['letter_attachment'] ?? null; //  if file → use $_FILES
    $created_by       = $_POST['created_by'] ?? null;
    $updated_by       = $_POST['updated_by'] ?? null;

    // Basic validation
    if (empty($emp_id) || empty($role_id) || empty($job_title)) {
        echo json_encode(["status" => "error", "message" => "Employee ID, Role ID, and Job Title are required."]);
        exit;
    }

    // Prepared statement
    $sql = "INSERT INTO employment_history (
                emp_id, ed_id, department_id, group_id, practice_id, role_id, hire_date,
                job_title, functional_role, corporate_role, termination_date,
                letter_attachment, created_by, updated_by
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "iiiiisssssssss", 
            $emp_id, $ed_id, $department_id, $group_id, $practice_id, $role_id, $hire_date,
            $job_title, $functional_role, $corporate_role, $termination_date,
            $letter_attachment, $created_by, $updated_by
        );

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Job role saved successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Database prepare failed: " . $conn->error]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
