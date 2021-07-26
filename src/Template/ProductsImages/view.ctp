<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsImage $productsImage
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Image'), ['action' => 'edit', $productsImage->product_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Image'), ['action' => 'delete', $productsImage->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsImage->product_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsImages view large-10 medium-10 columns content">
    <h3><?= h($productsImage->product_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $productsImage->has('image') ? $this->Html->link($productsImage->image->id, ['controller' => 'Images', 'action' => 'view', $productsImage->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsImage->has('product') ? $this->Html->link($productsImage->product->name, ['controller' => 'Products', 'action' => 'view', $productsImage->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productsImage->created) ?></td>
        </tr>
    </table>
</div>
