<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Platoon $platoon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Platoon'), ['action' => 'edit', $platoon->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Platoon'), ['action' => 'delete', $platoon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $platoon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Platoons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Platoon'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="platoons view content">
            <h3><?= h($platoon->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($platoon->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($platoon->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Accounts') ?></h4>
                <?php if (!empty($platoon->accounts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Platoon Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($platoon->accounts as $account) : ?>
                        <tr>
                            <td><?= h($account->id) ?></td>
                            <td><?= h($account->name) ?></td>
                            <td><?= h($account->platoon_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Accounts', 'action' => 'view', $account->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Accounts', 'action' => 'edit', $account->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accounts', 'action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>