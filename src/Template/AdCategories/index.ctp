<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdCategory[]|\Cake\Collection\CollectionInterface $adCategories
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Rays'), ['controller' => 'AdRays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Ray'), ['controller' => 'AdRays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adCategories index large-10 medium-10 columns content">
    <h3><?= __('Ad Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_ray_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adCategories as $adCategory): ?>
            <tr>
                <td><?= $this->Number->format($adCategory->id) ?></td>
                <td><?= h($adCategory->name) ?></td>
                <td><?= $adCategory->has('image') ? $this->Html->link($adCategory->image->id, ['controller' => 'Images', 'action' => 'view', $adCategory->image->id]) : '' ?></td>
                <td><?= $adCategory->has('ad_ray') ? $this->Html->link($adCategory->ad_ray->name, ['controller' => 'AdRays', 'action' => 'view', $adCategory->ad_ray->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adCategory->id)]) ?>
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
