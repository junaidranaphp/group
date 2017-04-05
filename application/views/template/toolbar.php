
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?php echo $this->template->get_heading() ?></h1>
            </div>
            <div class="pull-right">
                <ul class="minitiles">
                    <li class='grey'><a href="#"> <i class="fa fa-cogs"></i>
                        </a></li>
                    <li class='lightgrey'><a href="#"> <i class="fa fa-globe"></i>
                        </a></li>
                </ul>
                <ul class="stats">
                    <li class='satgreen'><i class="fa fa-money"></i>
                        <div class="details">
                            <span class="big">$324,12</span> <span>Balance</span>
                        </div></li>
                    <li class='lightred'><i class="fa fa-calendar"></i>
                        <div class="details">
                            <span class="big">February 22, 2013</span> <span>Wednesday,
                                13:56</span>
                        </div></li>
                </ul>
            </div>
        </div>
        <div class="breadcrumbs form-group">
            <ul>
                <li><a href="more-login.html">Home</a> <i
                        class="fa fa-angle-right"></i></li>
                <li><a href="#"><?php echo $this->template->get_active_menu() ?></a> <i
                        class="fa fa-angle-right"></i></li>
                <li><a href="forms-basic.html"><?php echo $this->template->get_active_submenu() ?></a></li>
            </ul>
            <div class="close-bread">
                <a href="#"> <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="form-group">
            <?php if (($message = $this->session->flashdata('message'))) { ?>
                <div class="alert alert-block alert-<?php echo $message['type'] ?>">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading"><i class="fa fa-comment"></i> <?php echo $message['type'] ?>!</h4>
                    <p></p>
                    <p>
                        <?php echo $message['content'] ?>
                    </p>
                    <p></p>
                </div>
            <?php } else if (validation_errors()) { ?>
                <div class="alert alert-block alert-danger">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading"><i class="fa fa-comment"></i> Validation Check!</h4>
                    <p>
                        <?php echo validation_errors() ?>
                    </p>
                </div>
            <?php } ?>
        </div>
