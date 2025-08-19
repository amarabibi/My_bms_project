<?php
header('Content-Type: application/json');
include(__DIR__ . "/../../includes/connection.php");



if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $badge_title  = $conn->real_escape_string($_POST['badge_title']);
    $badge_url    = $conn->real_escape_string($_POST['badge_url']);
    $completed_on = !empty($_POST['completed_on']) ? $_POST['completed_on'] : NULL;
    $expiry_date  = !empty($_POST['expiry_date']) ? $_POST['expiry_date'] : NULL;
    $emp_id       = (int) $_POST['emp_id'];
    $created_on   = $_POST['created_on'];

    // 3. Prepare SQL
    $sql = "INSERT INTO timelive_emp_badges
            (badge_title, badge_url, completed_on, expiry_date, emp_id, created_on) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssis", $badge_title, $badge_url, $completed_on, $expiry_date, $emp_id, $created_on);

    // 4. Execute and return JSON
    if ($stmt->execute()) {
        echo json_encode([
            "status" => "success",
            "message" => "Badge saved successfully",
            "insert_id" => $stmt->insert_id
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => $stmt->error
        ]);
    }

    $stmt->close();
    $conn->close();
    exit();
}

// If request is not POST
echo json_encode(["status" => "error", "message" => "Invalid request"]);
exit();
?>
