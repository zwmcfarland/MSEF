<?php
	echo $this->Html->script('moment.min');
	echo $this->Html->script('fullcalendar');
	echo $this->HTML->css('fullcalendar');
	echo $this->HTML->css('fullcalendar.print');
	echo $this->fetch('script');
?>
<h1>Events</h1>
<!-- TODO: only show this add if they are admin. -->
<p><?php echo $this->Html->link("Add Event", array('action' => 'add')); ?></p>

<script>
$(document).ready(function() {
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		defaultDate: '<?php echo date('Y-m-d')?>',
		editable: false,
		eventLimit: true, // allow "more" link when too many events
		events: [
			<?php foreach ($events as $event): ?>
				{
					title: '<?php echo $event['Event']['Name']; ?>',
					start: '<?php echo $event['Event']['StartDate']; ?>',
					end  : '<?php echo $event['Event']['EndDate']; ?>',
					url  : '<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "/view/" . $event['Event']['Id']; ?>'
				}
			<?php endforeach;?>
		]
	});
	
});
</script>

<style>
	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
</style>
<div class="row">
	<div id="calendar"></div>
</div>