<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesImage $articlesImage
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articlesImage->article_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articlesImage->article_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesImages form large-10 medium-10 columns content">
    <?= $this->Form->create($articlesImage) ?>
    <fieldset>
        <legend><?= __('Edit Articles Image') ?></legend>
        <?php
            echo $this->Form->control('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
