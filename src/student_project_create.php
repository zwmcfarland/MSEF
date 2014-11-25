<?php
    include("function/headerfooter.php");
    include("function/project.php");
    incHeader('MSEF | Project', '', 'form.js');
    
    /* --- Queries --- */
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>

<!-- Script -->
    <script>
        $(window).bind('beforeunload', function(e){
            return "All unsaved data will be lost:";
        });
    </script>
<!-- END: Script -->

<div class="col-lg-12">
    <!-- Users Detials -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="display:inline-block">Project Information</h3>
            </div>

            <div class="panel-body">
            	<form style="padding-top: 10px;" action="student_project_create_action.php" method="post" enctype="multipart/form-data" id="newBrdForm" target="formSubFrame" onsubmit="formSubmit()">
                <input type="hidden" name="User_Id"  value="<?php echo $_SESSION['user_id']; ?>"/> 
                <div class="form-group">
	                <dl class="dl-horizontal">
	                    <dt>Name</dt>
	                    <dd><input type="text" class="form-control" name="ProjectName" placeholder="Enter Project Name"></dd>
	                </dl>
                </div>
                <div class="form-group">
	                <dl class="dl-horizontal">
	                    <dt>Description</dt>
	                    <dd><textarea class="form-control" name="Description" placeholder="Enter Project Description"></textarea></dd>
	                </dl>
                </div>
                <div class="form-group">
	                <dl class="dl-horizontal">
	                    <dt>Abstract</dt>
	                    <dd><textarea class="form-control" name="Abstract" placeholder="Enter Project Abstract"></textarea></dd>
	                </dl>
                </div>
                <div class="form-group">
	                <dl class="dl-horizontal">
	                    <dt>Electrical</dt>
	                    <dd><input type="checkbox" name="Electrical"></dd>
	                </dl>
                </div>
                <div class="form-group" align="center">
	                <button type="button" onclick="window.location='user_profile_detail.php';" class="btn">Cancel</button>
	                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
   <iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()"></iframe>
</div>
<?php
    incFooter();
?>
