<p class="bg-success">

<?php echo $this->session->userdata('login_success'); $this->session->unset_userdata('login_success'); ?>

<?php echo $this->session->userdata('reg_success'); $this->session->unset_userdata('reg_success'); ?>

</p>

<p class="bg-danger">

<?php echo $this->session->userdata('login_unsuccess'); $this->session->unset_userdata('login_unsuccess'); ?>

<?php echo $this->session->userdata('no_access'); $this->session->unset_userdata('no_access'); ?>

</p>

<?php if ($this->session->userdata('user_id') != '') { ?>

<h1>Projects</h1>
	<?php if ($projects != FALSE) { ?>
<table class="table table-hover table-striped table-condensed">
	<thead>
		<tr>
			<th>Project Name</th>
			<th>Project Discription</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($projects as $project) { ?>
			<tr>
				<td><?php echo $project->project_name ?></td>
				<td><?php echo $project->project_body ?></td>
				<td><a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id ?>">View</a></td>
			</tr>
		<?php } ?>
		
	</tbody>
</table>
<?php } else {
	echo '<h4 class="alert alert-info text-center">No Projects available</h4>';
} ?>



<h2>Project Tasks</h2>
<?php if ($tasks != FALSE) { ?>
	<table class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>Task Name</th>
				<th>Task Discription</th>
				<th>Due Date</th>
				<th>Related Project</th>
				<th>View</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tasks as $project) { ?>
				<?php if ($project->task_id != '') { ?>
				<tr>
					<td><?php echo $project->task_name; ?></td>
					<td><?php echo $project->task_body; ?></td>
					<td><?php echo $project->task_date; ?></td>
					<td><?php echo $project->project_name; ?></td>
					<td><a class="btn btn-info" href="<?php echo base_url(); ?>tasks/view/<?php echo $project->task_id ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
				</tr>
			<?php } } ?>
			
	</tbody>
</table>
<?php } else {
	echo '<h4 class="alert alert-info text-center">No Tasks available</h4>';
} ?>
<?php } else {  ?>

<div class="jumbotron">
	<h2 class="text-center" style="margin-bottom: 15px;">Welcome to <mark>MY TASK</mark></h2>
	<h4><mark>My Task</mark> is web base application which can automated your projects.</h4>
	<h4>And also <mark>My Task</mark> can manage your tasks. Now on you don’t have to worry about your projects.</h4>
	<h4><mark>My Task</mark> will take care of them. All you have to do is <a href="<?php echo base_url(); ?>users/register" class="alert alert-warning">just register</a> here and enjoy <mark>My Task</mark>.</h4>
</div>
<?php } ?>
