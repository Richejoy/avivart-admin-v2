<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdsUser $adsUser
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adsUser->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adsUser->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ads Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adsUsers form large-10 medium-10 columns content">
    <?= $this->Form->create($adsUser) ?>
    <fieldset>
        <legend><?= __('Edit Ads User') ?></legend>
        <?php
            echo $this->Form->control('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
