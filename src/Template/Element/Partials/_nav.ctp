<?php

?>
<nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false;">
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
