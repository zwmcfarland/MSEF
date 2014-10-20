<!-- File: /app/View/Awards/view.ctp -->

<h1>View Award</h1>
<table>
    <tbody>
        <tr>
            <td>Name:</td>
            <td><?php echo $award['Award']['Name']; ?></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><?php echo $award['Award']['Description']; ?></td>
        </tr>
        <tr>
            <td>Reward:</td>
            <td><?php echo $award['Award']['Reward']; ?></td>
        </tr>
    </tbody>
</table>