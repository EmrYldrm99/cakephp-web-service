<h1>Contact Formular</h1>
<?= $this->Form->create($request); ?>
      <?= $this->Form->control('mail_address', [
          'placeholder' => 'Mail Address',
          'label' => 'Mail Address',
          'value' => ""
      ]) ?>
      <?= $this->Form->control('phone_number', [
          'placeholder' => 'Phone Number',
          'label' => 'Phone Number',
          'value' => ""
      ]) ?>
<?= $this->Form->end(); ?>

<!-- Submit Button with HTMX -->
<button 
    hx-post="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'contact']) ?>"
    hx-include="form"
    hx-target="#placeHolder"
    hx-swap="innerHTML"
    hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
  Submit
</button>