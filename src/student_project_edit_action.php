<?php
    /*
     * Name: Student project edit action
     * Description:
     *     This page is used as the action page for the form on student project edit page.
     * Arguments:
     *     $_POST['ProjectId']   - Id of the project being edited
     *     $_POST['ProjectName'] - Name of the project
     *     $_POST['Description'] - description of the project
     *     $_POST['Abstract']    - abstract of the project
     *     $_POST['Electrical']  - wether or not the project needs an electric hookup
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */
    //Ensure session variables are avalible.
    session_start();

    //Include necesssary files.
    include("function/project.php");

    /*---- Variables ----*/
    $result = array();
    $projectId          = $_POST['ProjectId'];
    $ProjectName        = $_POST['ProjectName'];
    $description        = $_POST['Description'];
    $abstract           = $_POST['Abstract'];
    $electrical         = false;
    if(isset($_POST['Electrical'])){
        $electrical = true;
    }
    /*---- END: Variables ----*/

    /* Validation */
    $result = validate($ProjectName,$description,$abstract,$electrical, $_SESSION['user_id']);
    /* END: Validation */

    //If passed validation
    if(empty($result))
    {
       /* Update database record */
       updateProject($projectId, $ProjectName,$description,$abstract,$electrical);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
           array_push($result, array('SuccessURL' => 'student_project_detail.php?projectId=' . $projectId . '&message=Successfully+Updated+Project', 'type' => 'success'));
       }
    }

    //Return results array, in json format.
    echo json_encode($result);
?>