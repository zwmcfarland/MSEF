<h2>Awards</h2>
<p><?php echo $this->Html->link("Add Award", array('action' => 'add')); ?></p>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($awards as $award): ?>
                <tr>
                    <td><?php echo $award['Award']['Id']; ?></td>
                    <td>
                        <?php
                            echo $this->Html->link(
                                $award['Award']['Name'],
                                array('action' => 'view', $award['Award']['Id'])
                            );
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->postLink('Delete',
                                array('action' => 'delete', $award['Award']['Id']),
                                array('confirm' => 'Are you sure?')
                            );
                        ?>
                        |
                        <?php
                            echo $this->Html->link('Edit',
                                array('action' => 'edit', $award['Award']['Id'])
                            );
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tbody>
    </table>
</div>