<?= $this->Form->create($user); ?>
      <?= $this->Form->control('fname', [
          'placeholder' => 'First Name',
          'label' => 'First name',
          'value' => $fname
      ]) ?>
      <?= $this->Form->control('lname', [
          'placeholder' => 'Last Name',
          'label' => 'Last Name',
          'value' => $lname
      ]) ?>
<?= $this->Form->end(); ?>
  
    <!-- Submit Button with HTMX -->
    <button 
        hx-post="<?= $this->Url->build(['controller' => 'Formular', 'action' => 'list']) ?>"
        hx-include="form"  // Include all form data
        hx-target="#bla"  // Where the response will be displayed
        hx-swap="innerHTML"
        hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
      Subscribe
    </button>
