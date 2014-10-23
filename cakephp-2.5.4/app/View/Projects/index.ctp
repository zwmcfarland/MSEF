<h1>Projects</h1>
<p><?php echo $this->Html->link("Add Project", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $projects array, printing out post info -->

<?php foreach ($projects as $project): ?>
    <tr>
        <td><?php echo $project['Project']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $project['Project']['Name'],
                    array('action' => 'view', $project['Project']['Id'])
                );
            ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $project['Project']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $project['Project']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>