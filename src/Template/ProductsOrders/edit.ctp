<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsOrder $productsOrder
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productsOrder->product_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productsOrder->product_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsOrders form large-10 medium-10 columns content">
    <?= $this->Form->create($productsOrder) ?>
    <fieldset>
        <legend><?= __('Edit Products Order') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
