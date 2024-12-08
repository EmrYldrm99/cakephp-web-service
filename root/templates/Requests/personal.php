<h1>Personal Formular</h1>
<?= $this->Form->create($request); ?>
      <?= $this->Form->control('first_name', [
          'placeholder' => 'First Name',
          'label' => 'First name',
          'value' => ""
      ]) ?>
      <?= $this->Form->control('last_name', [
          'placeholder' => 'Last Name',
          'label' => 'Last Name',
          'value' => ""
      ]) ?>
      <?= $this->Form->control('departure_date', [
          'placeholder' => 'Departure Date',
          'label' => 'Departure Date',
          'value' => ""
      ]) ?>
      <?= $this->Form->control('departure_time', [
          'placeholder' => 'Departure Time',
          'label' => 'Departure Time',
          'value' => ""
      ]) ?>
<?= $this->Form->end(); ?>

<!-- Submit Button with HTMX -->
<button 
    hx-post="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'personal']) ?>"
    hx-include="form"
    hx-target="#placeHolder"
    hx-swap="innerHTML"
    hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
  Submit
</button>