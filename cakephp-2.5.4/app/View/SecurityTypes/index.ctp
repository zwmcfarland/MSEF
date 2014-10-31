<h1>Security Types</h1>
<p><?php echo $this->Html->link("Add Security Type", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $securityTypes array, printing out post info -->

<?php foreach ($securityTypes as $securityType): ?>
    <tr>
        <td><?php echo $securityType['SecurityType']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $securityType['SecurityType']['Name'],
                    array('action' => 'view', $securityType['SecurityType']['Id'])
                );
            ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $securityType['SecurityType']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $securityType['SecurityType']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>