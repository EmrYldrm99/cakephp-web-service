<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contact->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contact'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contact form content">
            <?= $this->Form->create($contact) ?>
            <fieldset>
                <legend><?= __('Edit Contact') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('mail');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('city');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
