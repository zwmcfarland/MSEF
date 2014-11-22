<?php
    include("function/headerfooter.php");
    include("function/form.php");
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
    incFooter();
?>