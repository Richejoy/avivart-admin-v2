<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesOrder[]|\Cake\Collection\CollectionInterface $articlesOrders
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articles Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesOrders index large-10 medium-10 columns content">
    <h3><?= __('Articles Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesOrders as $articlesOrder): ?>
            <tr>
                <td><?= $this->Number->format($articlesOrder->id) ?></td>
                <td><?= $articlesOrder->has('article') ? $this->Html->link($articlesOrder->article->name, ['controller' => 'Articles', 'action' => 'view', $articlesOrder->article->id]) : '' ?></td>
                <td><?= $articlesOrder->has('order') ? $this->Html->link($articlesOrder->order->id, ['controller' => 'Orders', 'action' => 'view', $articlesOrder->order->id]) : '' ?></td>
                <td><?= $this->Number->format($articlesOrder->quantity) ?></td>
                <td><?= h($articlesOrder->created) ?></td>
                <td><?= h($articlesOrder->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlesOrder->article_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlesOrder->article_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlesOrder->article_id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesOrder->article_id)]) ?>
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
