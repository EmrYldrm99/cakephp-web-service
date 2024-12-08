<?php foreach ($requests as $request): ?>
    <?= $this->Number->format($request->id) ?>
    <?= h($request->first_name) ?>
    <?= h($request->last_name) ?>
    <?= h($request->mail_address) ?>
    <?= h($request->phone_number) ?>
    <?= h($request->departure_date) ?>
    <?= h($request->departure_time) ?>
    <?= h($request->status) ?>
    <?= h($request->driver_id) ?>
    <?= h($request->created) ?>
    <button 
        hx-post="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'accept', $request->id]) ?>"
        hx-target="#bla"
        hx-swap="innerHTML"
        hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
    update
    </button>
    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
    <button 
        hx-post="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'remove', $request->id]) ?>"
        hx-target="#bla"
        hx-swap="innerHTML"
        hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
    delete
    </button>
    <br>
<?php endforeach; ?>