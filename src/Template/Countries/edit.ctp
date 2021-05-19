<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $country->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="countries form large-10 medium-10 columns content">
    <?= $this->Form->create($country) ?>
    <fieldset>
        <legend><?= __('Edit Country') ?></legend>
        <?php
            echo $this->Form->control('iso');
            echo $this->Form->control('name');
            echo $this->Form->control('nicename');
            echo $this->Form->control('iso3');
            echo $this->Form->control('numcode');
            echo $this->Form->control('phonecode');
            echo $this->Form->control('nationality');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
