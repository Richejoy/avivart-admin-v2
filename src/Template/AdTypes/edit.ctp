<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdType $adType
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ad Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adTypes form large-10 medium-10 columns content">
    <?= $this->Form->create($adType) ?>
    <fieldset>
        <legend><?= __('Edit Ad Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('image_id', ['options' => $images]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
