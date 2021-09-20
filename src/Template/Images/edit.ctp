<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $image->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Rays'), ['controller' => 'ProductRays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Ray'), ['controller' => 'ProductRays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="images form large-10 medium-10 columns content">
    
    <ul class="tabs" data-tab role="tablist">
        <li class="tab-title active" role="presentation"><a href="#panel2-1" role="tab" tabindex="0"
                aria-selected="true" aria-controls="panel2-1">En local</a></li>
        <li class="tab-title" role="presentation"><a href="#panel2-2" role="tab" tabindex="0" aria-selected="false"
                aria-controls="panel2-2">En ligne</a></li>
    </ul>
    <div class="tabs-content">
        <section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
            <?= $this->Form->create($image, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Image') ?></legend>
                <?php
                echo $this->Form->hidden('form', ['value' => 'local']);
                echo $this->Form->control('image', ['type' => 'file', 'accept' => 'image/*', 'label' => 'Veuillez choisir une image', 'required' => true]);
                ?>
                <?= $this->Form->button(__('Submit')) ?>
            </fieldset>
            <?= $this->Form->end() ?>
        </section>
        <section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">
            <?= $this->Form->create($image) ?>
            <fieldset>
                <legend><?= __('Edit Image') ?></legend>
                <?php
                echo $this->Form->hidden('form', ['value' => 'online']);
                echo $this->Form->control('link');
                ?>
                <?= $this->Form->button(__('Submit')) ?>
            </fieldset>
            <?= $this->Form->end() ?>
        </section>
    </div>

    <p>
        <?= $this->Html->image($image->link, ['alt' => $image->url, 'width' => '300', 'height' => 300]) ?>
    </p>
    
</div>
