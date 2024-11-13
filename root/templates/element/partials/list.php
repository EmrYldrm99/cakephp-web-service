// src/Template/Players/list.php
<?php foreach ($players as $player): ?>
    <div class="player">
        <h3><?= h($player->name) ?></h3>
        <p><?= h($player->position) ?></p>
    </div>
<?php endforeach; ?>