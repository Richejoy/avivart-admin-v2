<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Rays'), ['controller' => 'ProductRays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Ray'), ['controller' => 'ProductRays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="images view large-10 medium-10 columns content">
    <h3><?= h($image->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Folder') ?></th>
            <td><?= h($image->folder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($image->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($image->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($image->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($image->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($image->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Data') ?></h4>

        <ul class="tabs" data-tab>
          <li class="tab-title active"><a href="#panel1"><?= __('Product Categories') ?></a></li>
          <li class="tab-title"><a href="#panel2"><?= __('Product Rays') ?></a></li>
          <li class="tab-title"><a href="#panel3"><?= __('Product Types') ?></a></li>
          <li class="tab-title"><a href="#panel4"><?= __('Products') ?></a></li>
          <li class="tab-title"><a href="#panel5"><?= __('Users') ?></a></li>
        </ul>
        <div class="tabs-content">
          <div class="content active" id="panel1">
            
            <?php if (!empty($image->product_categories)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($image->product_categories as $productCategories): ?>
                <tr>
                    <td><?= h($productCategories->id) ?></td>
                    <td><?= h($productCategories->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'ProductCategories', 'action' => 'view', $productCategories->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'ProductCategories', 'action' => 'edit', $productCategories->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductCategories', 'action' => 'delete', $productCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategories->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>

          </div>
          <div class="content" id="panel2">
            
            <?php if (!empty($image->product_rays)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($image->product_rays as $productRays): ?>
                <tr>
                    <td><?= h($productRays->id) ?></td>
                    <td><?= h($productRays->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'ProductRays', 'action' => 'view', $productRays->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'ProductRays', 'action' => 'edit', $productRays->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductRays', 'action' => 'delete', $productRays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productRays->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>

          </div>
          <div class="content" id="panel3">
            
            <?php if (!empty($image->product_types)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($image->product_types as $productTypes): ?>
                <tr>
                    <td><?= h($productTypes->id) ?></td>
                    <td><?= h($productTypes->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'ProductTypes', 'action' => 'view', $productTypes->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'ProductTypes', 'action' => 'edit', $productTypes->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductTypes', 'action' => 'delete', $productTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productTypes->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>

          </div>
          <div class="content" id="panel4">
            
            <?php if (!empty($image->products)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Old Price') ?></th>
                    <th scope="col"><?= __('New Price') ?></th>
                    <th scope="col"><?= __('Quantity') ?></th>
                    <th scope="col"><?= __('On Discount') ?></th>
                    <th scope="col"><?= __('Published') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($image->products as $products): ?>
                <tr>
                    <td><?= h($products->id) ?></td>
                    <td><?= h($products->name) ?></td>
                    <td><?= h($products->description) ?></td>
                    <td><?= h($products->old_price) ?></td>
                    <td><?= h($products->new_price) ?></td>
                    <td><?= h($products->quantity) ?></td>
                    <td><?= h($products->on_discount) ?></td>
                    <td><?= h($products->published) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>

          </div>
          <div class="content" id="panel5">
            
            <?php if (!empty($image->users)): ?>
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
                <?php foreach ($image->users as $users): ?>
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
