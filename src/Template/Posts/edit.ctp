<?php
  $this->assign('title', 'Blog Edit')
?>
<h1>
  <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
  <?= h($post->title); ?>
</h1>

  <?= $this->Form->create($post); ?>
  <?= $this->Form->input('title'); ?>
  <?= $this->Form->input('body'); ?>
  <?= $this->Form->button('Edit'); ?>
  <?= $this->Form->end(); ?>
