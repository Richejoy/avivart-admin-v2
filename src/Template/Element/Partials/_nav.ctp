<?php

?>
<nav class="top-bar" data-topbar role="navigation" data-options="is_hover: true;">
    <ul class="title-area columns medium-2">
        <li class="name">
            <h1><a><?= getEnv('APP_NAME') ?></a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <div class="top-bar-section">

        <ul class="left">
            <li class="" id="collapsed-sidebar"><a href="#"><i class="fa fa-bars"></i></a></li>

            <li class=""><?= $this->Html->link(__('Dashboard'), ['controller' => 'Pages', 'action' => 'index']) ?></li>

            <li class="has-dropdown">
                <a href="#"><?= __('Parameters') ?></a>
                <ul class="dropdown">

                    <li class="has-dropdown">
                        <a href="#"><?= __('Sub Item 1') ?></a>
                        <ul class="dropdown">
                            <li><?= $this->Html->link(__('List Civilities'), ['controller' => 'Civilities', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Genders'), ['controller' => 'Genders', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Conversions'), ['controller' => 'Conversions', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
                        </ul>
                    </li>

                    <li class="has-dropdown">
                        <a href="#"><?= __('Sub Item 2') ?></a>
                        <ul class="dropdown">
                            <li><?= $this->Html->link(__('List Order States'), ['controller' => 'OrderStates', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Product Rays'), ['controller' => 'ProductRays', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>

                            <li><?= $this->Html->link(__('List Ad Types'), ['controller' => 'AdTypes', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Ad Rays'), ['controller' => 'AdRays', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Ad Categories'), ['controller' => 'AdCategories', 'action' => 'index']) ?></li>
                        </ul>
                    </li>

                    <li class="has-dropdown">
                        <a href="#"><?= __('Sub Item 3') ?></a>
                        <ul class="dropdown">
                            <li><?= $this->Html->link(__('List Transaction Types'), ['controller' => 'TransactionTypes', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Contact Topics'), ['controller' => 'ContactTopics', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('List Payment Modes'), ['controller' => 'PaymentModes', 'action' => 'index']) ?></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="has-dropdown">
                <a href="#"><?= __('Activities') ?></a>
                <ul class="dropdown">
                    <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?></li>

                    <li class="divider"></li>

                    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Products Orders'), ['controller' => 'ProductsOrders', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Products Users'), ['controller' => 'ProductsUsers', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Products Images'), ['controller' => 'ProductsImages', 'action' => 'index']) ?></li>

                    <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Ads Users'), ['controller' => 'AdsUsers', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Ads Images'), ['controller' => 'AdsImages', 'action' => 'index']) ?></li>

                    <li class="divider"></li>

                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
                </ul>
            </li>

            <li class="has-dropdown">
                <a href="#"><?= __('Utilities') ?></a>
                <ul class="dropdown">
                    <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
                </ul>
            </li>
        </ul>

        <ul class="right">
            <li class=""><?= $this->Html->link(__('Documentation'), ['controller' => 'Pages', 'action' => 'doc']) ?></li>

            <li class="has-dropdown">
                <a href="#"><?= __('Language') ?></a>
                <ul class="dropdown">
                    <li><?= $this->Html->link(__('French'), ['controller' => 'Pages', 'action' => 'locale', 'fr_FR']) ?></li>
                    <li><?= $this->Html->link(__('English'), ['controller' => 'Pages', 'action' => 'locale', 'en_US']) ?></li>
                </ul>
            </li>

            <li class="has-dropdown">
                <a href="#"><?= $this->getRequest()->getSession()->read('Auth.User.full_name') ?></a>
                <ul class="dropdown">
                    <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view', $this->getRequest()->getSession()->read('Auth.User.id')]) ?></li>
                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Pages', 'action' => 'logout']) ?></li>
                </ul>
            </li>

        </ul>

    </div>
</nav>
