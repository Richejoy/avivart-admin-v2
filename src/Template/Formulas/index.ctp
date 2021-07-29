<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formula[]|\Cake\Collection\CollectionInterface $formulas
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formula'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Formulas'), ['controller' => 'AdFormulas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Formula'), ['controller' => 'AdFormulas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formulas index large-10 medium-10 columns content">
    <h3><?= __('Formulas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('months_add') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('currency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formulas as $formula): ?>
            <tr>
                <td><?= $this->Number->format($formula->id) ?></td>
                <td><?= h($formula->name) ?></td>
                <td><?= $this->Number->format($formula->months_add) ?></td>
                <td><?= $this->Number->format($formula->amount) ?></td>
                <td><?= $formula->has('currency') ? $this->Html->link($formula->currency->name, ['controller' => 'Currencies', 'action' => 'view', $formula->currency->id]) : '' ?></td>
                <td><?= h($formula->created) ?></td>
                <td><?= h($formula->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formula->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formula->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formula->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
