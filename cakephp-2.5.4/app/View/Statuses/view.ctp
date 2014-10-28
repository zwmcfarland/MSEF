<!-- File: /app/View/Status/view.ctp -->

<h1>View Status</h1>
<table>
    <tbody>
        <tr>
            <td>Name:</td>
            <td><?php echo $status['Status']['Name']; ?></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><?php echo $status['Status']['Description']; ?></td>
        </tr>
    </tbody>
</table>