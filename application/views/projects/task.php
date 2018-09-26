<div class="col-xs-9">
	
	<h1><small>Task Name: </small><?php echo $task_data->task_name ?></h1>

	<h4><small>Due Date: </small><?php echo $task_data->task_date ?></h4>

	<h3>Description</h3>
	<p><?php echo $task_data->task_body ?></p>

</div>

<div class="col-xs-3 pull-right">

	<ul class="list-group">
		<h4>Project Actions</h4>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/edit/<?php echo $task_data->task_id; ?>/<?php echo $task_data->tast_project_id; ?>">Edit Task</a></li>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/delete/<?php echo $task_data->task_id; ?>/<?php echo $task_data->tast_project_id; ?>">Delete Task</a></li>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/completed/<?php echo $task_data->task_id; ?>/<?php echo $task_data->tast_project_id; ?>/1">Mark as Completed</a></li>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/completed/<?php echo $task_data->task_id; ?>/<?php echo $task_data->tast_project_id; ?>/0">Mark as Not Completed</a></li>
	</ul>
	
</div>