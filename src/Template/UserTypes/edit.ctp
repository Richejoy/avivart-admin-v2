<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserType $userType
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userTypes form large-10 medium-10 columns content">
    <?= $this->Form->create($userType) ?>
    <fieldset>
        <legend><?= __('Edit User Type') ?></legend>
        <?php
            echo $this->Form->control('name', ['readonly' => true]);
            echo $this->Form->control('about');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
