<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Communication[]|\Cake\Collection\CollectionInterface $communications
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Communication'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Communication Categories'), ['controller' => 'CommunicationCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Communication Category'), ['controller' => 'CommunicationCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="communications index large-10 medium-10 columns content">
    <h3><?= __('Communications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('published') ?></th>
                <th scope="col"><?= $this->Paginator->sort('communication_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($communications as $communication): ?>
            <tr>
                <td><?= $this->Number->format($communication->id) ?></td>
                <td><?= h($communication->published) ?></td>
                <td><?= $communication->has('communication_category') ? $this->Html->link($communication->communication_category->name, ['controller' => 'CommunicationCategories', 'action' => 'view', $communication->communication_category->id]) : '' ?></td>
                <td><?= $communication->has('user') ? $this->Html->link($communication->user->full_name, ['controller' => 'Users', 'action' => 'view', $communication->user->id]) : '' ?></td>
                <td><?= h($communication->created) ?></td>
                <td><?= h($communication->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $communication->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $communication->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $communication->id], ['confirm' => __('Are you sure you want to delete # {0}?', $communication->id)]) ?>
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
