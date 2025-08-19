<?php
include(__DIR__ . "/../../../includes/connection.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $university     = mysqli_real_escape_string($conn, $_POST['university'] ?? '');
    $field_of_study = mysqli_real_escape_string($conn, $_POST['field_of_study'] ?? '');
    $passing_year   = mysqli_real_escape_string($conn, $_POST['passing_year'] ?? '');
    $course         = mysqli_real_escape_string($conn, $_POST['course'] ?? '');
    $grade          = mysqli_real_escape_string($conn, $_POST['grade'] ?? '');

    if (empty($university) || empty($field_of_study) || empty($passing_year) || empty($course) || empty($grade)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    $sql = "INSERT INTO emp_education (university, field_of_study, passing_year, course, grade)
            VALUES ('$university', '$field_of_study', '$passing_year', '$course', '$grade')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

?>