<?php
    /*
     * Name: Submit project Action
     * Description:
     *     This page is used as the action page for the form on submit_project page.
     * Arguments:
     *     $_POST['ProjectId'] - Id of the project being submitted.
     *     $_POST['Sponsor']   - Id of the sponsor for this project.
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */
    include("function/project.php");

    /*---- Variables ----*/
    $result = array();
    $ProjectId        = $_POST['ProjectId'];
    $sponsorId        = $_POST['Sponsor'];
    /*--- END: Variables ---*/

    //Update project status
    submitProject($ProjectId,$sponsorId);
    if(mysql_error()){
        array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
    } else {
        array_push($result, array('SuccessURL' => 'user_profile_detail.php?message=Successfully+Submitted+Project', 'type' => 'success'));
    }

    //Return result array, in json format
    echo json_encode($result);
?>