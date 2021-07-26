<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdsImage $adsImage
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adsImage->ad_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adsImage->ad_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ads Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adsImages form large-10 medium-10 columns content">
    <?= $this->Form->create($adsImage) ?>
    <fieldset>
        <legend><?= __('Edit Ads Image') ?></legend>
        <?php
            echo $this->Form->control('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
