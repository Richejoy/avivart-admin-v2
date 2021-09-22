<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesImage[]|\Cake\Collection\CollectionInterface $articlesImages
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articles Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesImages index large-10 medium-10 columns content">
    <h3><?= __('Articles Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesImages as $articlesImage): ?>
            <tr>
                <td><?= $this->Number->format($articlesImage->id) ?></td>
                <td><?= $articlesImage->has('image') ? $this->Html->link($articlesImage->image->id, ['controller' => 'Images', 'action' => 'view', $articlesImage->image->id]) : '' ?></td>
                <td><?= $articlesImage->has('article') ? $this->Html->link($articlesImage->article->name, ['controller' => 'Articles', 'action' => 'view', $articlesImage->article->id]) : '' ?></td>
                <td><?= h($articlesImage->created) ?></td>
                <td><?= h($articlesImage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlesImage->article_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlesImage->article_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlesImage->article_id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesImage->article_id)]) ?>
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
