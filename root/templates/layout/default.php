<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php frameworklol';
?>
<!DOCTYPE html>
<html theme="light">
    <?= $this->element('partials/head'); ?>
    <body>
        <?= $this->element('partials/header'); ?>
        <?= $this->element('partials/main')?>
        <?= $this->element('partials/footer') ?>
    </body>
</html>
