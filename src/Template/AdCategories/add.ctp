<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdCategory $adCategory
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Rays'), ['controller' => 'AdRays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Ray'), ['controller' => 'AdRays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adCategories form large-10 medium-10 columns content">
    <?= $this->Form->create($adCategory) ?>
    <fieldset>
        <legend><?= __('Add Ad Category') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('image_id', ['options' => $images]);
            echo $this->Form->control('ad_ray_id', ['options' => $adRays]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
