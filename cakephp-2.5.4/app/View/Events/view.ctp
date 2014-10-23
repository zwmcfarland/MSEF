<!-- File: /app/View/Posts/view.ctp -->

<h1>View User</h1>
<table>
    <tbody>
        <tr>
            <td>Description:</td>
            <td><?php echo $event['Event']['Description']; ?></td>
        </tr>
        <tr>
        	<td>Start Date:</td>
        	<td><?php echo $event['Event']['StartDate']; ?></td>
        </tr>
        <tr>
        	<td>End Date:</td>
        	<td><?php echo $event['Event']['EndDate']; ?></td>
        </tr>
    </tbody>
</table>