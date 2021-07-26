<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdsUser[]|\Cake\Collection\CollectionInterface $adsUsers
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ads User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adsUsers index large-10 medium-10 columns content">
    <h3><?= __('Ads Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adsUsers as $adsUser): ?>
            <tr>
                <td><?= $this->Number->format($adsUser->id) ?></td>
                <td><?= $adsUser->has('user') ? $this->Html->link($adsUser->user->full_name, ['controller' => 'Users', 'action' => 'view', $adsUser->user->id]) : '' ?></td>
                <td><?= $adsUser->has('ad') ? $this->Html->link($adsUser->ad->name, ['controller' => 'Ads', 'action' => 'view', $adsUser->ad->id]) : '' ?></td>
                <td><?= h($adsUser->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adsUser->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adsUser->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adsUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $adsUser->user_id)]) ?>
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
