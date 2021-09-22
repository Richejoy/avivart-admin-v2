<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleRay $articleRay
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article Ray'), ['action' => 'edit', $articleRay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article Ray'), ['action' => 'delete', $articleRay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articleRay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Article Rays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article Ray'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articleRays view large-10 medium-10 columns content">
    <h3><?= h($articleRay->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($articleRay->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $articleRay->has('image') ? $this->Html->link($articleRay->image->id, ['controller' => 'Images', 'action' => 'view', $articleRay->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articleRay->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articleRay->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articleRay->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Article Categories') ?></h4>
        <?php if (!empty($articleRay->article_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($articleRay->article_categories as $articleCategories): ?>
            <tr>
                <td><?= h($articleCategories->id) ?></td>
                <td><?= h($articleCategories->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ArticleCategories', 'action' => 'view', $articleCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ArticleCategories', 'action' => 'edit', $articleCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ArticleCategories', 'action' => 'delete', $articleCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articleCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
