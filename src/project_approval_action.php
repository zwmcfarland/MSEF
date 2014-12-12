<?php
    include("function/project.php");

    /*---- Variables ----*/
    $result = array();
    $ProjectId     = $_POST['ProjectId'];
    $status        = $_POST['stat'];

    
    approveProject($ProjectId,$status);
    if(mysql_error()){
        array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
    } else {
        array_push($result, array('SuccessURL' => 'browse_approvals.php', 'type' => 'success'));
    }
    
    echo json_encode($result);
?>