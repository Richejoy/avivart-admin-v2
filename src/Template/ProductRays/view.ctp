<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductRay $productRay
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Ray'), ['action' => 'edit', $productRay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Ray'), ['action' => 'delete', $productRay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productRay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Rays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Ray'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productRays view large-10 medium-10 columns content">
    <h3><?= h($productRay->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productRay->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $productRay->has('image') ? $this->Html->link($productRay->image->id, ['controller' => 'Images', 'action' => 'view', $productRay->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productRay->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Categories') ?></h4>
        <?php if (!empty($productRay->product_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productRay->product_categories as $productCategories): ?>
            <tr>
                <td><?= h($productCategories->id) ?></td>
                <td><?= h($productCategories->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductCategories', 'action' => 'view', $productCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductCategories', 'action' => 'edit', $productCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductCategories', 'action' => 'delete', $productCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
