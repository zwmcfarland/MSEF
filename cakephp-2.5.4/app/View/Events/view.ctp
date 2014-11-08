<h2>View Event</h2>
<div class="row">
	<table class="table table-striped">
	    <tbody>
	    	<tr>
	    		<td>Name:</td>
	    		<td><?php echo $event['Event']['Name']; ?></td>
	    	</tr>
	    	<tr>
	    		<td>Location:</td>
	    		<td><?php echo $event['Event']['Location']; ?></td>
	    	</tr>
	        <tr>
	            <td>Description:</td>
	            <td><?php echo $event['Event']['Description']; ?></td>
	        </tr>
	        <tr>
	        	<td>Start Date:</td>
	        	<td><?php echo $event['Event']['StartDate']; ?></td>
	        </tr>
	        <tr>
	        	<td>End Date:</td>
	        	<td><?php echo $event['Event']['EndDate']; ?></td>
	        </tr>
	        <tr>
	        	<td colspan="2" align="center">
	        		<?php echo $this->Html->link('Edit', array('action' => 'edit', $event['Event']['Id'])); ?>
	        	</td>
	        </tr>
	    </tbody>
	</table>
</div>