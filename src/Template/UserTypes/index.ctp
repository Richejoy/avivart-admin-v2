<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserType[]|\Cake\Collection\CollectionInterface $userTypes
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userTypes index large-10 medium-10 columns content">
    <h3><?= __('User Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('about') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userTypes as $userType): ?>
            <tr>
                <td><?= $this->Number->format($userType->id) ?></td>
                <td><?= h($userType->name) ?></td>
                <td><?= h($userType->about) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]) ?>
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
