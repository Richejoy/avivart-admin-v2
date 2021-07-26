<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ad $ad
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ad Categories'), ['controller' => 'AdCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Category'), ['controller' => 'AdCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Types'), ['controller' => 'AdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Type'), ['controller' => 'AdTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ads form large-10 medium-10 columns content">
    <?= $this->Form->create($ad) ?>
    <fieldset>
        <legend><?= __('Add Ad') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('characteristics');
            echo $this->Form->control('price');
            echo $this->Form->control('is_vip');
            echo $this->Form->control('published');
            echo $this->Form->control('expire_date');
            echo $this->Form->control('image_id');
            echo $this->Form->control('ad_category_id', ['options' => $adCategories]);
            echo $this->Form->control('ad_type_id', ['options' => $adTypes]);
            echo $this->Form->control('currency_id', ['options' => $currencies]);
            echo $this->Form->control('user_id');
            echo $this->Form->control('images._ids', ['options' => $images]);
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
