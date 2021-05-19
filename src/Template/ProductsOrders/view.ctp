<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsOrder $productsOrder
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Order'), ['action' => 'edit', $productsOrder->product_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Order'), ['action' => 'delete', $productsOrder->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsOrder->product_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsOrders view large-10 medium-10 columns content">
    <h3><?= h($productsOrder->product_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsOrder->has('product') ? $this->Html->link($productsOrder->product->name, ['controller' => 'Products', 'action' => 'view', $productsOrder->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $productsOrder->has('order') ? $this->Html->link($productsOrder->order->id, ['controller' => 'Orders', 'action' => 'view', $productsOrder->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($productsOrder->quantity) ?></td>
        </tr>
    </table>
</div>
