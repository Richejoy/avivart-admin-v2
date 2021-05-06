<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Civility $civility
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Civilities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Genders'), ['controller' => 'Genders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gender'), ['controller' => 'Genders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="civilities form large-9 medium-8 columns content">
    <?= $this->Form->create($civility) ?>
    <fieldset>
        <legend><?= __('Add Civility') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('gender_id', ['options' => $genders]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
