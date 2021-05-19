<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender $gender
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gender->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Genders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Civilities'), ['controller' => 'Civilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Civility'), ['controller' => 'Civilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="genders form large-10 medium-10 columns content">
    <?= $this->Form->create($gender) ?>
    <fieldset>
        <legend><?= __('Edit Gender') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
