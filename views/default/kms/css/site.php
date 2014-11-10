<?php if (FALSE) : ?><style type="text/css"><?php endif; ?>


.elgg-menu-site > li > a:before {
        content: "\25BC";
        font-size: smaller;
        width:16px;
        height:16px;
        text-align:center;
        display:inline-block;
}
.elgg-menu-site > li.elgg-menu-item-user-dropdown > a:before{
    content: "";
    width:0;
    height:0;
}

.elgg-child-menu{
	width: auto;	
}
.elgg-child-menu > li > a{
	white-space: nowrap;
}
