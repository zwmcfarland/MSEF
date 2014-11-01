<?php
	class Project extends AppModel {
		var $name = 'Project';
		public $belongsTo  = 'Status';
	}
?>