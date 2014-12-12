<?php
    /*
     * Name: Browse categories
     * Description:
     *     This page allows all users to view a list of the categories.
     * Arguments:
     *     None
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/11/2014 - Created Comments.
     */

    //Include necessary files
    include("function/headerfooter.php");
    include("function/categories.php");

    //Create default header
    incHeader('MSEF | Categories');
    
    /* --- Params --- */
    /* --- END: Params --- */
    
    /* --- Queries --- */
    $qrycategories = getCategories();
    /* --- END: Queries ---*/
    
    /* --- Security --- */
    /* --- END: Security --- */
?>

<!-- This is used to display success messages after creating a new category. -->
<?php if(isset($_GET['message'])):?>
    <div style="margin-bottom:20px;min-height:40px;text-align:center;" class="bg-success col-md-3 col-md-offset-5">
        <?php echo $_GET['message']; ?>
    </div>
<?php endif;?>

    <div class="col-lg-12">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="display:inline-block">Categories</h3>
                </div>
    
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="staff">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysql_fetch_assoc($qrycategories)):?>
                                <tr>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td class="staff"><a href="category_edit.php?category_id=<?php echo $row['Id'];?>">Edit</a></td>
                                </tr>
                            <?php endwhile;?>
                            <?php if(mysql_num_rows($qrycategories) == 0): ?>
                                <tr>
                                    <td colspan="2">No categories found.</td>
                                    <td class="staff"></td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
    //Include standard footer.
    incFooter();
?>