<?php
    include("function/keywords.php");
    include("function/form.php");
    
    /*---- Variables ----*/
    $result = array();
    $formName   = $_POST['FormName'];
    $fileName    = $_FILES["Form"]["name"];
    $fileType    = $_FILES["Form"]["type"];
    $fileTMP     = $_FILES["Form"]["tmp_name"];
    $fileERR     = $_FILES["Form"]["error"];
    $fileSize    = $_FILES["Form"]["size"];
    $keywords    = explode(',', $_POST['Keywords']);
    
    /* Validation */
    if(empty($formName) || $formName == NULL) {
        array_push($result, array('Message' => 'An form name is required.', 'Element' => 'FormName', 'type' => 'error'));
    }
    if(empty($fileName) || $fileName == NULL) {
        array_push($result, array('Message' => 'An file is required.', 'Element' => 'Form', 'type' => 'error'));
    }
    if(strcasecmp($fileType,'application/pdf') != 0) {
        array_push($result, array('Message' => 'The file must be in PDF format.', 'Element' => 'Form', 'type' => 'error'));
    }
    
    /* END: Validation */
    if(empty($result))
    {
        $formId = createForm($formName, "forms/" . $fileName);
        if(mysql_error()) {
            array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
        }
        else {
            move_uploaded_file($fileTMP,"forms/". $fileName);
            foreach($keywords as $keyword) {
                //Insert keyword
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
    
    echo json_encode($result);
?>