<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formula $formula
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formula'), ['action' => 'edit', $formula->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formula'), ['action' => 'delete', $formula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formula->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formulas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formula'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Formulas'), ['controller' => 'AdFormulas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Formula'), ['controller' => 'AdFormulas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formulas view large-10 medium-10 columns content">
    <h3><?= h($formula->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($formula->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= $formula->has('currency') ? $this->Html->link($formula->currency->name, ['controller' => 'Currencies', 'action' => 'view', $formula->currency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formula->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Months Add') ?></th>
            <td><?= $this->Number->format($formula->months_add) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($formula->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($formula->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($formula->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ad Formulas') ?></h4>
        <?php if (!empty($formula->ad_formulas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ad Id') ?></th>
                <th scope="col"><?= __('Formula Id') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formula->ad_formulas as $adFormulas): ?>
            <tr>
                <td><?= h($adFormulas->id) ?></td>
                <td><?= h($adFormulas->ad_id) ?></td>
                <td><?= h($adFormulas->formula_id) ?></td>
                <td><?= h($adFormulas->paid) ?></td>
                <td><?= h($adFormulas->created) ?></td>
                <td><?= h($adFormulas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdFormulas', 'action' => 'view', $adFormulas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdFormulas', 'action' => 'edit', $adFormulas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdFormulas', 'action' => 'delete', $adFormulas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adFormulas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
