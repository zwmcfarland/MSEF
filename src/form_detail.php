<?php
    /*
     * Name: Form Detail
     * Description:
     *     This page is to display pdf's of forms
     * Arguments:
     *    $_GET['formId'] - Id of the form you are viewing 
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

	//Include necessary files
    include("function/headerfooter.php");
    include("function/form.php");

    //Create default header, and import pdfobject component
    incHeader('MSEF | Form', '', 'pdfobject.js');

    /* --- Params --- */
    $formId = $_GET['formId'];
    /* --- END: Params --- */

    /* --- Queries --- */
    $qryForm = mysql_fetch_assoc(getForms($formId));
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>
<!-- Script -->
<script>
	//Initialize the pdf viewer.
    window.onload = function (){
        var pdf = new PDFObject({
            url: "<?php echo $qryForm['FormPath']; ?>",
            id: "pdfRendered",
            pdfOpenParams: {
                view: "FitH"
            }
        }).embed("pdfRenderer");
    };
</script>
<!-- END: Script -->
<div class="col-lg-12">
    <div align="center" id="pdfRenderer" style="height:80%;margin-bottom:20px;">
    </div>
</div>
<?php
	//Create default footer
    incFooter();
?>