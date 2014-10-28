<style>
	td.data {
		text-align: right;
	}
</style>
<h1>View School</h1>
<table class="table-striped" width="100%">
    <tbody>
        <tr>
            <td><label>Name:</label></td>
            <td class="data"><?php echo $school['School']['Name']; ?></td>
        </tr>
        <tr>
            <td><label>City:</label></td>
            <td class="data"><?php echo $school['School']['City']; ?></td>
        </tr>
        <tr>
            <td><label>State:</label></td>
            <td class="data"><?php echo $school['School']['State']; ?></td>
        </tr>
        <tr>
            <td><label>Address 1:</label></td>
            <td class="data"><?php echo $school['School']['Address1']; ?></td>
        </tr>
        <tr>
            <td><label>Address 2:</label></td>
            <td class="data"><?php echo $school['School']['Address2']; ?></td>
        </tr>
        <tr>
            <td><label>Zip:</label></td>
            <td class="data"><?php echo $school['School']['Zip']; ?></td>
        </tr>
    </tbody>
</table>