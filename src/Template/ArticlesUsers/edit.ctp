<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesUser $articlesUser
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articlesUser->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articlesUser->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesUsers form large-10 medium-10 columns content">
    <?= $this->Form->create($articlesUser) ?>
    <fieldset>
        <legend><?= __('Edit Articles User') ?></legend>
        <?php
            echo $this->Form->control('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
