<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactTopic $contactTopic
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactTopic->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactTopic->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contact Topics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contactTopics form large-9 medium-8 columns content">
    <?= $this->Form->create($contactTopic) ?>
    <fieldset>
        <legend><?= __('Edit Contact Topic') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
