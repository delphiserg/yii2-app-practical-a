<?php

use yii\bootstrap\Nav;
?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Admin</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <?=
                Nav::widget(
                        [
                            'encodeLabels' => false,
                            'options' => ['class' => 'treeview-menu'],
                            'items' => [
                                ['label' => '<span class="fa fa-file-code-o"></span> Gii', 'url' => ['/gii']],
                            ],
                        ]
                );
                ?>                
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <?=
                Nav::widget(
                        [
                            'encodeLabels' => false,
                            'options' => ['class' => 'treeview-menu'],
                            'items' => [
                                ['label' => '<span class="fa fa-file-code-o"></span> Admin', 'url' => ['/user/admin']],
                                ['label' => '<span class="fa fa-file-code-o"></span> Create', 'url' => ['/user/admin/create']],
                            ],
                        ]
                );
                ?>                
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i>
                    <span>Roles</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <?php
                if (Yii::$app->getModule('admin')) {
                    echo Nav::widget(
                            [
                                'encodeLabels' => false,
                                'options' => ['class' => 'treeview-menu'],
                                'items' => [
                                    ['label' => '<span class="fa fa-file-code-o"></span> Assignments', 'url' => ['/admin/assignment']],
                                    ['label' => '<span class="fa fa-file-code-o"></span> Roles', 'url' => ['/admin/role']],
                                    ['label' => '<span class="fa fa-file-code-o"></span> Permission', 'url' => ['/admin/permission']],
                                    ['label' => '<span class="fa fa-file-code-o"></span> Routes', 'url' => ['/admin/route']],
                                    ['label' => '<span class="fa fa-file-code-o"></span> Rules', 'url' => ['/admin/rule']],
                                    ['label' => '<span class="fa fa-file-code-o"></span> Menus', 'url' => ['/admin/menu']],
                                ],
                            ]
                    );
                }
                ?>                
            </li>
        </ul>

    </section>

</aside>
