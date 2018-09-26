<h2>Edit Task</h2>

<?php $attrib = array('class' => 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('tasks/edit/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) ,$attrib); ?>

<div class="form-group">	
	
<?php echo form_label('Task Name'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'task_name', 'placeholder' => 'Enter Task Name', 'value' => $task_data->task_name); ?>

<?php echo form_input($data); ?>
</div>

<div class="form-group">	
	
<?php echo form_label('Task Description'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'task_body', 'placeholder' => 'Enter Task Description', 'rows' => '10', 'cols' => '30', 'value' => $task_data->task_body); ?>

<?php echo form_textarea($data); ?>
</div>

<div class="form-group">	
	
<?php echo form_label('Due Date'); ?>

<?php $data = array('class' => 'form-control', 'type' => 'date' , 'name' => 'task_date', 'placeholder' => 'DD/MM/YYYY', 'value' => $task_data->task_date); ?>

<?php echo form_input($data); ?>
</div>


<div class="form-group">	
	
<?php $data = array('class' => 'btn btn-primary' , 'name' => 'submit', 'value' => 'Update'); ?>

<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>