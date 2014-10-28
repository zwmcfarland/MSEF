<h1>Add School</h1>
<?php
    echo $this->Form->create('School');
    echo $this->Form->input('Name');
    echo $this->Form->input('City');
    echo $this->Form->input('State');
    echo $this->Form->input('Address1');
    echo $this->Form->input('Address2');
    echo $this->Form->input('Zip');
    echo $this->Form->end('Save School');
?>
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="Name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Name" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="City" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="City" placeholder="City">
    </div>
  </div>
  <div class="form-group">
    <label for="State" class="col-sm-2 control-label">State</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="State" placeholder="State">
    </div>
  </div>
  <div class="form-group">
    <label for="Address1" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Address1" placeholder="Address 1">
    </div>
  </div>
  <div class="form-group">
    <label for="Address2" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Address2" placeholder="Address 2">
    </div>
  </div>
  <div class="form-group">
    <label for="Zip" class="col-sm-2 control-label">Zip</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Zip" placeholder="Zip Code">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Create</button>
    </div>
  </div>
</form>
