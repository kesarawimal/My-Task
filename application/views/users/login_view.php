<?php if($this->session->userdata('logged_in')): ?>
<div class="well text-center">
<?php if($this->session->userdata('username')): ?>
<h2><small>Hi </small><?php echo ucfirst($this->session->userdata('username')); ?></h2>
<?php endif; ?>
<p class="well">You are warmly welcome to the My Task Web Application </p>

<?php echo form_open('users/logout'); ?>

<div class="form-group">	
	
<?php $data = array('class' => 'btn btn-primary' , 'name' => 'submit', 'value' => 'LogOut'); ?>

<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>
</div>
<?php else: ?>
<div class="well">
<h2>LogIn Form</h2>

<?php $attrib = array('id' => 'login_form' , 'class' => 'form_horizontal'); ?>

<?php if($this->session->flashdata('errors')): ?>

<?php echo $this->session->flashdata('errors'); ?>

<?php endif; ?>

<?php echo form_open('users/login',$attrib); ?>

<div class="form-group">	
	
<?php echo form_label('Username'); ?>

<?php $data = array('class' => 'form-control' , 'name' => 'username', 'placeholder' => 'Enter Username'); ?>

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
	
<?php $data = array('class' => 'btn btn-primary' , 'name' => 'submit', 'value' => 'LogIn'); ?>

<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>
</div>
<?php endif; ?>