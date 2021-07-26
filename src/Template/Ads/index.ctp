<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ad[]|\Cake\Collection\CollectionInterface $ads
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['controller' => 'AdCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Category'), ['controller' => 'AdCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Types'), ['controller' => 'AdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Type'), ['controller' => 'AdTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ads index large-10 medium-10 columns content">
    <h3><?= __('Ads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_vip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('published') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expire_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('currency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ads as $ad): ?>
            <tr>
                <td><?= $this->Number->format($ad->id) ?></td>
                <td><?= h($ad->name) ?></td>
                <td><?= h($ad->description) ?></td>
                <td><?= $this->Number->format($ad->price) ?></td>
                <td><?= h($ad->is_vip) ?></td>
                <td><?= h($ad->published) ?></td>
                <td><?= h($ad->expire_date) ?></td>
                <td><?= $this->Html->link($ad->image_id, ['controller' => 'Images', 'action' => 'view', $ad->image_id]) ?></td>
                <td><?= $ad->has('ad_category') ? $this->Html->link($ad->ad_category->name, ['controller' => 'AdCategories', 'action' => 'view', $ad->ad_category->id]) : '' ?></td>
                <td><?= $ad->has('ad_type') ? $this->Html->link($ad->ad_type->name, ['controller' => 'AdTypes', 'action' => 'view', $ad->ad_type->id]) : '' ?></td>
                <td><?= $ad->has('currency') ? $this->Html->link($ad->currency->name, ['controller' => 'Currencies', 'action' => 'view', $ad->currency->id]) : '' ?></td>
                <td><?= $this->Number->format($ad->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ad->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ad->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]) ?>
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
