<?php
    /*
     * Name: Parent Profile Edit Action
     * Description:
     *     This page is used as the action page for parent profile edit page.
     * Arguments:
     *    $_POST['UserId']            - Id of the user that is being edited
     *    $_POST['ParentFirstName']   - First name of users parent
     *    $_POST['ParentLastName']    - Last name of users parent
     *    $_POST['ParentEmail']       - Email of users parent
     *    $_POST['ParentPhoneNumber'] - Phone number of users parent
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary files.
    include("function/user.php");

    /*---- Variables ----*/
    $result = array();
    $userId        = $_POST['UserId'];
    $firstName     = $_POST['ParentFirstName'];
    $lastName      = $_POST['ParentLastName'];
    $email         = $_POST['ParentEmail'];
    $phoneNumber   = $_POST['ParentPhoneNumber'];
    /*--- END: Variables ---*/
    
    /* Validation */
    //First Name
    if(empty($firstName) || $firstName == NULL) {
        array_push($result, array('Message' => 'A first Name is required.', 'Element' => 'ParentFirstName', 'type' => 'error'));
    }
    //Last Name
    if(empty($lastName) || $lastName == NULL) {
        array_push($result, array('Message' => 'A last Name is required.', 'Element' => 'ParentLastName', 'type' => 'error'));
    }
    //Email
    if(empty($email) || $email == NULL) {
        array_push($result, array('Message' => 'An email is required.', 'Element' => 'ParentEmail', 'type' => 'error'));
    }
    //Phone Number
    if(empty($phoneNumber) || $phoneNumber == NULL || !preg_match("/^[0-9]{10}$/", $phoneNumber)) {
        array_push($result, array('Message' => 'A valid Phone Number is required.', 'Element' => 'ParentPhoneNumber', 'type' => 'error'));
    }
    /* END: Validation */

    //If validation passed
    if(empty($result)) {
        /* Update user record in database. */
       updateUserParent($userId, $firstName, $lastName, $email, $phoneNumber);
       array_push($result, array('SuccessURL' => 'user_profile_detail.php?userId=' . $userId . '&message=Successfully+Updated+Profile', 'type' => 'success'));
    }

    //Return result array, in json format
    echo json_encode($result);
?>