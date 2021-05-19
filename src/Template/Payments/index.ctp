<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment[]|\Cake\Collection\CollectionInterface $payments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payments index large-9 medium-8 columns content">
    <h3><?= __('Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tx_reference') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tx_datetime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_reference') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('identifier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
            <tr>
                <td><?= $this->Number->format($payment->id) ?></td>
                <td><?= h($payment->tx_reference) ?></td>
                <td><?= h($payment->tx_datetime) ?></td>
                <td><?= h($payment->payment_reference) ?></td>
                <td><?= h($payment->payment_method) ?></td>
                <td><?= h($payment->phone_number) ?></td>
                <td><?= h($payment->identifier) ?></td>
                <td><?= h($payment->description) ?></td>
                <td><?= $payment->has('order') ? $this->Html->link($payment->order->id, ['controller' => 'Orders', 'action' => 'view', $payment->order->id]) : '' ?></td>
                <td><?= h($payment->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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
