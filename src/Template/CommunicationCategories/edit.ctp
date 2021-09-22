<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CommunicationCategory $communicationCategory
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $communicationCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $communicationCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Communication Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Communications'), ['controller' => 'Communications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Communication'), ['controller' => 'Communications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="communicationCategories form large-10 medium-10 columns content">
    <?= $this->Form->create($communicationCategory) ?>
    <fieldset>
        <legend><?= __('Edit Communication Category') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
