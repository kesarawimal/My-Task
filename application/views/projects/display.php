<p class="bg alert-success">
	<?php echo $this->session->userdata('task_create'); $this->session->unset_userdata('task_create'); ?>
	<?php echo $this->session->userdata('task_update'); $this->session->unset_userdata('task_update'); ?>
	<?php echo $this->session->userdata('task_delete'); $this->session->unset_userdata('task_delete'); ?>
	<?php echo $this->session->userdata('task_complete'); $this->session->unset_userdata('task_complete'); ?>
	<?php echo $this->session->userdata('task_not_complete'); $this->session->unset_userdata('task_not_complete'); ?>
</p>
<div class="col-xs-8">
	
	<h1><small>Project Name: </small><?php echo $project_data->project_name ?></h1>

	<h4><small>Date Created: </small><?php echo $project_data->project_date ?></h4>

	<h3>Description</h3>
	<p><?php echo $project_data->project_body ?></p>

</div>

<div class="col-xs-4 pull-right">

	<ul class="list-group">
		<h4>Project Actions</h4>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create/<?php echo $project_data->id ?>">Create Task</a></li>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project_data->id ?>">Edit Project</a></li>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project_data->id ?>">Delete Project</a></li>
	</ul>
	
</div>

<div class="col-xs-12">
	<h2>Active Tasks</h2>
<?php if ($tasks_data != FALSE) { ?>

	<table class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>Task Name</th>
				<th>Task Discription</th>
				<th>Due Date</th>
				<th>View</th>
				<th>Mark as Completed</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tasks_data as $project) { ?>
				<?php if ($project->status == 0) { ?>
				<tr>
					<td><?php echo $project->task_name ?></td>
					<td><?php echo $project->task_body ?></td>
					<td><?php echo $project->task_date ?></td>
					<td><a class="btn btn-info" href="<?php echo base_url(); ?>tasks/view/<?php echo $project->task_id ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
					<td><a class="btn btn-success" href="<?php echo base_url(); ?>tasks/completed/<?php echo $project->task_id; ?>/<?php echo $project->tast_project_id; ?>/1"><span class="glyphicon glyphicon-ok"></span></a></td>
					<td><a class="btn btn-danger" href="<?php echo base_url(); ?>tasks/delete/<?php echo $project->task_id; ?>/<?php echo $project->tast_project_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
			<?php } } ?>
			
	</tbody>
</table>
	
<?php } else {
	echo '<h4 class="alert alert-info text-center">No Active Tasks available</h4>';
} ?>
</div>

<div class="col-xs-12">
	<h2>Completed Tasks</h2>

<?php if ($tasks_data != FALSE) { ?>
	<table class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>Task Name</th>
				<th>Task Discription</th>
				<th>Due Date</th>
				<th>View</th>
				<th>Mark as Not Completed</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tasks_data as $project) { ?>
				<?php if ($project->status == 1) { ?>
				<tr>
					<td><?php echo $project->task_name ?></td>
					<td><?php echo $project->task_body ?></td>
					<td><?php echo $project->task_date ?></td>
					<td><a class="btn btn-info" href="<?php echo base_url(); ?>tasks/view/<?php echo $project->task_id ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
					<td><a class="btn btn-warning" href="<?php echo base_url(); ?>tasks/completed/<?php echo $project->task_id; ?>/<?php echo $project->tast_project_id; ?>/0"><span class="glyphicon glyphicon-ok"></span></a></td>
					<td><a class="btn btn-danger" href="<?php echo base_url(); ?>tasks/delete/<?php echo $project->task_id; ?>/<?php echo $project->tast_project_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
			<?php } } ?>
			
	</tbody>
</table>
<?php } else {
	echo '<h4 class="alert alert-info text-center">No Completed Tasks available</h4>';
} ?>
</div>