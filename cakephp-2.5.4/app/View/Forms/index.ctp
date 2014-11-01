<h2>Forms</h2>
<p><?php echo $this->Html->link("Add Form", array('action' => 'add')); ?></p>
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
                            echo $this->Form->postLink('Delete',
                                array('action' => 'delete', $form['Form']['Id']),
                                array('confirm' => 'Are you sure?')
                            );
                        ?>
                        |
                        <?php
                            echo $this->Html->link('Edit',
                                array('action' => 'edit', $form['Form']['Id'])
                            );
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>