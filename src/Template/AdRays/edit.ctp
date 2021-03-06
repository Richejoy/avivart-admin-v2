<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdRay $adRay
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adRay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adRay->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ad Rays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['controller' => 'AdCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Category'), ['controller' => 'AdCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adRays form large-10 medium-10 columns content">
    <?= $this->Form->create($adRay) ?>
    <fieldset>
        <legend><?= __('Edit Ad Ray') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
