<?php
  $this->assign('title', 'Blog New')
?>
<h1>
  <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
  Add new
</h1>

  <?= $this->Form->create($post); ?>
  <?= $this->Form->input('title'); ?>
  <?= $this->Form->input('body'); ?>
  <?= $this->Form->button('Add'); ?>
  <?= $this->Form->end(); ?>
