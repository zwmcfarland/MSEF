<h1>Events</h1>
<p><?php echo $this->Html->link("Add Event", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Location</th>
    </tr>

<!-- Here's where we loop through our $users array, printing out post info -->

<?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $event['Event']['Description'],
                    array('action' => 'view', $event['Event']['Id'])
                );
            ?>
        </td>
        <td>
            <?php echo $event['Event']['StartDate']; ?>
        </td>
        <td>
            <?php echo $event['Event']['EndDate']; ?>
        </td>
        <td>
            <?php echo $event['Event']['Location']; ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $event['Event']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $event['Event']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>