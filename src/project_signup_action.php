<?php 
    session_start();
    include("function/project.php");
    $userId = $_SESSION['user_id'];
    $projectId = $_GET['projectId'];
    signUp($userId,$projectId);
    header('Location: student_project_detail.php');
?>
