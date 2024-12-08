<h1>Summary element!</h1>
<p>
    <?php 
        echo implode(",", $personal);
        echo implode(",", $contact);
    ?>

</p>

<!-- Submit Button with HTMX -->
<button 
    hx-post="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'summary']) ?>"
    hx-target="#placeHolder"
    hx-swap="innerHTML"
    hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
  Speichern
</button>