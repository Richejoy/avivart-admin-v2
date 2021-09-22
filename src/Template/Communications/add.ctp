<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Communication $communication
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Communications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Communication Categories'), ['controller' => 'CommunicationCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Communication Category'), ['controller' => 'CommunicationCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="communications form large-10 medium-10 columns content">
    <?= $this->Form->create($communication) ?>
    <fieldset>
        <legend><?= __('Add Communication') ?></legend>
        <?php
            echo $this->Form->control('content');
            echo $this->Form->control('published');
            echo $this->Form->control('communication_category_id', ['options' => $communicationCategories]);
        ?>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
