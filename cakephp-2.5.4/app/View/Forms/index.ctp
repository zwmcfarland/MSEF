<h1>Forms</h1>
<p><?php echo $this->Html->link("Add Form", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

<!-- Here's where we loop through our $forms array, printing out post info -->

<?php foreach ($forms as $form): ?>
    <tr>
        <td><?php echo $form['Form']['Id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $form['Form']['Name'],
                    array('action' => 'view', $form['Form']['Id'])
                );
            ?>
        </td>
        <td>
             <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $form['Form']['Id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $form['Form']['Id'])
                );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>