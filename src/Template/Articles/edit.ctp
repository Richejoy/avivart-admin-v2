<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Article Types'), ['controller' => 'ArticleTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article Type'), ['controller' => 'ArticleTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Conversions'), ['controller' => 'Conversions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conversion'), ['controller' => 'Conversions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articles form large-10 medium-10 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('characteristics');
            echo $this->Form->control('old_price');
            echo $this->Form->control('new_price');
            echo $this->Form->control('quantity');
            echo $this->Form->control('on_discount');
            echo $this->Form->control('published');
            echo $this->Form->control('article_category_id', ['options' => $articleCategories]);
            echo $this->Form->control('article_type_id', ['options' => $articleTypes]);
            echo $this->Form->control('currency_id', ['options' => $currencies]);
            echo $this->Form->control('conversion_id', ['options' => $conversions]);
        ?>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
