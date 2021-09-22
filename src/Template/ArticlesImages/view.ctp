<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesImage $articlesImage
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles Image'), ['action' => 'edit', $articlesImage->article_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles Image'), ['action' => 'delete', $articlesImage->article_id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesImage->article_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesImages view large-10 medium-10 columns content">
    <h3><?= h($articlesImage->article_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $articlesImage->has('image') ? $this->Html->link($articlesImage->image->id, ['controller' => 'Images', 'action' => 'view', $articlesImage->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $articlesImage->has('article') ? $this->Html->link($articlesImage->article->name, ['controller' => 'Articles', 'action' => 'view', $articlesImage->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articlesImage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articlesImage->modified) ?></td>
        </tr>
    </table>
</div>
