<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdRay[]|\Cake\Collection\CollectionInterface $adRays
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad Ray'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['controller' => 'AdCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Category'), ['controller' => 'AdCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adRays index large-10 medium-10 columns content">
    <h3><?= __('Ad Rays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adRays as $adRay): ?>
            <tr>
                <td><?= $this->Number->format($adRay->id) ?></td>
                <td><?= h($adRay->name) ?></td>
                <td><?= $adRay->has('image') ? $this->Html->link($adRay->image->id, ['controller' => 'Images', 'action' => 'view', $adRay->image->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adRay->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adRay->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adRay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adRay->id)]) ?>
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
