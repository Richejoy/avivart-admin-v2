<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleRay[]|\Cake\Collection\CollectionInterface $articleRays
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Article Ray'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articleRays index large-10 medium-10 columns content">
    <h3><?= __('Article Rays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articleRays as $articleRay): ?>
            <tr>
                <td><?= $this->Number->format($articleRay->id) ?></td>
                <td><?= h($articleRay->name) ?></td>
                <td><?= $articleRay->has('image') ? $this->Html->link($articleRay->image->id, ['controller' => 'Images', 'action' => 'view', $articleRay->image->id]) : '' ?></td>
                <td><?= h($articleRay->created) ?></td>
                <td><?= h($articleRay->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articleRay->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articleRay->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articleRay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articleRay->id)]) ?>
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
