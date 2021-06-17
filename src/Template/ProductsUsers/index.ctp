<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsUser[]|\Cake\Collection\CollectionInterface $productsUsers
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsUsers index large-10 medium-10 columns content">
    <h3><?= __('Products Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsUsers as $productsUser): ?>
            <tr>
                <td><?= $this->Number->format($productsUser->id) ?></td>
                <td><?= $productsUser->has('user') ? $this->Html->link($productsUser->user->full_name, ['controller' => 'Users', 'action' => 'view', $productsUser->user->id]) : '' ?></td>
                <td><?= $productsUser->has('product') ? $this->Html->link($productsUser->product->name, ['controller' => 'Products', 'action' => 'view', $productsUser->product->id]) : '' ?></td>
                <td><?= h($productsUser->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsUser->product_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsUser->product_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsUser->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsUser->product_id)]) ?>
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
