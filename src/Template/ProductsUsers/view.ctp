<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsUser $productsUser
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products User'), ['action' => 'edit', $productsUser->product_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products User'), ['action' => 'delete', $productsUser->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsUser->product_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsUsers view large-10 medium-10 columns content">
    <h3><?= h($productsUser->product_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $productsUser->has('user') ? $this->Html->link($productsUser->user->id, ['controller' => 'Users', 'action' => 'view', $productsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsUser->has('product') ? $this->Html->link($productsUser->product->name, ['controller' => 'Products', 'action' => 'view', $productsUser->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productsUser->created) ?></td>
        </tr>
    </table>
</div>
