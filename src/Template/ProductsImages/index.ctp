<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsImage[]|\Cake\Collection\CollectionInterface $productsImages
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsImages index large-10 medium-10 columns content">
    <h3><?= __('Products Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsImages as $productsImage): ?>
            <tr>
                <td><?= $this->Number->format($productsImage->id) ?></td>
                <td><?= $productsImage->has('image') ? $this->Html->link($productsImage->image->id, ['controller' => 'Images', 'action' => 'view', $productsImage->image->id]) : '' ?></td>
                <td><?= $productsImage->has('product') ? $this->Html->link($productsImage->product->name, ['controller' => 'Products', 'action' => 'view', $productsImage->product->id]) : '' ?></td>
                <td><?= h($productsImage->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsImage->product_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsImage->product_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsImage->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsImage->product_id)]) ?>
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
