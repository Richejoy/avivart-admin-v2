<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">

  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>

    <li>
      <a data-dropdown="ditem1" aria-controls="ditem1" aria-expanded="false"><?= __('Parameters') ?></a>

      <ul id="ditem1" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
        <li><?= $this->Html->link(__('List Civilities'), ['controller' => 'Civilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Genders'), ['controller' => 'Genders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Conversions'), ['controller' => 'Conversions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>

        <li class="divider"></li>

        <li><?= $this->Html->link(__('List Order States'), ['controller' => 'OrderStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Rays'), ['controller' => 'ProductRays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>

        <li class="divider"></li>

        <li><?= $this->Html->link(__('List Transaction Types'), ['controller' => 'TransactionTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contact Topics'), ['controller' => 'ContactTopics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payment Modes'), ['controller' => 'PaymentModes', 'action' => 'index']) ?></li>
      </ul>

    </li>

    <li>
      <a data-dropdown="ditem2" aria-controls="ditem2" aria-expanded="false"><?= __('Activities') ?></a>

      <ul id="ditem2" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">

        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?></li>

        <li class="divider"></li>

        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products Orders'), ['controller' => 'ProductsOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products Users'), ['controller' => 'ProductsUsers', 'action' => 'index']) ?></li>

        <li class="divider"></li>

        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
      </ul>

    </li>

    <li>
      <a data-dropdown="ditem3" aria-controls="ditem3" aria-expanded="false"><?= __('Utilities') ?></a>

      <ul id="ditem3" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
      </ul>

    </li>

  </ul>
</nav>
<div class="large-10 medium-10 columns content">

  <div class="row">
    <div class="medium-4 small-12 text-center">
        
        <div class="panel callout">
          <p>
          <img src="<?= $this->getRequest()->getSession()->read('user_avatar') ?>" alt="Image" />
        </p>

        <h6><?= $user->full_name ?> !</h6>

        <ul style="list-style: none;">
          <li><?= __('Last Login:') . ' ' . $user->last_login->format('Y-m-d') ?></li>
          <li><?= __('Nb Login:') . ' ' . $user->nb_login ?></li>
          <li><?= __('Logged as:') . ' ' . $user->user_type->name ?></li>
          <li><?= __('With role:') . ' ' . $user->role->name ?></li>
        </ul>
        </div>

    </div>
  </div>


</div>