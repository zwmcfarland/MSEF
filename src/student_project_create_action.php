<?php
    include("function/project.php");

    /*---- Variables ----*/
    $ProjectName        = $_POST['ProjectName'];
    $description        = $_POST['Description'];
    $abstract           = $_POST['Abstract'];
    $user_id            = $_POST['User_Id'];
    $electrical         = false;
    if(isset($_POST['Electrical'])){
        $electrical = true;
    }

    /* Validation */
    //First Name
    $result = validate($ProjectName,$description,$abstract,$electrical,$user_id);
    /* END: Validation */
    if(empty($result))
    {
        /* Do insert */
       $projectId = createProject($ProjectName,$description,$abstract,$user_id, $electrical);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       } else {
           signUp($user_id,$projectId);
           array_push($result, array('SuccessURL' => 'student_project_detail.php?projectId=' . $projectId . '&message=Successfully+Created+Project', 'type' => 'success'));
       }
    }

    echo json_encode($result);
?>