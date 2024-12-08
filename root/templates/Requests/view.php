<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(
                            'Akzeptieren', 
                            ['action' => 'accept', $request->id], 
                            ['confirm' => 'Bist du sicher, dass du diesen Request akzeptieren möchtest?']
                        ); ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requests view content">
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($request->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($request->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail Address') ?></th>
                    <td><?= h($request->mail_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($request->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($request->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Date') ?></th>
                    <td><?= h($request->departure_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Time') ?></th>
                    <td><?= h($request->departure_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($request->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Comment') ?></th>
                    <td><?= h($request->client_comment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($request->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?= $this->Form->create(null, [
        'url' => ['action' => 'view', $request->id], // URL für das Formular, das den Kommentar speichert
        'type' => 'post', // Normaler POST-Request
    ]) ?>
    <fieldset>
        <legend><?= __('Administration Input') ?></legend>
        <?php
            echo $this->Form->control('driver_id', ['label' => 'Driver', 'options' => $drivers, 'default' => $request->driver_id]);
        ?>
    </fieldset>
    <?= $this->Form->control('administration_comment', [
        'type' => 'textarea', 
        'placeholder' => 'Schreibe hier deinen Kommentar...', 
        'aria-label' => 'Kommentar',
        'rows' => 4,
        'value' => $request->administration_comment
    ]) ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>