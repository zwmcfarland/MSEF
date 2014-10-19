<h1>Users</h1>
<p><?php echo $this->Html->link("Add User", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $users array, printing out post info -->

<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $user['User']['FirstName'],
                    array('action' => 'view', $user['User']['Id'])
                );
            ?>
        </td>
        <td>
            <?php echo $user['User']['LastName']; ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $user['User']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>