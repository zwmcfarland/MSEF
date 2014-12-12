<?php
    /*
     * Name: User Profile Edit Action
     * Description:
     *     This page is used as the action page for the form on the user_profile_edit page.
     * Arguments:
     *    $_POST['UserId']         - Id of user being updated.
     *    $_POST['FirstName']      - First name of user.
     *    $_POST['LastName']       - Last name of user
     *    $_POST['Email]           - Users email
     *    $_POST['PhoneNumber']    - users phone number
     *    $_POST['AltPhoneNumber'] - Optional alternate users phone number
     *    $_POST['School']         - School id of user
     *    $_POST['Grade']          - Grade of user
     *    $_POST['Address1']       - Address of user
     *    $_POST['Address2']       - Address 2 of user
     *    $_POST['City']           - City user lives in
     *    $_POST['State']          - State user lives in
     *    $_POST['Zip']            - Zip code of users address
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary fles.
    include("function/user.php");

    /*---- Variables ----*/
    $result = array();
    $userId        = $_POST['UserId'];
    $firstName     = $_POST['FirstName'];
    $lastName      = $_POST['LastName'];
    $email         = $_POST['Email'];
    $phoneNumber   = $_POST['PhoneNumber'];
    $altPhoneNumber= $_POST['AltPhoneNumber'];
    $school        = $_POST['School'];
    $grade         = $_POST['Grade'];
    $address1      = $_POST['Address1'];
    $address2      = $_POST['Address2'];
    $city          = $_POST['City'];
    $state         = $_POST['State'];
    $zip           = $_POST['Zip'];
    /*--- END: Variables ---*/

    /* Validation */
    //First Name
    if(empty($firstName) || $firstName == NULL) {
        array_push($result, array('Message' => 'A first Name is required.', 'Element' => 'FirstName', 'type' => 'error'));
    }
    //Last Name
    if(empty($lastName) || $lastName == NULL) {
        array_push($result, array('Message' => 'A last Name is required.', 'Element' => 'LastName', 'type' => 'error'));
    }
    //Email
    if(empty($email) || $email == NULL) {
        array_push($result, array('Message' => 'An email is required.', 'Element' => 'Email', 'type' => 'error'));
    }
    //Phone Number
    if(empty($phoneNumber) || $phoneNumber == NULL || !preg_match("/^[0-9]{10}$/", $phoneNumber)) {
        array_push($result, array('Message' => 'A valid Phone Number is required.', 'Element' => 'PhoneNumber', 'type' => 'error'));
    }
    //Alt Phone Number
    if(!empty($altPhoneNumber) || $altPhoneNumber != NULL) {
        $isPhoneNum = false;
        //eliminate every char except 0-9
        $justNums = preg_replace("/[^0-9]/", '', $altPhoneNumber);
        //eliminate leading 1 if its there
        if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);
        //if we have 10 digits left, it's probably valid.
        if (strlen($justNums) == 10) $isPhoneNum = true;
        if(!$isPhoneNum) {
            array_push($result, array('Message' => 'Invalid Alternate Phone Number', 'Element' => 'AltPhoneNumber', 'type' => 'error'));
        }
    }
    //Address 1
    if(empty($address1) || $address1 == NULL) {
        array_push($result, array('Message' => 'An address is required.', 'Element' => 'Address1', 'type' => 'error'));
    }
    //City
    if(empty($city) || $city == NULL) {
        array_push($result, array('Message' => 'An city is required.', 'Element' => 'City', 'type' => 'error'));
    }
    //State
    if(empty($state) || $state == NULL) {
        array_push($result, array('Message' => 'An state is required.', 'Element' => 'State', 'type' => 'error'));
    }
    //Zip
    if(empty($zip) || $zip == NULL) {
        array_push($result, array('Message' => 'An Zip is required.', 'Element' => 'Zip', 'type' => 'error'));
    }
    /* END: Validation */

    //if passed validation
    if(empty($result))
    {
        /* Update user record in database. */
       updateUser($userId, $firstName, $lastName, $email, $phoneNumber, $altPhoneNumber, $school, $grade, $address1, $address2, $city, $state, $zip);
       array_push($result, array('SuccessURL' => 'user_profile_detail.php?userId=' . $userId . '&message=Successfully+Updated+Profile', 'type' => 'success'));
    }

    //Return results array, in json format.
    echo json_encode($result);
?>