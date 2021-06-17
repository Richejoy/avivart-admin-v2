<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Civility $civility
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
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
<div class="civilities view large-10 medium-10 columns content">
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

        <h4><?= __('Related Data') ?></h4>

        <ul class="tabs" data-tab>
          <li class="tab-title active"><a href="#panel1"><?= __('Users') ?></a></li>
        </ul>
        <div class="tabs-content">
          <div class="content active" id="panel1">
            
            <?php if (!empty($civility->users)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col"><?= __('Phone') ?></th>
                    <th scope="col"><?= __('Username') ?></th>
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

    </div>
</div>
