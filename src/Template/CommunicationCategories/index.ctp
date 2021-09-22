<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CommunicationCategory[]|\Cake\Collection\CollectionInterface $communicationCategories
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Communication Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Communications'), ['controller' => 'Communications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Communication'), ['controller' => 'Communications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="communicationCategories index large-10 medium-10 columns content">
    <h3><?= __('Communication Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($communicationCategories as $communicationCategory): ?>
            <tr>
                <td><?= $this->Number->format($communicationCategory->id) ?></td>
                <td><?= h($communicationCategory->name) ?></td>
                <td><?= h($communicationCategory->created) ?></td>
                <td><?= h($communicationCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $communicationCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $communicationCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $communicationCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $communicationCategory->id)]) ?>
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
