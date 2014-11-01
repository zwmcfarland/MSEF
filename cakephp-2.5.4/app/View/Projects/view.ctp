<!-- File: /app/View/Projects/view.ctp -->

<h2>View Project</h2>
<div class="row">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Name:</td>
                <td><?php echo $project['Project']['Name']; ?></td>
            </tr>
            <tr>
                <td>StatusId:</td>
                <td title="<?php echo $project['Status']['Description']; ?>"><?php echo $project['Status']['Name']; ?></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><?php echo $project['Project']['Description']; ?></td>
            </tr>
            <tr>
                <td>Abstract:</td>
                <td><?php echo $project['Project']['Abstract']; ?></td>
            </tr>
            <tr>
                <td>Electrical:</td>
                <td><?php echo $project['Project']['Electrical']; ?></td>
            </tr>
        </tbody>
    </table>
</div>