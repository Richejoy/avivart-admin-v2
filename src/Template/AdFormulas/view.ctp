<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdFormula $adFormula
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Formula'), ['action' => 'edit', $adFormula->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Formula'), ['action' => 'delete', $adFormula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adFormula->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Formulas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Formula'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formulas'), ['controller' => 'Formulas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formula'), ['controller' => 'Formulas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adFormulas view large-10 medium-10 columns content">
    <h3><?= h($adFormula->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ad') ?></th>
            <td><?= $adFormula->has('ad') ? $this->Html->link($adFormula->ad->name, ['controller' => 'Ads', 'action' => 'view', $adFormula->ad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formula') ?></th>
            <td><?= $adFormula->has('formula') ? $this->Html->link($adFormula->formula->name, ['controller' => 'Formulas', 'action' => 'view', $adFormula->formula->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adFormula->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adFormula->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adFormula->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= $adFormula->paid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
