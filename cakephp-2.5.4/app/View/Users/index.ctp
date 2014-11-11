<h2>Users</h2>
<div class="row">
    <p>
        <?php echo $this->Html->link("Add User", array('action' => 'add')); ?>
    </p>
    <table class=" table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th style="text-align:center;">Action</th>
            </tr>
        </thead>
        <tbody>
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
                    <td><?php echo $user['User']['LastName']; ?></td>
                    <td align="center">
                        <?php
                            if(AuthComponent::User('Id')) {
                                echo $this->Form->postLink('Delete',
                                    array('action' => 'delete', $user['User']['Id']),
                                    array('confirm' => 'Are you sure?')
                                );
                            }
                        ?>
                        |
                        <?php
                            echo $this->Html->link('Edit',
                                array('action' => 'edit', $user['User']['Id'])
                            );
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>