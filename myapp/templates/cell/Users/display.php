<?php foreach ($users as $user): ?>
<li><?= h($user->id) . ' ' . h($user->name) . ' ' . h($user->surname) ?></li>
<?php endforeach; ?>