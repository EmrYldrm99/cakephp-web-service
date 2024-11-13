<form>
    <fieldset>
      <?= $this->Form->control('first_name', [
          'placeholder' => 'First name',
          'autocomplete' => 'given-name',
          'label' => 'First name',
          'value' => $fname
      ]) ?>
      <?= $this->Form->control('email', [
          'type' => 'email',
          'placeholder' => 'Email',
          'autocomplete' => 'email',
          'label' => 'Email',
          'value' => $mail
      ]) ?>
    </fieldset>
  
    <!-- Submit Button with HTMX -->
    <button 
        hx-post="<?= $this->Url->build(['controller' => 'Formular', 'action' => 'validate']) ?>"
        hx-include="form"  // Include all form data
        hx-target="#bla"  // Where the response will be displayed
        hx-swap="innerHTML"
        hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
      Subscribe
    </button>
  </form>