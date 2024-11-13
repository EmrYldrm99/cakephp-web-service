<h1>Hello World!</h1>
<div role="group">
    <button hx-get="<?= $this->Url->build(['action' => 'list']) ?>" hx-target="#bla" hx-swap="innerHTML">
        List One
    </button>
    <button hx-get="<?= $this->Url->build(['action' => 'ok']) ?>" hx-target="#bla" hx-swap="innerHTML">
        List Two
    </button>
    <button hx-get="<?= $this->Url->build(['action' => 'lol']) ?>" hx-target="#bla" hx-swap="innerHTML">
        List Three
    </button>
</div>

<div id="bla" hx-get="<?= $this->Url->build(['action' => 'list']) ?>" hx-trigger="load" hx-swap="innerHTML">
    Loading!
</div>