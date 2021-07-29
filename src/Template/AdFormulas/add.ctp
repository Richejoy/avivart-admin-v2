<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdFormula $adFormula
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ad Formulas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formulas'), ['controller' => 'Formulas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formula'), ['controller' => 'Formulas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adFormulas form large-10 medium-10 columns content">
    <?= $this->Form->create($adFormula) ?>
    <fieldset>
        <legend><?= __('Add Ad Formula') ?></legend>
        <?php
            echo $this->Form->control('ad_id', ['options' => $ads]);
            echo $this->Form->control('formula_id', ['options' => $formulas]);
            echo $this->Form->control('paid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
