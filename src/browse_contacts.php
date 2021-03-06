<?php
    /**
     * Name: Contacts
     * Description:
     *     This page gives contact information for the MSEF staff.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files.
    include("function/headerfooter.php");

    ///Create default header
    incHeader('MSEF | Contact Us');
    
    /** --- Queries --- */
    /** --- END: Queries ---*/
    
    /** --- Security --- */
    /** --- END: Security --- */
?>
<div class="col-lg-12">
    <div class="col-lg-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Contact</h3>
            </div>
            <div class="panel-body">
                <p>
                    MSEF is affiliated with the Nebraska Junior Academy of Sciences (NJAS). Further information about this year's Fair is found in this year's Booklet.
                    If you have any further questions, feel free to reach out to us and we will respond as quickly as possible.
                </p>
                <dl class="dl-horizontal">
                    <dt>Email</dt>
                    <dd><p><a href="mailto:you@youraddress.com">you@youraddress.com</a></p></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Phone</dt>
                    <dd><p><a href="tel:123-456-7890">123-456-7890</a></p></dd>
                </dl>
                
           </div>
       </div>
   </div>
</div>
<?php
    ///Create default header.
    incFooter();
?>