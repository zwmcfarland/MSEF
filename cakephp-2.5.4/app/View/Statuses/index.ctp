<h2>Status</h2>
<p><?php echo $this->Html->link("Add Status", array('action' => 'add')); ?></p>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Status</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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
                    <td><?php echo $status['Status']['Description']; ?></td>
                    <td>
                        <?php
                            echo $this->Form->postLink('Delete',
                                array('action' => 'delete', $status['Status']['Id']),
                                array('confirm' => 'Are you sure?')
                            );
                        ?>
                        |
                        <?php
                            echo $this->Html->link('Edit',
                                array('action' => 'edit', $status['Status']['Id'])
                            );
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>