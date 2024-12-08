<h1>Infos</h1>
    <?= h($request->first_name) ?>
    <?= h($request->last_name) ?>
    <?= h($request->mail_address) ?>
    <?= h($request->phone_number) ?>
    <?= h($request->departure_date) ?>
    <?= h($request->departure_time) ?>
    <?= h($request->status) ?>
    <?= h($request->created) ?>

    <!-- Kommentar-Formular -->
    <?= $this->Form->create(null, [
        'url' => ['action' => 'info', $request->uuid], // URL für das Formular, das den Kommentar speichert
        'type' => 'post', // Normaler POST-Request
    ]) ?>
    
    <?= $this->Form->control('client_comment', [
        'type' => 'textarea', 
        'placeholder' => 'Schreibe hier deinen Kommentar...', 
        'aria-label' => 'Kommentar',
        'rows' => 4,
        'value' => $request->client_comment
    ]) ?>
    
    <?= $this->Form->button('Kommentar speichern') ?>
    
    <?= $this->Form->end() ?>