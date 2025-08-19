<?php
include(__DIR__ . "/../../includes/connection.php");


header("Content-Type: application/json"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emp_id    = isset($_POST['emp_id']) ? intval($_POST['emp_id']) : 0;
    $doc_title = isset($_POST['doc_title']) ? trim($_POST['doc_title']) : '';
    $added_by  = !empty($_POST['added_by']) ? $_POST['added_by'] : NULL;
    $doc_file  = NULL;

    //  Handle file upload if exists
    if (!empty($_FILES['doc_attachment']['name']) && $_FILES['doc_attachment']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = realpath(__DIR__ . "/../../assets/uploads/emp_docs/") . "/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName   = time() . "_" . basename($_FILES['doc_attachment']['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['doc_attachment']['tmp_name'], $targetFile)) {
            $doc_file = $fileName;
        }
    }

    try {
        $stmt = $conn->prepare("INSERT INTO timelive_emp_docs (doc_title, doc_attachment, emp_id, added_by) 
                                VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $doc_title, $doc_file, $emp_id, $added_by);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Record saved successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "DB Error: " . $stmt->error]);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }

    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
