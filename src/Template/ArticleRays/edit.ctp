<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleRay $articleRay
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articleRay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articleRay->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Article Rays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articleRays form large-10 medium-10 columns content">
    <?= $this->Form->create($articleRay) ?>
    <fieldset>
        <legend><?= __('Edit Article Ray') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
