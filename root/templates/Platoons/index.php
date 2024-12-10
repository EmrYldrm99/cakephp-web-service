<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Platoon> $platoons
 */
?>
<div class="platoons index content">
    <?= $this->Html->link(__('New Platoon'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Platoons') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($platoons as $platoon): ?>
                <tr>
                    <td><?= $this->Number->format($platoon->id) ?></td>
                    <td><?= h($platoon->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $platoon->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $platoon->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $platoon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $platoon->id)]) ?>
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