<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contact'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contact'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contact view content">
            <h3><?= h($contact->mail) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $contact->hasValue('user') ? $this->Html->link($contact->user->fname, ['controller' => 'Users', 'action' => 'view', $contact->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail') ?></th>
                    <td><?= h($contact->mail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($contact->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($contact->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contact->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>