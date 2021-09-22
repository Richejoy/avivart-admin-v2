<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleCategory $articleCategory
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Article Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Article Rays'), ['controller' => 'ArticleRays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article Ray'), ['controller' => 'ArticleRays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articleCategories form large-10 medium-10 columns content">
    <?= $this->Form->create($articleCategory) ?>
    <fieldset>
        <legend><?= __('Add Article Category') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('article_ray_id', ['options' => $articleRays]);
        ?>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
