<?php
  $this->assign('title', 'Blog Ditail')
?>
<h1>
  <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
  <?= h($post->title); ?>
</h1>

  <p><?= h($post->body); ?></p>

<?php if (count($post->comments)) : ?>
<h2>comment<span>(<?= count($post->comments); ?>)</span></h2>

<ul>
<?php foreach ($post->comments as $comment) : ?>
  <li>
  <?= nl2br(h($comment->body)); ?>
  <?= $this->Form->postLink('[×]', ['controller'=>'Comments', 'action'=>'delete', $post->id], ['confirm'=>'Are you sure?']); ?>   
  </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>


<h2>New Comment</h2>
<?= $this->Form->create(null, [
  'url'=>['controller'=>'Comments', 'action'=>'add']
]); ?>
<?= $this->Form->hidden('post_id', ['value'=>$post->id]); ?>
<?= $this->Form->input('body'); ?>
<?= $this->Form->button('Add'); ?>
<?= $this->Form->end(); ?>
