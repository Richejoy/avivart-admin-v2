<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Communication $communication
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Communication'), ['action' => 'edit', $communication->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Communication'), ['action' => 'delete', $communication->id], ['confirm' => __('Are you sure you want to delete # {0}?', $communication->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Communications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Communication'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Communication Categories'), ['controller' => 'CommunicationCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Communication Category'), ['controller' => 'CommunicationCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="communications view large-10 medium-10 columns content">
    <h3><?= h($communication->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Communication Category') ?></th>
            <td><?= $communication->has('communication_category') ? $this->Html->link($communication->communication_category->name, ['controller' => 'CommunicationCategories', 'action' => 'view', $communication->communication_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $communication->has('user') ? $this->Html->link($communication->user->full_name, ['controller' => 'Users', 'action' => 'view', $communication->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($communication->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($communication->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($communication->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $communication->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($communication->content)); ?>
    </div>
</div>
