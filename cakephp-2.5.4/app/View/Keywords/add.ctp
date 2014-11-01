<h2>Add Keyword</h2>
<div class="row">
    <?php echo $this->Form->create('Keyword'); ?>
        <fieldset>
            <div class="form-group">
                <label>Keyword</label>
                <?php echo $this->Form->input('Keyword', array('label' => '', 'class' => 'form-control', 'type' => 'text')); ?>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-warning" onclick="window.location='./';">Cancel</button>
                <button tpye="submit" class="btn btn-primary">Save Keyword</button>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>