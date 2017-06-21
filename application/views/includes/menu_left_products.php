<?php $menu = getLeftMenu('products'); ?>

<div class="container-fluid" id="content">		
    <div id="left">
        <img src="/assets/img/teamgroup_logo.png" />
        <form action="search-results.html" method="GET" class='search-form'>
            <div class="search-pane">
                <input type="text" name="search" placeholder="Search here...">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
        <div class="subnav">
            <div class="subnav-title">
                <a href="#" class='toggle-subnav'>
                    <i class="fa fa-angle-down"></i>
                    <span><?php echo $menu[0]['title']; ?></span>
                </a>
            </div>
            <ul class="subnav-menu">					
                <?php
                for ($i = 1; $i < count($menu); $i++) {
                    echo '<li><a href="' . base_url($menu[$i]['url']) . '"> ' . $menu[$i]['title'] . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <div class="subnav">
            <div class="subnav-title">
                <a href="#" class='toggle-subnav'>
                    <i class="fa fa-angle-down"></i>
                    <span>Product Group</span>
                </a>
            </div>
            <ul class="subnav-menu">					
                <?php
                foreach ($groups as $group) {
                    if (isset($products_group) && $products_group == $group->group_name) {
                        $active_class = 'my-active';
                    } else {
                        $active_class = '';
                    }
                    echo'<li class="' . $active_class . '"><a href="' . base_url('products/group/') . $group->group_name . '">' . $group->group_name . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <div class="subnav">
            <div class=" heading-cart">
                <h3>Cart</h3>
            </div>

            <div id="cart-wrapper"></div>
        </div>
    </div>
