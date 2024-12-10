<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pair $pair
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pair'), ['action' => 'edit', $pair->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pair'), ['action' => 'delete', $pair->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pair->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pairs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pair'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pairs view content">
            <h3><?= h($pair->first_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($pair->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Player') ?></th>
                    <td><?= $pair->hasValue('player') ? $this->Html->link($pair->player->name, ['controller' => 'Players', 'action' => 'view', $pair->player->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $pair->hasValue('user') ? $this->Html->link($pair->user->fname, ['controller' => 'Users', 'action' => 'view', $pair->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pair->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>