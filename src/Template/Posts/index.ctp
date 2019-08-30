<?php
  $this->assign('title', 'Blog Posts')
?>
<h1>
  <?= $this->Html->link('Add new', ['action'=>'add']); ?>

  Posts
</h1>

<ul>
  <?php foreach ($posts as $post) : ?>
  <li>
    <?= $this->Html->link($post->title, ['action'=>'view', $post->id]); ?>
    <?= $this->Html->link('[Edit]', ['action'=>'edit', $post->id]); ?>
    <?= $this->Form->postLink('[×]', ['action'=>'delete', $post->id], ['confirm'=>'Are you sure?']); ?>   
  </li>
  <?php endforeach; ?>
</ul>
