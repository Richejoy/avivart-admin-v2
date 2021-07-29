<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdFormula[]|\Cake\Collection\CollectionInterface $adFormulas
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad Formula'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formulas'), ['controller' => 'Formulas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formula'), ['controller' => 'Formulas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adFormulas index large-10 medium-10 columns content">
    <h3><?= __('Ad Formulas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formula_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adFormulas as $adFormula): ?>
            <tr>
                <td><?= $this->Number->format($adFormula->id) ?></td>
                <td><?= $adFormula->has('ad') ? $this->Html->link($adFormula->ad->name, ['controller' => 'Ads', 'action' => 'view', $adFormula->ad->id]) : '' ?></td>
                <td><?= $adFormula->has('formula') ? $this->Html->link($adFormula->formula->name, ['controller' => 'Formulas', 'action' => 'view', $adFormula->formula->id]) : '' ?></td>
                <td><?= h($adFormula->paid) ?></td>
                <td><?= h($adFormula->created) ?></td>
                <td><?= h($adFormula->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adFormula->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adFormula->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adFormula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adFormula->id)]) ?>
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
