<?php if (FALSE) : ?><style type="text/css"><?php endif; ?>

body {
    background-image: url(<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_background.jpg);
}

.elgg-child-menu {
        display: none;
        position: absolute;
        left: 5px;
        top:28px;
        width: 100%;
        z-index: 1;
        min-width: 150px;
        border: 1px solid <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
        background:#fff;
        color: #222;
        -moz-box-shadow:1px 1px 3px <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
        -webkit-box-shadow:1px 1px 3px <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
        box-shadow:1px 1px 3px <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
}

li:hover > .elgg-child-menu{
    display: block;
}
.elgg-child-menu > li > a {
        font-weight: bold;
        text-transform:uppercase;
        font-size: 85%;
        line-height:16px;
        padding: 7px 10px;
        color:inherit;
}
.elgg-child-menu > li:hover {
        background:white;
}
.elgg-child-menu > li > a:hover {
        text-decoration: none;
        color:inherit;
}

.elgg-menu-site-icon > img {
        width: '16px';
        padding-right: 7px;
}

.elgg-child-menu > li:hover {
    background: <?php echo HYPESTYLER_PALLETTE_CANVAS ?>;
}
#hj-custom-module-position-header{
    display: none;
}
#hj-layout-footer{
    display: none;
}

.elgg-module-static.elgg-module-styler-topbar {
	background: url('<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_menu-all.png') repeat-x !important;
    border: none !important;
    min-height: 44px !important;
    font-size: 14px;
}

.elgg-menu-item-platform-observations, .elgg-menu-item-platform-ideas, .elgg-menu-item-platform-research, 
.elgg-menu-item-platform-projects, .elgg-menu-item-platform-training, .elgg-menu-item-platform-more {
    border-right: 1px solid white;
    color: #fff;
}

.elgg-menu-item-platform-observations {
    background: url('<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_menu-all.png') repeat-x !important;
}

.elgg-menu-item-platform-observations > ul.elgg-menu.elgg-child-menu > li:hover {
    background: #00abe1 !important;
    color: #fff;
}

.elgg-menu-item-platform-ideas {
    background: url('<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_menu-green.png') repeat-x !important;
}

.elgg-menu-item-platform-ideas > ul.elgg-menu.elgg-child-menu > li:hover {
    background: #8dbe44 !important;
    color: #fff;
}

.elgg-menu-item-platform-research {
    background: url('<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_menu-orange.png') repeat-x !important;
}

.elgg-menu-item-platform-research > ul.elgg-menu.elgg-child-menu > li:hover {
    background: #ffb25c !important;
    color: #fff;
}

.elgg-menu-item-platform-projects {
    background: url('<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_menu-purple.png') repeat-x !important;
}

.elgg-menu-item-platform-projects > ul.elgg-menu.elgg-child-menu > li:hover {
    background: #9a64a8 !important;
    color: #fff;
}

.elgg-menu-item-platform-training {
    background: url('<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_menu-red.png') repeat-x !important;
}

.elgg-menu-item-platform-training > ul.elgg-menu.elgg-child-menu > li:hover {
    background: #fa4753 !important;
    color: #fff;
}

.elgg-menu-item-platform-more {
    background: url('<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_menu-all.png') repeat-x !important;
}

.elgg-menu-item-platform-more > ul.elgg-menu.elgg-child-menu > li:hover {
    background: #00abe1 !important;
    color: #fff;
}

.elgg-menu-site-default > li > a {
    height: 24px !important;
}

.elgg-menu-site > li > a {
    padding: 14px 20px !important;
}

.elgg-menu-site > li > a:before {
    width: 13px !important;
    text-align: left !important;
    
}

.elgg-module-featured {
    border: 1px solid #B0B0B0;
}

.elgg-module-featured > .elgg-head {
    background-color: #46C3EE !important;
}

.elgg-module > .elgg-head {
    color: #46C3EE !important;
}

.elgg-search {
    margin-top: 8px;
}

.elgg-search input[type=text] {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    height: 27px;
    padding: 2px 4px 2px 26px;
    border: 1px solid #0089c4;
    color: #797979 !important;
    background-color: white !important;
    background: url(<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_search.png) no-repeat;
    box-shadow: inset 0 0 3px 0 rgba(0,0,0,0.7);
    -webkit-box-shadow: inset 0 0 3px 0 rgba(0,0,0,0.7);
    -moz-box-shadow: inset 0 0 3px 0 rgba(0,0,0,0.7);
}

.elgg-search input[type=text]:focus, .elgg-search input[type=text]:active {
    padding: 2px 4px 2px 26px;
    color: #797979 !important;
    background-color: white !important;
    background: url(<?php echo elgg_get_site_url() ?>mod/kms/graphics/kms_search.png) no-repeat;
    box-shadow: inset 0 0 3px 0 rgba(0,0,0,0.7);
    -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.7);
    -moz-box-shadow: inset 0 0 3px rgba(0,0,0,0.7);
}

form.elgg-search.elgg-search-header {
    display: none;
}

.elgg-menu-page li.elgg-state-selected > a {
    background-color: #46C3EE !important;
}

.elgg-menu-page a:hover {
    background-color: #ffb25c !important;
}
.elgg-button-submit {
    border-color: #46C3EE !important;
    background: #46C3EE !important;
}

.elgg-button-submit:hover {
    border-color: #ffb25c !important;
    background: #ffb25c !important;
}

.elgg-button-action:hover, .elgg-button-action:focus {
background: #ffb25c !important;
border-color: #ffb25c !important;
}