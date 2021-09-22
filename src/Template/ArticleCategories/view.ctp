<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleCategory $articleCategory
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article Category'), ['action' => 'edit', $articleCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article Category'), ['action' => 'delete', $articleCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articleCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Article Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Article Rays'), ['controller' => 'ArticleRays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article Ray'), ['controller' => 'ArticleRays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articleCategories view large-10 medium-10 columns content">
    <h3><?= h($articleCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($articleCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $articleCategory->has('image') ? $this->Html->link($articleCategory->image->id, ['controller' => 'Images', 'action' => 'view', $articleCategory->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article Ray') ?></th>
            <td><?= $articleCategory->has('article_ray') ? $this->Html->link($articleCategory->article_ray->name, ['controller' => 'ArticleRays', 'action' => 'view', $articleCategory->article_ray->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articleCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articleCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articleCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articles') ?></h4>
        <?php if (!empty($articleCategory->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Characteristics') ?></th>
                <th scope="col"><?= __('Old Price') ?></th>
                <th scope="col"><?= __('New Price') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('On Discount') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($articleCategory->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->name) ?></td>
                <td><?= h($articles->description) ?></td>
                <td><?= h($articles->characteristics) ?></td>
                <td><?= h($articles->old_price) ?></td>
                <td><?= h($articles->new_price) ?></td>
                <td><?= h($articles->quantity) ?></td>
                <td><?= h($articles->on_discount) ?></td>
                <td><?= h($articles->published) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
