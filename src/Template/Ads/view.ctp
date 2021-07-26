<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ad $ad
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad'), ['action' => 'edit', $ad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['controller' => 'AdCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Category'), ['controller' => 'AdCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Types'), ['controller' => 'AdTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Type'), ['controller' => 'AdTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ads view large-10 medium-10 columns content">
    <h3><?= h($ad->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($ad->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($ad->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad Category') ?></th>
            <td><?= $ad->has('ad_category') ? $this->Html->link($ad->ad_category->name, ['controller' => 'AdCategories', 'action' => 'view', $ad->ad_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad Type') ?></th>
            <td><?= $ad->has('ad_type') ? $this->Html->link($ad->ad_type->name, ['controller' => 'AdTypes', 'action' => 'view', $ad->ad_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= $ad->has('currency') ? $this->Html->link($ad->currency->name, ['controller' => 'Currencies', 'action' => 'view', $ad->currency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ad->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($ad->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Id') ?></th>
            <td><?= $this->Number->format($ad->image_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($ad->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expire Date') ?></th>
            <td><?= h($ad->expire_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Vip') ?></th>
            <td><?= $ad->is_vip ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $ad->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Characteristics') ?></h4>
        <?= $this->Text->autoParagraph(h($ad->characteristics)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($ad->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Folder') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ad->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->folder) ?></td>
                <td><?= h($images->url) ?></td>
                <td><?= h($images->link) ?></td>
                <td><?= h($images->description) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($ad->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Activated') ?></th>
                <th scope="col"><?= __('Can Login') ?></th>
                <th scope="col"><?= __('Last Login') ?></th>
                <th scope="col"><?= __('Nb Login') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Token') ?></th>
                <th scope="col"><?= __('Remember Token') ?></th>
                <th scope="col"><?= __('Tfa Enabled') ?></th>
                <th scope="col"><?= __('Tfa Code') ?></th>
                <th scope="col"><?= __('Removed') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Civility Id') ?></th>
                <th scope="col"><?= __('User Type Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ad->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->activated) ?></td>
                <td><?= h($users->can_login) ?></td>
                <td><?= h($users->last_login) ?></td>
                <td><?= h($users->nb_login) ?></td>
                <td><?= h($users->city) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->token) ?></td>
                <td><?= h($users->remember_token) ?></td>
                <td><?= h($users->tfa_enabled) ?></td>
                <td><?= h($users->tfa_code) ?></td>
                <td><?= h($users->removed) ?></td>
                <td><?= h($users->image_id) ?></td>
                <td><?= h($users->country_id) ?></td>
                <td><?= h($users->civility_id) ?></td>
                <td><?= h($users->user_type_id) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
