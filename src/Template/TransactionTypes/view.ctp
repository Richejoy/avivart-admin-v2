<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionType $transactionType
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction Type'), ['action' => 'edit', $transactionType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction Type'), ['action' => 'delete', $transactionType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transaction Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactionTypes view large-10 medium-10 columns content">
    <h3><?= h($transactionType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($transactionType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transactionType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($transactionType->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Activity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Transaction Type Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transactionType->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->activity) ?></td>
                <td><?= h($transactions->created) ?></td>
                <td><?= h($transactions->transaction_type_id) ?></td>
                <td><?= h($transactions->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
