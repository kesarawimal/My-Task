<div class="well">
<h2>Register Form</h2>

<?php $attrib = array('id' => 'register_form' , 'class' => 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('users/register',$attrib); ?>

<div class="form-group">	
	
<?php echo form_label('First Name'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'firstname', 'placeholder' => 'Enter First Name', 'value' => set_value('firstname')); ?>

<?php echo form_input($data); ?>
</div>

<div class="form-group">	
	
<?php echo form_label('Last Name'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'lastname', 'placeholder' => 'Enter Last Name', 'value' => set_value('lastname')); ?>

<?php echo form_input($data); ?>
</div>

<div class="form-group">	
	
<?php echo form_label('Email'); ?>

<?php $data = array('class' => 'form-control' , 'type' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email', 'value' => set_value('email')); ?>

<?php echo form_input($data); ?>
</div>

<div class="form-group">	
	
<?php echo form_label('Username'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'username', 'placeholder' => 'Enter Username', 'value' => set_value('username')); ?>

<?php echo form_input($data); ?>
</div>


<div class="form-group">	
	
<?php echo form_label('Password'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'password', 'placeholder' => 'Enter Password'); ?>

<?php echo form_password($data); ?>
</div>


<div class="form-group">	
	
<?php echo form_label('Comfirm Password'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'comfirm_password', 'placeholder' => 'Comfirm Password'); ?>

<?php echo form_password($data); ?>
</div>


<div class="form-group">	
	
<?php $data = array('class' => 'btn btn-primary' , 'name' => 'submit', 'value' => 'Register'); ?>

<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>
</div>
