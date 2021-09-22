<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesUser $articlesUser
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles User'), ['action' => 'edit', $articlesUser->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles User'), ['action' => 'delete', $articlesUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesUser->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesUsers view large-10 medium-10 columns content">
    <h3><?= h($articlesUser->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $articlesUser->has('article') ? $this->Html->link($articlesUser->article->name, ['controller' => 'Articles', 'action' => 'view', $articlesUser->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $articlesUser->has('user') ? $this->Html->link($articlesUser->user->full_name, ['controller' => 'Users', 'action' => 'view', $articlesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articlesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articlesUser->modified) ?></td>
        </tr>
    </table>
</div>
