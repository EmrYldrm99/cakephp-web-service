<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pair $pair
 * @var \Cake\Collection\CollectionInterface|string[] $players
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pairs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pairs form content">
            <?= $this->Form->create($pair) ?>
            <fieldset>
                <legend><?= __('Add Pair') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('player_id', ['options' => $players, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
