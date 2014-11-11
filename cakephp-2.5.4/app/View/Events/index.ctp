<?php
	echo $this->Html->script('moment.min');
	echo $this->Html->script('fullcalendar');
	echo $this->HTML->css('fullcalendar');
	echo $this->HTML->css('fullcalendar.print');
	echo $this->fetch('script');
?>
<h2>Events</h2>
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
		 	<?php $i = 0; ?>
		 	<?php $len = count($events); ?>
			<?php foreach ($events as $event): ?>
				{
					title: '<?php echo $event['Event']['Name']; ?>',
					start: '<?php echo $event['Event']['StartDate']; ?>',
					end  : '<?php echo $event['Event']['EndDate']; ?>',
					url  : '<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "view/" . $event['Event']['Id']; ?>'
				}
				<?php if($i != $len - 1) { echo ','; } ?>
				<?php $i++;?>
			<?php endforeach;?>
		]
	});
	
});
</script>

<style>
	body {
		margin: 0px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
	#calendar {
		width: 95%;
		margin   : 0 auto;
	}
</style>
<div class="row">
	<div id="calendar"></div>
</div>
