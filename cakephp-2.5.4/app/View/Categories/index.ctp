<h1>Categories</h1>
<p><?php echo $this->Html->link("Add Category", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $forms array, printing out post info -->

<?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category['Category']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $category['Category']['Name'],
                    array('action' => 'view', $category['Category']['Id'])
                );
            ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $category['Category']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $category['Category']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>