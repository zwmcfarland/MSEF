<?php
    include("function/user.php");

    /*---- Variables ----*/
    $result = array();

    $userId        = $_POST['UserId'];
    $firstName     = $_POST['ParentFirstName'];
    $lastName      = $_POST['ParentLastName'];
    $email         = $_POST['ParentEmail'];
    $phoneNumber   = $_POST['ParentPhoneNumber'];

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
    if(empty($result)) {
        /* Do update */
       updateUserParent($userId, $firstName, $lastName, $email, $phoneNumber);
       array_push($result, array('SuccessURL' => 'user_profile_detail.php?userId=' . $userId . '&message=Successfully+Updated+Profile', 'type' => 'success'));
    }

    echo json_encode($result);
?>