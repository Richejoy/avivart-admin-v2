<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleCategory[]|\Cake\Collection\CollectionInterface $articleCategories
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Article Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Article Rays'), ['controller' => 'ArticleRays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article Ray'), ['controller' => 'ArticleRays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articleCategories index large-10 medium-10 columns content">
    <h3><?= __('Article Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_ray_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articleCategories as $articleCategory): ?>
            <tr>
                <td><?= $this->Number->format($articleCategory->id) ?></td>
                <td><?= h($articleCategory->name) ?></td>
                <td><?= $articleCategory->has('image') ? $this->Html->link($articleCategory->image->id, ['controller' => 'Images', 'action' => 'view', $articleCategory->image->id]) : '' ?></td>
                <td><?= $articleCategory->has('article_ray') ? $this->Html->link($articleCategory->article_ray->name, ['controller' => 'ArticleRays', 'action' => 'view', $articleCategory->article_ray->id]) : '' ?></td>
                <td><?= h($articleCategory->created) ?></td>
                <td><?= h($articleCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articleCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articleCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articleCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articleCategory->id)]) ?>
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
