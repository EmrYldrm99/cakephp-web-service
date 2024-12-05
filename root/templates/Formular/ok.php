<?= $this->Form->create($user); ?>
      <?= $this->Form->control('age', [
          'placeholder' => 'Age',
          'label' => 'Age',
          'value' => ''
      ]) ?>
<?= $this->Form->end(); ?>
  
    <!-- Submit Button with HTMX -->
    <button 
        hx-get="<?= $this->Url->build(['controller' => 'Formular', 'action' => 'list']) ?>"
        hx-target="#bla"  // Where the response will be displayed
        hx-swap="innerHTML"
        hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
      Subscribe
    </button>
    <button 
        hx-post="<?= $this->Url->build(['controller' => 'Formular', 'action' => 'ok']) ?>"
        hx-include="form"  // Include all form data
        hx-target="#bla"  // Where the response will be displayed
        hx-swap="innerHTML"
        hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
      Subscribe
    </button>

