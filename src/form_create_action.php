<?php
    /**
     * Name: Form Create Action
     * Description:
     *     This page is used as the action page for the form on the form_create page.
     * Arguments:
     *    $_POST['FormName'] - Name of the new form.
     *    $_FILES['Form']      - PDF of the form.
     *    $_POST['Keywords'] - List of keywords describing this form.
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files.
    include("function/keywords.php");
    include("function/form.php");

    /**---- Variables ----*/
    $result = array();
    $formName   = $_POST['FormName'];
    $fileName    = $_FILES["Form"]["name"];
    $fileType    = $_FILES["Form"]["type"];
    $fileTMP     = $_FILES["Form"]["tmp_name"];
    $fileERR     = $_FILES["Form"]["error"];
    $fileSize    = $_FILES["Form"]["size"];
    $keywords    = explode(',', $_POST['Keywords']);
    /**---- END: Variables ----*/

    /** Validation */
    if(empty($formName) || $formName == NULL) {
        array_push($result, array('Message' => 'An form name is required.', 'Element' => 'FormName', 'type' => 'error'));
    }
    if(empty($fileName) || $fileName == NULL) {
        array_push($result, array('Message' => 'An file is required.', 'Element' => 'Form', 'type' => 'error'));
    }
    if(strcasecmp($fileType,'application/pdf') != 0) {
        array_push($result, array('Message' => 'The file must be in PDF format.', 'Element' => 'Form', 'type' => 'error'));
    }    
    /** END: Validation */

    ///if Passed validation
    if(empty($result)) {
        ///Insert form
        $formId = createForm($formName, "forms/" . $fileName);
        if(mysql_error()) {
            array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
        }
        else {
            ///Move upload file to correct place.
            move_uploaded_file($fileTMP,"forms/". $fileName);
            foreach($keywords as $keyword) {
                ///If keyword was pre-existing, association, other wise insert then associate
                if(property_exists($keyword, 'Id')) {
                    $newKeywordId = $keyword.Id;
                }
                else {
                    $newKeywordId = insertKeyword($keyword);
                }
                associateKeyword($formId, $newKeywordId);
            }
            array_push($result, array('SuccessURL' => 'browse_forms.php?message=Successfully+Created+Form', 'type' => 'success'));
        }
    }

    ///Return results array in json format.
    echo json_encode($result);
?>