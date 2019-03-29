<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <div class="side-nav">
        <h6 class="heading"><?= __('Profile') ?></h6>
        <a href="#"><img id="profileImage" src="https://cdn.umnbootcamp.com/wp-content/uploads/sites/60/2018/03/placeholder-person.png" style="width:150px; dispay:block;"></a>
		<input id="imageUpload" type="file" 
       name="profile_photo" placeholder="Photo" required="" capture>
	</div>
	<input type='hidden' id="CRSF" value="<?php echo $this->request->getParam('_csrfToken'); ?>">
	
</nav>
<br>
<div class ="index large-8 medium-8 columns">
  <div class="panel">
	<?php echo $this->Form->create(null,['action'=>'JsonResult','id'=>'addNewFeeds']);?>
	<?php echo $this->Form->input("Feeds"); ?>
	<?php echo $this->Form->submit('Post', array('class' => 'button')); ?>
	<?php echo $this->Form->end(); ?>
 </div>
</div>   
<div id="newfeeds" class ="index large-8 medium-8 columns">
Loading...
</div>