<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conversion $conversion
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $conversion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conversion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Conversions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conversions form large-10 medium-10 columns content">
    <?= $this->Form->create($conversion) ?>
    <fieldset>
        <legend><?= __('Edit Conversion') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('floating');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
