<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender[]|\Cake\Collection\CollectionInterface $genders
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gender'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Civilities'), ['controller' => 'Civilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Civility'), ['controller' => 'Civilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="genders index large-10 medium-10 columns content">
    <h3><?= __('Genders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($genders as $gender): ?>
            <tr>
                <td><?= $this->Number->format($gender->id) ?></td>
                <td><?= h($gender->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gender->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gender->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id)]) ?>
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
