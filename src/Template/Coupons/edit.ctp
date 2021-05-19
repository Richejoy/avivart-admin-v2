<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon $coupon
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coupon->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coupon->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coupons form large-10 medium-10 columns content">
    <?= $this->Form->create($coupon) ?>
    <fieldset>
        <legend><?= __('Edit Coupon') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('code');
            echo $this->Form->control('rate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
