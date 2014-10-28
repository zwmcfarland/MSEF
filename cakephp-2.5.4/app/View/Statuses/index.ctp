<h1>Status</h1>
<p><?php echo $this->Html->link("Add Status", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Status</th>
        <th>Description</th>
    </tr>

<!-- Here's where we loop through our $status array, printing out post info -->

<?php foreach ($statuses as $status): ?>
    <tr>
        <td><?php echo $status['Status']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $status['Status']['Name'],
                    array('action' => 'view', $status['Status']['Id'])
                );
            ?>
        </td>
        <td>
            <?php echo $status['Status']['Description']; ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $status['Status']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $status['Status']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>