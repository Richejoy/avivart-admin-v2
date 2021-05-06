<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderState $orderState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order State'), ['action' => 'edit', $orderState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order State'), ['action' => 'delete', $orderState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderStates view large-9 medium-8 columns content">
    <h3><?= h($orderState->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($orderState->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderState->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($orderState->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Delivery Address') ?></th>
                <th scope="col"><?= __('Delivery Date') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Payment Mode Id') ?></th>
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Order State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($orderState->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->delivery_address) ?></td>
                <td><?= h($orders->delivery_date) ?></td>
                <td><?= h($orders->paid) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->payment_mode_id) ?></td>
                <td><?= h($orders->coupon_id) ?></td>
                <td><?= h($orders->order_state_id) ?></td>
                <td><?= h($orders->created) ?></td>
                <td><?= h($orders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
