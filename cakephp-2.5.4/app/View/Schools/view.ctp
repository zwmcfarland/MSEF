<!-- File: /app/View/Posts/view.ctp -->

<h1>View School</h1>
<table>
    <tbody>
        <tr>
            <td>Name:</td>
            <td><?php echo $school['School']['Name']; ?></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><?php echo $school['School']['City']; ?></td>
        </tr>
        <tr>
            <td>State:</td>
            <td><?php echo $school['School']['State']; ?></td>
        </tr>
        <tr>
            <td>Address 1:</td>
            <td><?php echo $school['School']['Address1']; ?></td>
        </tr>
        <tr>
            <td>Address 2:</td>
            <td><?php echo $school['School']['Address2']; ?></td>
        </tr>
        <tr>
            <td>Zip:</td>
            <td><?php echo $school['School']['Zip']; ?></td>
        </tr>
    </tbody>
</table>