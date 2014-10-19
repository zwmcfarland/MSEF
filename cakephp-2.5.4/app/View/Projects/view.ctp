<!-- File: /app/View/Projects/view.ctp -->

<h1>View Project</h1>
<table>
    <tbody>
        <tr>
            <td>Name:</td>
            <td><?php echo $project['Project']['Name']; ?></td>
        </tr>
        <tr>
            <td>StatusId:</td>
            <td><?php echo $project['Project']['StatusId']; ?></td>
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