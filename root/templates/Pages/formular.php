<h1>Hello World!</h1>
<div role="group">
    <button aria-current="true">Active</button>
    <button>Button</button>
    <button>Button</button>
</div>

<div id="bla" hx-get="<?= $this->Url->build(['action' => 'list']) ?>" hx-target="#bla" hx-trigger="load" hx-swap="outerHTML">
    <!-- Platzhaltertext, wenn die Liste noch nicht geladen wurde -->
    Lade Spieler...
</div>