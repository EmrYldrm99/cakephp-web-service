<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Player> $players
 */
?>
<h1>List of Requests</h1>
<div id="bla" hx-get="<?= $this->Url->build(['action' => 'list']) ?>" hx-trigger="load" hx-swap="innerHTML">
    <?php include('elements.php'); ?>
</div>

<!-- Submit Button with HTMX -->
<button 
    hx-post="<?= $this->Url->build(['controller' => 'Requests', 'action' => 'elements']) ?>"
    hx-include="form"
    hx-target="#bla"
    hx-swap="innerHTML"
    hx-headers='{"X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"}'>
  update
</button>