<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $order->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payment Modes'), ['controller' => 'PaymentModes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Mode'), ['controller' => 'PaymentModes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order States'), ['controller' => 'OrderStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order State'), ['controller' => 'OrderStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders form large-10 medium-10 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Edit Order') ?></legend>
        <?php
            echo $this->Form->control('delivery_address');
            echo $this->Form->control('delivery_date');
            echo $this->Form->control('paid');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('payment_mode_id', ['options' => $paymentModes]);
            echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true]);
            echo $this->Form->control('order_state_id', ['options' => $orderStates]);
            echo $this->Form->control('amount');
            echo $this->Form->button(__('Submit'));
        ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
