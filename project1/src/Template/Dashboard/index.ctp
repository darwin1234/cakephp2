<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('POST'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('ADD USER'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
      <?= $this->Form->create(null, array('id'=>'postwall','method'=> 'POST','action'=> 'posttowall')); ?>
      <?= $this->Form->textarea('postwall', array('class' => 'postwall')); ?>
      <?= $this->Form->submit("POST"); ?>
  <?= $this->Form->end(); ?>


  <div id="wallpost"></div>
</div>
