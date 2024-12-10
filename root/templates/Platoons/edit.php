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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $platoon->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $platoon->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Platoons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="platoons form content">
            <?= $this->Form->create($platoon) ?>
            <fieldset>
                <legend><?= __('Edit Platoon') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
