<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CommunicationCategory $communicationCategory
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Communication Category'), ['action' => 'edit', $communicationCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Communication Category'), ['action' => 'delete', $communicationCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $communicationCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Communication Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Communication Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Communications'), ['controller' => 'Communications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Communication'), ['controller' => 'Communications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="communicationCategories view large-10 medium-10 columns content">
    <h3><?= h($communicationCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($communicationCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($communicationCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($communicationCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($communicationCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Communications') ?></h4>
        <?php if (!empty($communicationCategory->communications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($communicationCategory->communications as $communications): ?>
            <tr>
                <td><?= h($communications->id) ?></td>
                <td><?= h($communications->content) ?></td>
                <td><?= h($communications->published) ?></td>
                <td><?= h($communications->created) ?></td>
                <td><?= h($communications->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Communications', 'action' => 'view', $communications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Communications', 'action' => 'edit', $communications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Communications', 'action' => 'delete', $communications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $communications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
