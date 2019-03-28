<?php echo $this->Form->create(null, ['type' => 'file']);?>
<?php echo $this->Form->input('image',['type'=>'file']); ?>
<?php echo $this->Form->submit('upload'); ?>
<?php echo $this->Form->end();?>