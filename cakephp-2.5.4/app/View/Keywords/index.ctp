<h1>Keyword</h1>
<p><?php echo $this->Html->link("Add Keyword", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $keywords array, printing out post info -->

<?php foreach ($keywords as $keyword): ?>
    <tr>
        <td><?php echo $keyword['Keyword']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $keyword['Keyword']['Keyword'],
                    array('action' => 'view', $keyword['Keyword']['Id'])
                );
            ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $keyword['Keyword']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $keyword['Keyword']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>