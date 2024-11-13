<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['main.min']) ?>
    <?= $this->Html->script(['main.min']) ?>

    <script src="https://unpkg.com/htmx.org@1.7.0"></script>

</head>