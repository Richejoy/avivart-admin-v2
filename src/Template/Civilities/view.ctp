<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Civility $civility
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Civility'), ['action' => 'edit', $civility->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Civility'), ['action' => 'delete', $civility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $civility->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Civilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Civility'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genders'), ['controller' => 'Genders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gender'), ['controller' => 'Genders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="civilities view large-9 medium-8 columns content">
    <h3><?= h($civility->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($civility->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $civility->has('gender') ? $this->Html->link($civility->gender->name, ['controller' => 'Genders', 'action' => 'view', $civility->gender->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($civility->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($civility->users)): ?>
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
            <?php foreach ($civility->users as $users): ?>
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
