<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdCategory $adCategory
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Category'), ['action' => 'edit', $adCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Category'), ['action' => 'delete', $adCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Rays'), ['controller' => 'AdRays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Ray'), ['controller' => 'AdRays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adCategories view large-10 medium-10 columns content">
    <h3><?= h($adCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($adCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $adCategory->has('image') ? $this->Html->link($adCategory->image->id, ['controller' => 'Images', 'action' => 'view', $adCategory->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad Ray') ?></th>
            <td><?= $adCategory->has('ad_ray') ? $this->Html->link($adCategory->ad_ray->name, ['controller' => 'AdRays', 'action' => 'view', $adCategory->ad_ray->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ads') ?></h4>
        <?php if (!empty($adCategory->ads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Is Vip') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col"><?= __('Expire Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adCategory->ads as $ads): ?>
            <tr>
                <td><?= h($ads->id) ?></td>
                <td><?= h($ads->name) ?></td>
                <td><?= h($ads->description) ?></td>
                <td><?= h($ads->price) ?></td>
                <td><?= h($ads->is_vip) ?></td>
                <td><?= h($ads->published) ?></td>
                <td><?= h($ads->expire_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ads', 'action' => 'edit', $ads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ads', 'action' => 'delete', $ads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
