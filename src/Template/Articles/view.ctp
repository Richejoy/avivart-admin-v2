<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Article Types'), ['controller' => 'ArticleTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article Type'), ['controller' => 'ArticleTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conversions'), ['controller' => 'Conversions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conversion'), ['controller' => 'Conversions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-10 medium-10 columns content">
    <h3><?= h($article->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($article->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($article->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article Category') ?></th>
            <td><?= $article->has('article_category') ? $this->Html->link($article->article_category->name, ['controller' => 'ArticleCategories', 'action' => 'view', $article->article_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article Type') ?></th>
            <td><?= $article->has('article_type') ? $this->Html->link($article->article_type->name, ['controller' => 'ArticleTypes', 'action' => 'view', $article->article_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= $article->has('currency') ? $this->Html->link($article->currency->name, ['controller' => 'Currencies', 'action' => 'view', $article->currency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conversion') ?></th>
            <td><?= $article->has('conversion') ? $this->Html->link($article->conversion->name, ['controller' => 'Conversions', 'action' => 'view', $article->conversion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Old Price') ?></th>
            <td><?= $this->Number->format($article->old_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New Price') ?></th>
            <td><?= $this->Number->format($article->new_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($article->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $article->has('image') ? $this->Html->link($article->image->id, ['controller' => 'Images', 'action' => 'view', $article->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($article->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('On Discount') ?></th>
            <td><?= $article->on_discount ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $article->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Characteristics') ?></h4>
        <?= $this->Text->autoParagraph(h($article->characteristics)); ?>
    </div>
</div>
