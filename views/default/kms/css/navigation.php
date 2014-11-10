<?php if (FALSE) : ?><style type="text/css"><?php endif; ?>
	<?php
	/**
	 * Navigation
	 *
	 * @package Elgg.Core
	 * @subpackage UI
	 */
	?>

	/* ***************************************
		PAGINATION
	*************************************** */
	.elgg-pagination {
		margin: 10px 0;
		display: block;
		text-align: center;
	}
	.elgg-pagination li {
		display: inline;
		margin: 0 6px 0 0;
		text-align: center;
	}
	.elgg-pagination a, .elgg-pagination span {
		-webkit-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;
		-moz-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;
		border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;

		padding: 2px 6px;
		color: <?php echo HYPESTYLER_PALLETTE_MAIN ?>;
		border: 1px solid <?php echo HYPESTYLER_PALLETTE_MAIN ?>;
		font-size: 100%;

		white-space:nowrap;
	}
	.elgg-pagination a:hover {
		background: <?php echo HYPESTYLER_PALLETTE_MAIN ?>;
		color: white;
		text-decoration: none;
	}
	.elgg-pagination .elgg-state-disabled span {
		color: <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		border-color: <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
	}
	.elgg-pagination .elgg-state-selected span {
		color: <?php echo HYPESTYLER_PALLETTE_SUPPLEMENT ?>;
		border-color: <?php echo HYPESTYLER_PALLETTE_SUPPLEMENT ?>;
	}

	/* ***************************************
		BREADCRUMBS
	*************************************** */
	.elgg-breadcrumbs {
		font-size: 85%;
		font-weight: bold;
		line-height: 1.2em;
		color: #666;
		background: <?php echo HYPESTYLER_PALLETTE_CANVAS ?>;
		border-bottom:<?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		margin:2px 2px 10px;
		padding:7px 14px;
	}
	.elgg-breadcrumbs > li {
		display: inline-block;
		vertical-align:middle;
	}
	.elgg-breadcrumbs > li:after{
		content: "\003E";
		padding: 0 4px;
		font-weight: normal;
	}
	.elgg-breadcrumbs > li > a {
		display: inline-block;
		color: inherit;
	}
	.elgg-breadcrumbs > li > a:hover {
		text-decoration: underline;
		color: inherit;
	}

	.elgg-main .elgg-breadcrumbs {
		position: relative;
		top: -6px;
		left: 0;
	}

	/* ***************************************
		TOPBAR MENU
	*************************************** */
	.elgg-menu-topbar {
		float: left;
	}

	.elgg-menu-topbar > li {
		display:inline-block;
		vertical-align:middle;
	}
	.elgg-menu-topbar > li > a {
		padding: 5px 14px;
		color: #e8e8e8;
		text-shadow: 1px 1px 1px #000;
		border-left: 1px solid #444;
		box-sizing:border-box;
		display:inline-block;
		vertical-align:middle;
		font-size:90%;
	}
	.elgg-menu-topbar > li:last-child > a {
		border-right: 1px solid #444;
	}
	.elgg-menu-topbar > li > a:hover {
		background: #666;
		background: -webkit-linear-gradient(top, #777, #555);
		background: -moz-linear-gradient(top, #666, #444);
		background: -ms-linear-gradient(top, #666, #444);
		background: -o-linear-gradient(top, #666, #444);
		top:1px;
		color: #fff;
	}
	.elgg-menu-topbar-alt {
		float: right;
	}

	.elgg-menu-topbar > li > a .elgg-icon {
		margin: -2px 5px 0;
		display:inline-block;
		vertical-align:middle;
	}
	.elgg-menu-topbar > li > a img {
		margin: -2px 5px 0;
		display:inline-block;
		vertical-align:middle;
		height:16px;
		width:auto;
	}


	/* ***************************************
		SITE MENU
	*************************************** */
	.elgg-menu-site {
		z-index: 1;
	}
	.elgg-menu-site > li > a {
		font-weight: bold;
        text-transform:uppercase;
        font-size: 85%;
		line-height:16px;
		padding: 7px 10px;
		color:inherit;
	}
	.elgg-menu-site > li:hover {
        background:white;
	}
	.elgg-menu-site > li > a:hover {
		text-decoration: none;
		color:inherit;
	}

	.elgg-menu-site-default {
		position: relative;
		bottom: 0;
		left: 0;
	}

	.elgg-menu-site-default > li {
		display:inline-block;
		vertical-align:middle;
	}

	.elgg-menu-site-default > li > a {
		height:16px;
    }


	.elgg-menu-site-default > .elgg-state-selected > a,
	.elgg-menu-site-default > li:hover > a {
	}

	.elgg-menu-site-default > .elgg-state-selected {
        background:white;
	}

	.elgg-menu-site-icon img {
		height: 16px;
		width: 16px;
	}
	.elgg-menu-item-user-dropdown > a,
	.elgg-menu-item-user-dropdown > a > img {
		height: 16px;
		width: 16px;
	}
	.elgg-menu-site > li > a > span.elgg-menu-site-icon > img {
        width: <?php echo (HYPESTYLER_STYLER_TOOLBAR_ICONS && HYPESTYLER_STYLER_TOOLBAR_ICONS != 'hover') ? '16px' : '0' ?>;
		padding-right: 7px;
	}
	.elgg-menu-site > li > a:hover > span.elgg-menu-site-icon > img,
	.elgg-menu-site > .elgg-state-selected > a > span.elgg-menu-site-icon > img
	{
        width: <?php echo (HYPESTYLER_STYLER_TOOLBAR_ICONS) ? '16px' : '0' ?>;
	}

	.elgg-menu-site-more {
		display: none;
		position: absolute;
		left: 5px;
		top:32px;
		width: 100%;
		z-index: 1;
		min-width: 150px;
		border: 1px solid <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		background:#fff;
		-moz-box-shadow:1px 1px 3px <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		-webkit-box-shadow:1px 1px 3px <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		box-shadow:1px 1px 3px <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
	}

	li.elgg-state-acive > .elgg-menu-site-more,
	li:hover > .elgg-menu-site-more {
		display: block;
	}

	.elgg-menu-site-more > li > a {
	}

	.elgg-menu-site-more > .elgg-state-selected {
		background: <?php echo HYPESTYLER_PALLETTE_CANVAS ?>;
	}

	.elgg-menu-site-more > li:hover {
        background: <?php echo HYPESTYLER_PALLETTE_CANVAS ?>;
	}

	.elgg-menu-site-more > li > a:hover {
	}
	.elgg-menu-site-more > li:last-child > a,
	.elgg-menu-site-more > li:last-child > a:hover {

	}

	.elgg-more > a:before {
		content: "\25BC";
		font-size: smaller;
		width:16px;
		height:16px;
		text-align:center;
		display:inline-block;
	}

	.elgg-menu-site-icon,	.elgg-menu-site-icon-text {
        display:inline-block;
		vertical-align:top;
	}

	/* ***************************************
		TITLE
	*************************************** */
	.elgg-menu-title {
		float: right;
		margin:13px 0 0 13px;
	}

	.elgg-menu-title > li {
		display: inline-block;
	}

	.elgg-menu-title > li > a {
		margin-left:7px;
	}


	/* ***************************************
		FILTER MENU
	*************************************** */
	.elgg-menu-filter, .elgg-tabs {
		margin-bottom: 10px;
		border-bottom: 2px solid <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		display: table;
		width: 100%;
	}
	.elgg-menu-filter > li, .elgg-tabs > li {
		float: left;
		border: 2px solid <?php echo HYPESTYLER_PALLETTE_CANVAS ?>;
		border-bottom: 0;
		background: <?php echo HYPESTYLER_PALLETTE_CANVAS ?>;
		margin: 0 0 0 10px;
        font-weight:bold;

		-webkit-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?> <?php echo HYPESTYLER_BORDERRADIUS ?> 0 0;
		-moz-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?> <?php echo HYPESTYLER_BORDERRADIUS ?> 0 0;
		border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?> <?php echo HYPESTYLER_BORDERRADIUS ?> 0 0;
	}
	.elgg-menu-filter > li:hover, .elgg-tabs > li:hover {
		/*background: <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>; */
	}
	.elgg-menu-filter > li > a, .elgg-tabs > li > a {
		text-decoration: none;
		display: block;
		padding: 3px 10px 0;
		text-align: center;
		height: 21px;
		color: #333;
	}
	.elgg-menu-filter > li > a:hover, .elgg-tabs > li > a:hover {
		/* background: <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>; */
		color: <?php echo HYPESTYLER_PALLETTE_MAIN ?>;
	}
	.elgg-menu-filter > .elgg-state-selected, .elgg-tabs > .elgg-state-selected {
		border-color: <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		background: white;
	}
	.elgg-menu-filter > .elgg-state-selected > a, .elgg-tabs > .elgg-state-selected > a {
		position: relative;
		top: 2px;
		background: white;
	}

	/* ***************************************
		PAGE MENU
	*************************************** */
	.elgg-menu-page {
		margin-bottom: 13px;
		background:#fff;
		border:1px solid <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		padding:10px;
	}

	.elgg-menu-page a {
		display: block;

		-webkit-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;
		-moz-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;
		border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;

		background-color: white;
		margin: 0 0 3px;
		padding: 7px 5px 7px 15px;
	}
	.elgg-menu-page a:hover {
		background-color: <?php echo HYPESTYLER_PALLETTE_SUPPLEMENT ?>;
		color: white;
		text-decoration: none;
	}
	.elgg-menu-page li.elgg-state-selected > a {
		background-color: <?php echo HYPESTYLER_PALLETTE_MAIN ?>;
		color: white;
	}
	.elgg-menu-page .elgg-child-menu {
		display: none;
		margin-left: 15px;
	}
	.elgg-menu-page .elgg-menu-closed:before, .elgg-menu-opened:before {
		display: inline-block;
		padding-right: 4px;
	}
	.elgg-menu-page .elgg-menu-closed:before {
		content: "\002B";
	}
	.elgg-menu-page .elgg-menu-opened:before {
		content: "\002D";
	}

	/* ***************************************
		HOVER MENU
	*************************************** */
	.elgg-menu-hover {
		display: none;
		position: absolute;
		z-index: 10000;

		width: 165px;
		border: solid 1px;
		border-color: #E5E5E5 <?php echo HYPESTYLER_PALLETTE_SUPPLEMENT ?> <?php echo HYPESTYLER_PALLETTE_SUPPLEMENT ?> #E5E5E5;
		background-color: #FFF;

		-webkit-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
		-moz-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	}
	.elgg-menu-hover > li {
		border-bottom: 1px solid <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
	}
	.elgg-menu-hover > li:last-child {
		border-bottom: none;
	}
	.elgg-menu-hover .elgg-heading-basic {
		display: block;
	}
	.elgg-menu-hover a {
		padding: 2px 8px;
		font-size: 92%;
	}
	.elgg-menu-hover a:hover {
		background: <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		text-decoration: none;
	}
	.elgg-menu-hover-admin a {
		color: red;
	}
	.elgg-menu-hover-admin a:hover {
		color: white;
		background-color: red;
	}

	/* ***************************************
		FOOTER
	*************************************** */
	.elgg-menu-footer {
	}
	.elgg-menu-footer > li,
	.elgg-menu-footer > li > a {
		display: inline-block;
        font-size:95%;
		color:inherit;
	}

	.elgg-menu-footer > li:after {
		content: "\007C";
		padding: 0 4px;
	}

	.elgg-menu-footer-default {
		float: right;
	}

	.elgg-menu-footer-alt {
		float: left;
	}

	/* ***************************************
		ENTITY AND ANNOTATION
	*************************************** */<?php // height depends on line height/font size     ?>
	.elgg-menu-entity, elgg-menu-annotation {
		float: right;
		margin-left: 15px;
		font-size: 90%;
		color: #aaa;
		line-height: 16px;
		height: 16px;
	}
	.elgg-menu-entity > li, .elgg-menu-annotation > li {
		margin: 3px 5px;
		display:inline-block;
	}
	.elgg-menu-entity > li > a, .elgg-menu-annotation > li > a {
		color: inherit;
	}<?php // need to override .elgg-menu-hz     ?>
	.elgg-menu-entity > li > a, .elgg-menu-annotation > li > a {
		display: block;
	}
	.elgg-menu-entity > li > span, .elgg-menu-annotation > li > span {
		vertical-align: baseline;
	}

	/* ***************************************
		OWNER BLOCK
	*************************************** */
	.elgg-menu-owner-block a {
		display: block;

		-webkit-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;
		-moz-border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;
		border-radius: <?php echo HYPESTYLER_BORDERRADIUS ?>;

		background-color: white;
		margin: 0 0 3px;
		padding: 7px 5px 7px 15px;
	}
	.elgg-menu-owner-block a:hover {
		background-color: <?php echo HYPESTYLER_PALLETTE_SUPPLEMENT ?>;
		color: white;
		text-decoration: none;
	}
	.elgg-menu-owner-block li.elgg-state-selected > a {
		background-color: <?php echo HYPESTYLER_PALLETTE_MAIN ?>;
		color: white;
	}
	.elgg-menu-owner-block .elgg-child-menu {
		display: none;
		margin-left: 15px;
	}
	.elgg-menu-owner-block .elgg-menu-closed:before, .elgg-menu-opened:before {
		display: inline-block;
		padding-right: 4px;
	}
	.elgg-menu-owner-block .elgg-menu-closed:before {
		content: "\002B";
	}
	.elgg-menu-owner-block .elgg-menu-opened:before {
		content: "\002D";
	}

	/* ***************************************
		LONGTEXT
	*************************************** */
	.elgg-menu-longtext {
		float: right;
        display:none;
	}

	/* ***************************************
		RIVER
	*************************************** */
	.elgg-menu-river {
		float: right;
		margin-left: 15px;
		font-size: 90%;
		color: #aaa;
		line-height: 16px;
		height: 16px;
	}
	.elgg-menu-river > li {
		display: inline-block;
		margin-left: 5px;
	}
	.elgg-menu-river > li > a {
		color: #aaa;
		height: 16px;
	}<?php // need to override .elgg-menu-hz     ?>
	.elgg-menu-river > li > a {
		display: block;
	}
	.elgg-menu-river > li > span {
		vertical-align: baseline;
	}

	/* ***************************************
		SIDEBAR EXTRAS (rss, bookmark, etc)
	*************************************** */
	.elgg-menu-extras {
		margin-bottom: 13px;
		background:#fff;
		border:1px solid <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		padding:10px;
	}
	/* ***************************************
		WIDGET MENU
	*************************************** */
	.elgg-menu-widget > li {
		position: absolute;
		display: inline-block;
		width: 18px;
		height: 18px;
		padding: 7px 7px 0 0;
	}

	.elgg-menu-widget > .elgg-menu-item-collapse {
		left: 5px;
	}
	.elgg-menu-widget > .elgg-menu-item-delete {
		right: 5px;
	}
	.elgg-menu-widget > .elgg-menu-item-settings {
		right: 25px;
	}

	/* **************************************
		HYPEJUNCTION
	*************************************** */
	.uppermenuitem {
		padding:10px;
		text-align:center;
		float:left;
	}
	.uppermenuitem:hover {
		background:<?php echo HYPESTYLER_PALLETTE_CANVAS ?>
	}
	.uppermenuitem a {
		text-transform:uppercase;
		font-size:85%;
		font-weight:bold;
		padding-top:2px;
	}
	.headerloginform {
		float:left;
		border:1px solid <?php echo HYPESTYLER_PALLETTE_ACCESSORY ?>;
		display:none;
	}
