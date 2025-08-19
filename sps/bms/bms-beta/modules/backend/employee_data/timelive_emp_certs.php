<?php
header("Content-Type: application/json"); // always return JSON

include(__DIR__ . "/../../includes/connection.php");


$response = ["status" => "error", "message" => "Something went wrong."];

try {
    $cat_id         = $_POST['cat_id'] ?? null;
    $subcat_id      = $_POST['subcat_id'] ?? null;
    $certtitle_id   = $_POST['certtitle_id'] ?? null;
    $cert_code      = $_POST['cert_code'] ?? null;
    $cert_url       = $_POST['cert_url'] ?? null;
    $cert_status    = $_POST['cert_status'] ?? null;
    $cert_exam_date = $_POST['cert_exam_date'] ?? null;
    $cert_expiry_date = $_POST['cert_expiry_date'] ?? null;
    $cert_score     = $_POST['cert_score'] ?? null;
    $emp_id         = $_POST['emp_id'] ?? null;
    $created_on     = $_POST['created_on'] ?? null;

    // Handle file upload
    $cert_attachment = "";
    if (!empty($_FILES['cert_attachment']['name'])) {
        $target_dir = "../../assets/uploads/emp_certs";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $cert_attachment = $target_dir . time() . "_" . basename($_FILES["cert_attachment"]["name"]);
        move_uploaded_file($_FILES["cert_attachment"]["tmp_name"], $cert_attachment);
    }

    // Insert into DB
    $sql = "INSERT INTO timelive_emp_certs
            (cat_id, subcat_id, certtitle_id, cert_code, cert_url, cert_status, created_on, emp_id, cert_exam_date, cert_expiry_date, cert_score, cert_attachment) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "iiissssissss",
        $cat_id,
        $subcat_id,
        $certtitle_id,
        $cert_code,
        $cert_url,
        $cert_status,
        $created_on,
        $emp_id,
        $cert_exam_date,
        $cert_expiry_date,
        $cert_score,
        $cert_attachment
    );

    if ($stmt->execute()) {
        $response = ["status" => "success", "message" => "Certification saved successfully!"];
    } else {
        $response = ["status" => "error", "message" => "Database error: " . $stmt->error];
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    $response = ["status" => "error", "message" => $e->getMessage()];
}

echo json_encode($response);
