<?php 
    /**
     * Name: Suggested categories
     * Description:
     *     This page allows staff to see algorithmically suggested projects for categories
     * Arguments:
     *    None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    ///Include necessary files
    include("function/headerfooter.php");
    include("function/project.php");
    include("function/categories.php");

    ///Create default header
    incHeader("MSEF | Categories");
    
    /**--- Queries ---*/
    $sugProjStruct = getSuggestedProjectCategories();
    $qryCategories = getCategories();
    /**--- END: Queries ---*/
?>

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="display:inline-block">Projects</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Projects</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysql_fetch_assoc($qryCategories)): ?>
                        <tr>
                            <td><?php echo $row['Name']?></td>
                            <td>
                                <ul>
                                    <?php foreach($sugProjStruct[$row['Id']] as $project):?>
                                        <li><?php echo $project['project_name']; ?></li>
                                    <?php endforeach;?>
                                </ul>
                            </td>
                        </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    ///Create default footer
    incFooter(); 
?>