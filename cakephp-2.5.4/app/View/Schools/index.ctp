<h1>Schools</h1>
<p><?php echo $this->Html->link("Add School", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $users array, printing out post info -->

<?php foreach ($schools as $school): ?>
    <tr>
        <td><?php echo $school['School']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $school['School']['Name'],
                    array('action' => 'view', $school['School']['Id'])
                );
            ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $school['School']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $school['School']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>
