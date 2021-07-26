<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdsImage[]|\Cake\Collection\CollectionInterface $adsImages
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ads Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adsImages index large-10 medium-10 columns content">
    <h3><?= __('Ads Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adsImages as $adsImage): ?>
            <tr>
                <td><?= $this->Number->format($adsImage->id) ?></td>
                <td><?= $adsImage->has('image') ? $this->Html->link($adsImage->image->id, ['controller' => 'Images', 'action' => 'view', $adsImage->image->id]) : '' ?></td>
                <td><?= $adsImage->has('ad') ? $this->Html->link($adsImage->ad->name, ['controller' => 'Ads', 'action' => 'view', $adsImage->ad->id]) : '' ?></td>
                <td><?= h($adsImage->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adsImage->ad_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adsImage->ad_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adsImage->ad_id], ['confirm' => __('Are you sure you want to delete # {0}?', $adsImage->ad_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
