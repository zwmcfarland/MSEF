<!-- File: /app/View/Categories/view.ctp -->

<h1>View Category</h1>
<table>
    <tbody>
        <tr>
            <td>Name:</td>
            <td><?php echo $category['Category']['Name']; ?></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><?php echo $category['Category']['Description']; ?></td>
        </tr>
        <tr>
            <td>Max Capacity:</td>
            <td><?php echo $category['Category']['MaxCapacity']; ?></td>
        </tr>
    </tbody>
</table>