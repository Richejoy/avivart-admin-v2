<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdRay $adRay
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Ray'), ['action' => 'edit', $adRay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Ray'), ['action' => 'delete', $adRay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adRay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Rays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Ray'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['controller' => 'AdCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Category'), ['controller' => 'AdCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adRays view large-10 medium-10 columns content">
    <h3><?= h($adRay->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($adRay->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $adRay->has('image') ? $this->Html->link($adRay->image->id, ['controller' => 'Images', 'action' => 'view', $adRay->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adRay->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ad Categories') ?></h4>
        <?php if (!empty($adRay->ad_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adRay->ad_categories as $adCategories): ?>
            <tr>
                <td><?= h($adCategories->id) ?></td>
                <td><?= h($adCategories->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdCategories', 'action' => 'view', $adCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdCategories', 'action' => 'edit', $adCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdCategories', 'action' => 'delete', $adCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
