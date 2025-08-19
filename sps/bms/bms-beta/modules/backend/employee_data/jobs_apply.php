<?php
include(__DIR__ . "/../../includes/connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $emp_id = $_POST['emp_id'] ?? null;
    $hrid = $_POST['hrid'] ?? null;
    $job_id = $_POST['job_id'] ?? null;
    $email = $_POST['email'] ?? null;
    $highest_education = $_POST['highest_education'] ?? null;
    $experience_years = $_POST['experience_years'] ?? null;
    $certification_url = $_POST['certification_url'] ?? null;
    $current_salary = $_POST['current_salary'] ?? null;
    $expected_salary = $_POST['expected_salary'] ?? null;
    $notice_period = $_POST['notice_period'] ?? null;
    $salary = $_POST['salary'] ?? null;
    $linkedIn = $_POST['linkedIn'] ?? null;
    $github = $_POST['github'] ?? null;
    $commute_loc = $_POST['commute_loc'] ?? null;
    $location_islamabad = $_POST['location_islamabad'] ?? null;
    $portfolio = $_POST['portfolio'] ?? null;
    $company_interest = $_POST['company_interest'] ?? null;
    $tool_proficiency = $_POST['tool_proficiency'] ?? null;
    $best_fit = $_POST['best_fit'] ?? null;
    $manage_team = $_POST['manage_team'] ?? null;

    // File Uploads
    $resume_file = null;
    if (!empty($_FILES['resume_file']['name'])) {
        $targetDir = "../../assets/uploads/emp_resumes/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $resume_file = $targetDir . time() . "_" . basename($_FILES["resume_file"]["name"]);
        move_uploaded_file($_FILES["resume_file"]["tmp_name"], $resume_file);
    }

    $certification_file = null;
    if (!empty($_FILES['certification_file']['name'])) {
        $targetDir = "../../assets/uploads/emp_docs/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $certification_file = $targetDir . time() . "_" . basename($_FILES["certification_file"]["name"]);
        move_uploaded_file($_FILES["certification_file"]["tmp_name"], $certification_file);
    }

    $cover_letter = null;
    if (!empty($_FILES['cover_letter']['name'])) {
        $targetDir = "../../assets/uploads/emp_docs";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $cover_letter = $targetDir . time() . "_" . basename($_FILES["cover_letter"]["name"]);
        move_uploaded_file($_FILES["cover_letter"]["tmp_name"], $cover_letter);
    }

    // Insert query
    $sql = "INSERT INTO jobs_apply
        (emp_id, hrid, job_id, email, cover_letter, highest_education, experience_years, certification_url, 
         current_salary, expected_salary, notice_period, salary, linkedIn, github, commute_loc, location_islamabad, 
         portfolio, company_interest, tool_proficiency, best_fit, manage_team, certification_file, flag_resume, apply_date, apply_time)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, CURDATE(), CURTIME())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "iiissssssssissssssssssi",
        $emp_id, $hrid, $job_id, $email, $cover_letter, $highest_education, $experience_years,
        $certification_url, $current_salary, $expected_salary, $notice_period, $salary, $linkedIn,
        $github, $commute_loc, $location_islamabad, $portfolio, $company_interest, $tool_proficiency,
        $best_fit, $manage_team, $certification_file, $resume_file
    );

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Personal information saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
