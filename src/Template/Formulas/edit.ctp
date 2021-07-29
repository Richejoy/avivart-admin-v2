<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formula $formula
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formula->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formula->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formulas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Formulas'), ['controller' => 'AdFormulas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Formula'), ['controller' => 'AdFormulas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formulas form large-10 medium-10 columns content">
    <?= $this->Form->create($formula) ?>
    <fieldset>
        <legend><?= __('Edit Formula') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('months_add');
            echo $this->Form->control('amount');
            echo $this->Form->control('currency_id', ['options' => $currencies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
