<br>
<div class ="index large-4 medium-4 large-offset-4 columns">
  <div class="panel">
    <?= $this->Form->create(); ?>
        <?= $this->Form->input('username'); ?>
        <?= $this->Form->input('password', array('type'=>'password')); ?>
        <?= $this->Form->submit('login', array('class' => 'button')); ?>
    <?= $this->Form->end(); ?>
    <?php echo $this->html->link('Register', ['controller'=> 'Users', 'action' => 'register']); ?>&nbsp;&nbsp;|&nbsp;
    <?php echo $this->html->link('Forgot Password', ['controller'=> 'Users', 'action' => 'forgotpassword']); ?>&nbsp;&nbsp;|&nbsp;
	<?php echo $this->Html->link(
	'Facebook',
	['controller' => 'Users', 'action' => 'login', '?' => ['provider' => 'Facebook']]
	); ?>
    </div>
	
</div>