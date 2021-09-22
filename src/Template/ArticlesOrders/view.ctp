<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesOrder $articlesOrder
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles Order'), ['action' => 'edit', $articlesOrder->article_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles Order'), ['action' => 'delete', $articlesOrder->article_id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesOrder->article_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesOrders view large-10 medium-10 columns content">
    <h3><?= h($articlesOrder->article_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $articlesOrder->has('article') ? $this->Html->link($articlesOrder->article->name, ['controller' => 'Articles', 'action' => 'view', $articlesOrder->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $articlesOrder->has('order') ? $this->Html->link($articlesOrder->order->id, ['controller' => 'Orders', 'action' => 'view', $articlesOrder->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($articlesOrder->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articlesOrder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articlesOrder->modified) ?></td>
        </tr>
    </table>
</div>
