<?php
    /**
     * Name: Project Approval Action
     * Description:
     *     This page is used as the action page for the project approval page
     * Arguments:
     *    $_POST['ProjectId'] - Id of the project being approved.
     *    $_POST['stat']      - Status of the project, either approved or returned
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */
    include("function/project.php");

    /**---- Variables ----*/
    $result = array();
    $ProjectId     = $_POST['ProjectId'];
    $status        = $_POST['stat'];
    /**--- END: Variables ---*/

    ///Update project status
    approveProject($ProjectId,$status);
    if(mysql_error()){
        array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
    } else {
        array_push($result, array('SuccessURL' => 'browse_approvals.php', 'type' => 'success'));
    }

    ///Return results array, in json format
    echo json_encode($result);
?>