<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdsUser $adsUser
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ads User'), ['action' => 'edit', $adsUser->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ads User'), ['action' => 'delete', $adsUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $adsUser->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ads Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ads User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adsUsers view large-10 medium-10 columns content">
    <h3><?= h($adsUser->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $adsUser->has('user') ? $this->Html->link($adsUser->user->full_name, ['controller' => 'Users', 'action' => 'view', $adsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad') ?></th>
            <td><?= $adsUser->has('ad') ? $this->Html->link($adsUser->ad->name, ['controller' => 'Ads', 'action' => 'view', $adsUser->ad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adsUser->created) ?></td>
        </tr>
    </table>
</div>
