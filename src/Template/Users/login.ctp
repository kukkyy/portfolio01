<h1>
  ログイン
  <?= $this->Html->link('Sign up', ['action'=>'add']); ?>
</h1>
  <?= $this->Form->create(); ?>
  <?= $this->Form->input('username'); ?>
  <?= $this->Form->input('password'); ?>
  <?= $this->Form->submit('送信'); ?>
  <?= $this->Form->end(); ?>
