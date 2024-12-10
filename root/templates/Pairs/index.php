<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pair> $pairs
 */
?>
<div class="pairs index content">
    <?= $this->Html->link(__('New Pair'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pairs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('player_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pairs as $pair): ?>
                <tr>
                    <td><?= $this->Number->format($pair->id) ?></td>
                    <td><?= h($pair->first_name) ?></td>
                    <td><?= $pair->hasValue('player') ? $this->Html->link($pair->player->name, ['controller' => 'Players', 'action' => 'view', $pair->player->id]) : '' ?></td>
                    <td><?= $pair->hasValue('user') ? $this->Html->link($pair->user->fname, ['controller' => 'Users', 'action' => 'view', $pair->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pair->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pair->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pair->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pair->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>