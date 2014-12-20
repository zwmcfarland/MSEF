<?php
    /**
     * Name: Student project create action
     * Description:
     *     This is the action page for student projcet create form page.
     * Arguments:
     *    $_POST['ProjectName'] - Name of the projcet
     *    $_POST['Description'] - Description of the project.
     *    $_POST['Abstract']    - Abstract of the project.
     *    $_POST['User_Id']     - User id of the user creating project.
     *    $_POST['Electrical']  - Wether or not the project will need an electrical outlet at the fair
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files.
    include("function/project.php");

    /**---- Variables ----*/
    $ProjectName        = $_POST['ProjectName'];
    $description        = $_POST['Description'];
    $abstract           = $_POST['Abstract'];
    $user_id            = $_POST['User_Id'];
    $electrical         = false;
    if(isset($_POST['Electrical'])){
        $electrical = true;
    }
    /**--- END: Variables ---*/

    /** Validation */
    ///First Name
    $result = validate($ProjectName,$description,$abstract,$electrical,$user_id);
    /** END: Validation */

    ///If validation passed.
    if(empty($result))
    {
        /** Create project record in database */
       $projectId = createProject($ProjectName,$description,$abstract,$user_id, $electrical);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
           signUp($user_id,$projectId);
           array_push($result, array('SuccessURL' => 'student_project_detail.php?projectId=' . $projectId . '&message=Successfully+Created+Project', 'type' => 'success'));
       }
    }

    ///Return result array, in json format
    echo json_encode($result);
?>