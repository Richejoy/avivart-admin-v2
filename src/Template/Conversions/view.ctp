<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conversion $conversion
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conversion'), ['action' => 'edit', $conversion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conversion'), ['action' => 'delete', $conversion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conversion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conversions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conversion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conversions view large-10 medium-10 columns content">
    <h3><?= h($conversion->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($conversion->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($conversion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floating') ?></th>
            <td><?= $conversion->floating ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($conversion->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Old Price') ?></th>
                <th scope="col"><?= __('New Price') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('On Discount') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($conversion->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->old_price) ?></td>
                <td><?= h($products->new_price) ?></td>
                <td><?= h($products->quantity) ?></td>
                <td><?= h($products->on_discount) ?></td>
                <td><?= h($products->published) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
