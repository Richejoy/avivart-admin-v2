<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsOrder[]|\Cake\Collection\CollectionInterface $productsOrders
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsOrders index large-10 medium-10 columns content">
    <h3><?= __('Products Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsOrders as $productsOrder): ?>
            <tr>
                <td><?= $this->Number->format($productsOrder->id) ?></td>
                <td><?= $productsOrder->has('product') ? $this->Html->link($productsOrder->product->name, ['controller' => 'Products', 'action' => 'view', $productsOrder->product->id]) : '' ?></td>
                <td><?= $productsOrder->has('order') ? $this->Html->link($productsOrder->order->id, ['controller' => 'Orders', 'action' => 'view', $productsOrder->order->id]) : '' ?></td>
                <td><?= $this->Number->format($productsOrder->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsOrder->product_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsOrder->product_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsOrder->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsOrder->product_id)]) ?>
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
