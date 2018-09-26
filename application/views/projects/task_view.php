<h1>Project Tasks</h1>
<?php if ($tasks != FALSE) { ?>
<table class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>Task Name</th>
				<th>Task Discription</th>
				<th>Due Date</th>
				<th>Related Project</th>
				<th>Status</th>
				<th>View</th>
				<th>Remove</th>
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
					<td>
						<?php
							if ($project->status == 0) {
							 	echo "Not Completed";
							} else {
								echo "Completed";
							}
						?>
					</td>
					<td><a class="btn btn-info" href="<?php echo base_url(); ?>tasks/view/<?php echo $project->task_id ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
					<td><a class="btn btn-danger" href="<?php echo base_url(); ?>tasks/delete/<?php echo $project->task_id; ?>/<?php echo $project->tast_project_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
			<?php } } ?>
			
	</tbody>
</table>
<?php } else {
	echo '<h4 class="alert alert-info text-center">No Tasks available</h4>';
} ?>