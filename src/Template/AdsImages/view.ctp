<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdsImage $adsImage
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ads Image'), ['action' => 'edit', $adsImage->ad_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ads Image'), ['action' => 'delete', $adsImage->ad_id], ['confirm' => __('Are you sure you want to delete # {0}?', $adsImage->ad_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ads Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ads Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adsImages view large-10 medium-10 columns content">
    <h3><?= h($adsImage->ad_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $adsImage->has('image') ? $this->Html->link($adsImage->image->id, ['controller' => 'Images', 'action' => 'view', $adsImage->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad') ?></th>
            <td><?= $adsImage->has('ad') ? $this->Html->link($adsImage->ad->name, ['controller' => 'Ads', 'action' => 'view', $adsImage->ad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adsImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adsImage->created) ?></td>
        </tr>
    </table>
</div>
