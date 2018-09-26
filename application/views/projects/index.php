<h1>Projects</h1>
<p class="bg alert-success">
	<?php echo $this->session->userdata('project_create'); $this->session->unset_userdata('project_create'); ?>
	<?php echo $this->session->userdata('project_update'); $this->session->unset_userdata('project_update'); ?>
	<?php echo $this->session->userdata('project_delete'); $this->session->unset_userdata('project_delete'); ?>
</p>
<a class="btn btn-primary pull-right" style="margin-bottom: 15px" href="<?php echo base_url(); ?>projects/create">Create Project</a>
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
				<td><a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id ?>"><?php echo $project->project_name ?></a></td>
				<td><?php echo $project->project_body ?></td>
				<td><a class="btn btn-danger" href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php } ?>
		
	</tbody>
</table>
<?php } else {
	echo '<div class="col-sm-9"><h4 class="alert alert-info text-center">No Projects available</h4></div>';
} ?>
