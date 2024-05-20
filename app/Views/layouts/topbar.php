        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url(); ?>">
                                    <i class="mdi mdi-storefront mr-2"></i>Dashboard
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-cloud-print-outline mr-2"></i>Menu<div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-components">
                                    <a href="<?= base_url('blog'); ?>" class="dropdown-item">Blog</a>
                                    <a href="<?= base_url('comment'); ?>" class="dropdown-item">Comment</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>