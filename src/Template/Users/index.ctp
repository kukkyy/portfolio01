<h1>User一覧</h1>
  <ul>
  <?php foreach ($users as $user) : ?>
    <li>
      <?= h($user->username); ?><br />
      <?= h($user->password); ?><br />
      <?= h($user->gender); ?><br />
      <?= h($user->birthday); ?><br />
      @@@@@@@@@@@@
    </li>
  <?php endforeach; ?>
  </ul>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->first('|<<' . '最初へ') ?>
      <?= $this->Paginator->prev('<<' . '前へ') ?>
      <?= $this->Paginator->next('次へ' . '>>') ?>
      <?= $this->Paginator->last('最後へ' . '>>|') ?>
    </ul>
  </div>
