<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionType $transactionType
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transactionType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transactionType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transaction Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactionTypes form large-10 medium-10 columns content">
    <?= $this->Form->create($transactionType) ?>
    <fieldset>
        <legend><?= __('Edit Transaction Type') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
