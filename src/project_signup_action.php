<?php
    /**
     * Name: Project signup
     * Description:
     *     This page signs a user up for a project
     * Arguments:
     *    None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Ensure we can get to session variables.
    session_start();
    
    ///Include neccessary files
    include("function/project.php");
    
    /**--- Params ---*/
    $userId = $_SESSION['user_id'];
    $projectId = $_GET['projectId'];
    /**--- END: Params ---*/
    
    ///Sign up for project.
    signUp($userId,$projectId);
    
    ///Redirect back
    header('Location: student_project_detail.php');
?>
