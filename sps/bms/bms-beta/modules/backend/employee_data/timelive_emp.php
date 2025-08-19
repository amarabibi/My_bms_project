<?php
header('Content-Type: application/json');
include(__DIR__ . "/../../../includes/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fields expected from the form
    $fields = [
        "emp_name", "emp_email", "emp_mobile", "emp_address_1", "emp_address_2",
        "emp_city", "emp_country", "emp_hire_date", "manual_entry", "emp_gender",
        "company", "sps_corporate", "staff", "personal_email"
    ];

    // Collect inputs safely
    $data = [];
    foreach ($fields as $field) {
        $data[$field] = mysqli_real_escape_string($conn, $_POST[$field] ?? '');
    }

    // Required fields check
    if (empty($data['emp_name']) || empty($data['emp_email'])) {
        echo json_encode([
            "status" => "error",
            "message" => "Employee Name and Email are required."
        ]);
        exit;
    }

    // Build query dynamically
    $columns = implode(", ", array_keys($data));
    $values  = "'" . implode("','", $data) . "'";
    $sql = "INSERT INTO timelive_emp ($columns) VALUES ($values)";

    // Run query
    if (mysqli_query($conn, $sql)) {
        echo json_encode([
            "status" => "success",
            "message" => "✅ Employee record saved successfully!"
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
