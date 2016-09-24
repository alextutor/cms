<?php
//http://www.cssblog.es/como-usar-variables-php-en-css/
$colo1 = "#73152d";
$colo2 = "#a5672c";
$colo3 = "#a5672c";
$colo4 = "#a5672c";

$colo_h1 = "#fffff";
?>
<style type="text/css">
@charset "utf-8";
@import url(http://fonts.googleapis.com/css?family=Open+Sans);
@import url(http://fonts.googleapis.com/css?family=Roboto);
	
.color_1 {color:<?php echo $colo1; ?>;} .color_2 {color:#9d4646;} .color_3 {color:#fae3b6;} .color_4 {color:#fd7766;}
.background_1 {background:#73152d;} .background_2 {background:#ee2f2c;}.background_3 {background:#fae3b6;}.background_4 {background:#fd7766;}

body {
	margin: 10px;
	padding: 0;
	background: #fff;
	padding-bottom: 1px;
	font-size: 68.8%; /* Set base to 11px */
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
body#minwidth-body {height: 95%;min-width: 960px;}
a,img {	padding: 0;	margin: 0;}
img {	border: 0 none;}
.clr {	clear: both;overflow: hidden;	height: 0;}
form {	margin: 0;	padding: 0;}
h1 {
	margin: 0;
	padding-bottom: 8px;
	color: #025A8D;
	font-size: 1.818em;
}
h3 {font-size: 1.182em;}
h4 {	font-size: 1.182em;}

* :focus, a:active {
	outline: none;
}
a:link {
	color: #025A8D;
	text-decoration: none;
	outline: none;
}
a:visited {
	color: #025A8D;
	text-decoration: none;
	outline: none;
}
a:hover {text-decoration: underline;}

fieldset {
	margin-bottom: 10px;
	border: 1px #ccc solid;
	padding: 5px;
	text-align: left;
}

legend {
	color: #146295;
	font-size: 1.182em;
	font-weight: bold;
}

input, select {
	font-size: 0.909em;
	border: 1px solid silver;
	background: #fff;
}

textarea {
	font-size: 1.273em;
	border: 1px solid silver;
}

iframe {
	border: 0;
}

.invalid {
	color: red;
	font-weight: bold;
}

input.invalid {
	border: 1px solid red;
}

input.disabled {
	background-color: #F0F0F0;
}

input.button {
	cursor: pointer;
}

input:focus,
select:focus,
textarea:focus {
	background-color: #ffd;
}

.enabled,
.success {
	color: green;
	font-weight: bold;
}

.disabled,
p.error {
	color: red;
	font-weight: bold;
}

.protected {
	color: #999999;
}

p.warning {
	color: red;
	font-weight: bold;
	font-size: 1.091em;
}

p.nowarning {
	color: #333;
	font-weight: bold;
	font-size: 1.091em;
}

.allow,
span.writable {
	color: green;
}

.deny,
span.unwritable  {
	color: red;
}

.none 			{ color: #aaa; }
.hide 			{ display: none; }
.hidebtn 		{ border: 0; padding: 0;margin:0;width: 0;height: 0;}
.hidelabeltxt	{ text-indent: -9999em; }

.nowrap {
	white-space: nowrap;
}

/* ------ Inicio Header ------- */
#border-top.h_blue {
	background: url(/webadmin/mantenimiento/imagen/j_header_middle.png);
	height: 54px;
	-webkit-border-top-right-radius: 8px;
	-webkit-border-top-left-radius: 8px;
	-moz-border-radius-topleft: 8px;
	-moz-border-radius-topright: 8px;
	border-top-right-radius: 8px;
	border-top-left-radius: 8px;
}

#border-top .title,
#border-top .title a {
	font-size: 1.364em;
	font-weight: bold;
	color: #fff;
	line-height: 44px;
	padding-left: 14px;
}

#border-top .logo {
	display: block;
	width: auto;
	float: right;
	padding: 4px 10px 0 0;
}
#header-box {
	border: 1px solid #ccc;
	background: #f0f0f0;
}
/* ------ Fin  Header ------- */

/* Body */
#content-box {
	border: 1px solid #ccc;
	border-top: 0;
	float: left;
	width: 99.85%;
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
	margin-bottom: 5px;
}
#element-box {	margin-bottom: 11px;}
#element-box,
#toolbar-box,
#submenu-box {
	padding: 10px 10px 0 10px;
}
#toolbar-box {
	background: #fbfbfb;
	margin-bottom: 10px;
}
#toolbar-box .m {
	background: #f4f4f4;
	min-height: 48px;
}
div#element-box div.m {
	padding: 10px;
	border: 1px solid #ccc;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	
	border: 1px solid #ccc;	
	background-color: #f4f4f4;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
}
.wbg {
	background-color: #fff!important;
}


/* -- CONTROL PANEL STYLES ----------------------------- */
.cpanel div.icon, #cpanel div.icon {
	text-align: center;
	margin-right: 15px;
	float: left;
	margin-bottom: 15px;

}
.cpanel div.icon a, #cpanel div.icon a {
	background-color: #fff;
	background-position: -30px;
	display: block;
	float: left;
	height: 97px;
	width: 108px;
	color: #565656;
	vertical-align: middle;
	text-decoration: none;
	border: 1px solid #CCC;

	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-transition-property:
		background-position,
		-webkit-border-bottom-left-radius,
		-webkit-box-shadow;
	-moz-transition-property:
		background-position,
		-moz-border-radius-bottomleft,
		-moz-box-shadow;
	-webkit-transition-duration: 0.8s;
	-moz-transition-duration: 0.8s;
}

#cpanel div.icon a:hover,
#cpanel div.icon a:focus,
#cpanel div.icon a:active,
.cpanel div.icon a:hover,
.cpanel div.icon a:focus,
.cpanel div.icon a:active {
	background-position: 0;
	-webkit-border-bottom-left-radius: 50% 20px;
	-moz-border-radius-bottomleft: 50% 20px;
	border-bottom-left-radius: 50% 20px;
	-webkit-box-shadow: -5px 10px 15px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: -5px 10px 15px rgba(0, 0, 0, 0.25);
	box-shadow: -5px 10px 15px rgba(0, 0, 0, 0.25);
	position: relative;
	z-index: 10;
}

#cpanel img,
.cpanel img {
	padding: 10px 0;
	margin: 0 auto;
}

#cpanel span,
.cpanel span {
	display: block;
	text-align: center;
}

div.cpanel-left {
	width: 54%;
	float: left;
}

div.cpanel-right {
	width: 45%;
	float: right;
}

/* -- FIN CONTROL PANEL STYLES ----------------------------- */

/* -- Inicio STATUS STYLES ----------------------------- */

#module-status {
	float: right;
}

#module-status > span {
	display: block;
	float: left;
	line-height: 16px;
	padding: 4px 10px 0 22px;
	margin-bottom: 5px;
}
#module-status .logout {
	background: url(/webadmin/imagen/icon-16-logout.png) 3px 3px no-repeat;
}


/* -- Fin STATUS STYLES ----------------------------- */

/** rounded corners **/
div#element-box div.section-box div.m {
	background: #fbfbfb;
}

.submenu-box, div.m {
	border: 1px solid #ccc;
	padding: 0 8px;
	background-color: #f4f4f4;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}

.submenu-box, #submenu-box div.m {
	padding: 6px 8px;
}

.wbg {
	background-color: #fff!important;
}

div#toolbar-box div.m {
	padding: 5px 0 10px;
}

div#element-box div.m {
	padding: 10px;
}

div#element-box div.section-box {
	background: #f4f4f4;
}

/* login */
div#element-box.login  {
	background-color: #ffffff;
}

/* -- LOGIN STYLES ----------------------------- */

.login {
	margin: 50px auto 100px !important;
	width: 575px;
}

form#form-login {
	clear: both;
	padding: 10px 0 10px 0;
}

h1 {
	margin: 10px 0 5px 10px;
}

p {
	margin: 0 0 15px 10px;
	padding: 0;
	font-size: 1em;
}

#section-box {
	float: right;
	width: 340px;
	margin-left: 10px;
	margin-right: 10px;
	background-color: #fff;
}

#section-box .m {
	padding: 5px;
}

#section-box .padding {
	background: none;
	padding: 0;
}

#lock {
	background: url(/webadmin/imagen/j_login_lock.png) 50% 0 no-repeat;
	width: 150px;
	height: 137px;
}

fieldset.loginform {
	border: 0 none;
	width: auto;
}

label#mod-login-password-lbl,
label#mod-login-username-lbl,
label#mod-login-language-lbl {
	display:block;
	margin:5px 15px 16px 0;
}

input#mod-login-username,
input#mod-login-password,
select#lang {
	float:right;
	margin: 0 0 20px 0;
	clear:right;
	min-width: 145px;
}

.login-submit {
	border: 0;
	padding: 0;
	margin: 0;
	width: 0;
	height: 0;
}

#form-login .button-holder {
	float: right;
	padding-right: 5px;
	clear: right;
	margin-top: 10px;
}
/* -- FIN LOGIN STYLES ----------------------------- */



/* -- BUTTON STYLES ----------------------------- */

/* Pagination on backend */
.button1,
.button1 div {
	height: 1%;
	float: right;
}

.button1 {
	background: url(/webadmin/j_button1_left.png) no-repeat;
	white-space: nowrap;
	padding-left: 10px;
	margin-left: 5px;
}

.button1 .next {
	background: url(/webadmin/imagen/j_button1_next.png) 100% 0 no-repeat;
}

.button1 a {
	display: block;
	height: 26px;
	float: left;
	line-height: 26px;
	font-size: 1.091em;
	font-weight: bold;
	color: #333;
	cursor: pointer;
	padding: 0 35px 0 6px;
}

.button1 a:hover {
	text-decoration: none;
	color: #0B55C4;
}

button {
	margin-top: 4px;
	background: #fff;
	border: 1px solid #ccc;
	text-decoration: none;
}

button:hover {
	cursor: pointer;
	background: #E8F6FE;
	text-decoration: none;
	border: 1px solid #aaa;
}
/* -- Fin BUTTON STYLES ----------------------------- */


/* Administrator forms, lists */
fieldset.adminform {
	margin: 10px;
	overflow: hidden;
}

fieldset.adminform legend {
	margin: 0;
	padding: 0;
}

ul.adminformlist,
ul.adminformlist li {
	margin: 0;
	padding: 0;
	list-style: none;
}

fieldset label,
fieldset span.faux-label {
	float: left;
	clear: left;
	display:block;
	margin: 5px 0;
}
fieldset ul {
	margin: 0;
	padding: 0;
}

form label,
form span.faux-label {
	font-size: 1.091em;
}

fieldset input,
fieldset textarea,
fieldset select,
fieldset img,
fieldset button {
	float: left;
	width: auto;
	margin: 5px 5px 5px 0;
}

fieldset.adminform textarea {
	width: 355px;
}

fieldset ul.checklist input {
	clear: left;
	margin-right: 10px;
}

fieldset ul.checklist label,
fieldset ul.menu-links label,
fieldset#filter-bar label {
	clear: none;
}
fieldset.adminform ul.checklist li {
	width: 100%;
	margin: 0;
	padding: 0;
}
fieldset.adminform ul.checklist li label {
	width: auto;
}

input.readonly {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 1.091em;
	padding-top: 1px;
	border: 0;
	font-weight: bold;
	color: #666;
}


/* Main toolbars */
div.toolbar-list {
	float: right;
	text-align: right;
	padding: 0;
}

div.toolbar-list ul {
	margin: 0;
	padding: 0;
}

div.toolbar-list li {
	padding: 1px 1px 3px 4px;
	text-align: center;
	color: #666;
	height: 48px;
	list-style: none;
	float: left;
}

div.toolbar-list li.spacer {
	width: 10px;
}

div.toolbar-list li.divider {
	border-right: 1px solid #c7c7c7;
	width: 2px;
}

div.toolbar-list span {
	float: none;
	width: 32px;
	height: 32px;
	margin: 0 auto;
	display: block;
}

div.toolbar-list a {
	display: block;
	float: left;
	white-space: nowrap;
	border: 1px solid #F4F4F4;
	padding: 1px 5px;
	cursor: pointer;
}

div.toolbar-list a:hover,
div.toolbar-list a:focus,
div.toolbar-list a:active {
	border-left: 1px solid #eee;
	border-top: 1px solid #eee;
	border-right: 1px solid #ccc;
	border-bottom: 1px solid #ccc;
	text-decoration: none;
	color: #0B55C4;
}
/* Fin Main toolbars */

/* -- TOOLBAR STYLES ----------------------------- */

/* Page titles */
div.pagetitle {
	padding-left: 60px;
	background-repeat: no-repeat;
	margin-left: 10px;
}

div.pagetitle h2 {
	line-height: 48px;
	font-size: 2em;
	font-weight: bold;
	color: #146295;
	margin: 0;
	padding: 0;
}

div.pagetitle span {
	color: #666;
}

/* -- TOOLBAR ICON STYLES ----------------------------- */
.icon-32-new						{	background-image: url(/webadmin/imagen/toolbar/icon-32-new.png);	}
.icon-32-new-excel					{	background-image: url(/webadmin/imagen/toolbar/icon-32-excel.png);	}
.icon-32-cancel						{	background-image: url(/webadmin/imagen/toolbar/icon-32-cancel.png);	}
.icon-32-trash						{	background-image: url(/webadmin/imagen/toolbar/icon-32-trash.png);	}
.icon-32-apply						{	background-image: url(/webadmin/imagen/toolbar/icon-32-apply.png);	}
.icon-32-edit						{	background-image: url(/webadmin/imagen/toolbar/icon-32-edit.png);	}

.icon-32-send						{	background-image: url(../images/toolbar/icon-32-send.png);	}
.icon-32-delete						{	background-image: url(../images/toolbar/icon-32-delete.png);	}
.icon-32-help						{	background-image: url(../images/toolbar/icon-32-help.png);	}

.icon-32-checkin					{	background-image: url(../images/toolbar/icon-32-checkin.png);	}
.icon-32-options					{	background-image: url(../images/toolbar/icon-32-config.png);	}

.icon-32-back						{	background-image: url(../images/toolbar/icon-32-back.png);	}
.icon-32-export						{	background-image: url(../images/toolbar/icon-32-export.png);	}
.icon-32-forward					{	background-image: url(../images/toolbar/icon-32-forward.png);	}
.icon-32-save						{	background-image: url(../images/toolbar/icon-32-save.png);	}

.icon-32-copy						{	background-image: url(../images/toolbar/icon-32-copy.png);	}
.icon-32-move						{	background-image: url(../images/toolbar/icon-32-move.png);	}
.icon-32-upload						{	background-image: url(../images/toolbar/icon-32-upload.png);	}
.icon-32-assign						{	background-image: url(../images/toolbar/icon-32-publish.png);	}
.icon-32-html						{	background-image: url(../images/toolbar/icon-32-html.png);	}
.icon-32-css						{	background-image: url(../images/toolbar/icon-32-css.png);	}
.icon-32-menus						{	background-image: url(../images/toolbar/icon-32-menu.png);	}
.icon-32-publish					{	background-image: url(../images/toolbar/icon-32-publish.png);	}
.icon-32-unblock					{	background-image: url(../images/toolbar/icon-32-unblock.png);	}
.icon-32-unpublish					{	background-image: url(../images/toolbar/icon-32-unpublish.png);	}
.icon-32-restore					{	background-image: url(../images/toolbar/icon-32-revert.png);	}
.icon-32-archive					{	background-image: url(../images/toolbar/icon-32-archive.png);	}
.icon-32-unarchive					{	background-image: url(../images/toolbar/icon-32-unarchive.png);	}
.icon-32-preview					{	background-image: url(../images/toolbar/icon-32-preview.png);	}
.icon-32-default					{	background-image: url(../images/toolbar/icon-32-default.png);	}
.icon-32-refresh					{	background-image: url(../images/toolbar/icon-32-refresh.png);	}
.icon-32-save-new					{	background-image: url(../images/toolbar/icon-32-save-new.png);	}
.icon-32-save-copy					{	background-image: url(../images/toolbar/icon-32-save-copy.png);	}
.icon-32-error						{	background-image: url(../images/toolbar/icon-32-error.png);	}
.icon-32-new-style					{	background-image: url(../images/toolbar/icon-32-new-style.png);	}
.icon-32-delete-style				{	background-image: url(../images/toolbar/icon-32-delete-style.png);	}
.icon-32-purge						{	background-image: url(../images/toolbar/icon-32-purge.png);	}
.icon-32-remove						{	background-image: url(../images/toolbar/icon-32-remove.png);	}
.icon-32-featured					{	background-image: url(../images/toolbar/icon-32-featured.png);	}
.icon-32-stats						{	background-image: url(../images/toolbar/icon-32-stats.png);	}
.icon-32-print						{	background-image: url(../images/toolbar/icon-32-print.png);	}
.icon-32-extension					{	background-image: url(../images/toolbar/icon-32-extension.png);	}
.toolbar-inactive					{	background-position: 0 32px;  }

/* -- Gestor Articulo ----------------------------- */
.icon-32-publicado-ok						{	background-image: url(../images/check1_50_50.png);	}

/* -- HEADER ICON STYLES ----------------------------- */

.icon-48-categories					{	background-image: url(/webadmin/imagen/header/icon-48-category.png);	}
.icon-48-content-category-add		{	background-image: url(/webadmin/imagen/header/icon-48-category-add.png);	}
.icon-48-category-add				{	background-image: url(/webadmin/imagen/header/icon-48-category-add.png);	}

.icon-48-sub-categories				{	background-image: url(/webadmin/imagen/header/icon-48-sub-category.png);	}
.icon-48-sub-category-add			{	background-image: url(/webadmin/imagen/header/icon-48-sub-category-add.png);	}


.icon-48-content-categories			{	background-image: url(/webadmin/imagen/header/icon-48-category.png);	}
.icon-48-contact-categories			{	background-image: url(/webadmin/imagen/header/icon-48-contacts-categories.png);	}
.icon-48-category-edit				{	background-image: url(../images/header/icon-48-category.png);	}

.icon-48-article-add				{	background-image: url(/webadmin/imagen/header/icon-48-article-add.png);	}
.icon-48-article-edit				{	background-image: url(../images/header/icon-48-article-edit.png);	}
.icon-48-article					{	background-image: url(/webadmin/imagen/header/icon-48-article.png);	}



.icon-48-generic					{	background-image: url(../images/header/icon-48-generic.png);	}
.icon-48-banners					{	background-image: url(../images/header/icon-48-banner.png);	}
.icon-48-banners-categories			{	background-image: url(../images/header/icon-48-banner-categories.png);	}
.icon-48-banners-category-edit		{	background-image: url(../images/header/icon-48-banner-categories.png);	}
.icon-48-banners-category-add		{	background-image: url(../images/header/icon-48-category-add.png);	}
.icon-48-banners-clients			{	background-image: url(../images/header/icon-48-banner-client.png);	}
.icon-48-banners-tracks				{	background-image: url(../images/header/icon-48-banner-tracks.png);	}
.icon-48-checkin					{	background-image: url(../images/header/icon-48-checkin.png);	}
.icon-48-clear						{	background-image: url(../images/header/icon-48-clear.png);	}
.icon-48-contact					{	background-image: url(../images/header/icon-48-contacts.png);	}
.icon-48-contact-category-edit		{	background-image: url(../images/header/icon-48-contacts-categories.png);	}
.icon-48-contact-category-add		{	background-image: url(../images/header/icon-48-category-add.png);	}
.icon-48-purge						{	background-image: url(../images/header/icon-48-purge.png);	}
.icon-48-cpanel						{	background-image: url(../images/header/icon-48-cpanel.png);	}
.icon-48-config						{	background-image: url(../images/header/icon-48-config.png);	}
.icon-48-groups						{	background-image: url(../images/header/icon-48-groups.png);	}
.icon-48-groups-add					{	background-image: url(../images/header/icon-48-groups-add.png);	}
.icon-48-levels						{	background-image: url(../images/header/icon-48-levels.png);	}
.icon-48-levels-add					{	background-image: url(../images/header/icon-48-levels-add.png);	}
.icon-48-module						{	background-image: url(../images/header/icon-48-module.png);	}
.icon-48-menu						{	background-image: url(../images/header/icon-48-menu.png);	}
.icon-48-menu-add					{	background-image: url(../images/header/icon-48-menu-add.png);	}
.icon-48-menumgr					{	background-image: url(../images/header/icon-48-menumgr.png);	}
.icon-48-newsfeeds-categories		{	background-image: url(../images/header/icon-48-newsfeeds-cat.png);	}
.icon-48-newsfeeds-category-edit	{	background-image: url(../images/header/icon-48-newsfeeds-cat.png);	}
.icon-48-newsfeeds-category-add		{	background-image: url(../images/header/icon-48-category-add.png);	}
.icon-48-trash						{	background-image: url(../images/header/icon-48-trash.png);	}
.icon-48-user						{	background-image: url(../images/header/icon-48-user.png);	}
.icon-48-user-add					{	background-image: url(../images/header/icon-48-user-add.png);	}
.icon-48-user-edit					{	background-image: url(../images/header/icon-48-user-edit.png);	}
.icon-48-user-profile					{	background-image: url(../images/header/icon-48-user-profile.png);	}
.icon-48-inbox						{	background-image: url(../images/header/icon-48-inbox.png);	}
.icon-48-new-privatemessage			{	background-image: url(../images/header/icon-48-new-privatemessage.png);	}
.icon-48-msgconfig					{	background-image: url(../images/header/icon-48-message_config.png);	}
.icon-48-langmanager				{	background-image: url(../images/header/icon-48-language.png);	}
.icon-48-mediamanager				{	background-image: url(../images/header/icon-48-media.png);	}
.icon-48-plugin						{	background-image: url(../images/header/icon-48-plugin.png);	}
.icon-48-help_header				{	background-image: url(../images/header/icon-48-help_header.png);	}
.icon-48-impressions				{	background-image: url(../images/header/icon-48-stats.png);	}
.icon-48-browser					{	background-image: url(../images/header/icon-48-stats.png);	}
.icon-48-searchtext					{	background-image: url(../images/header/icon-48-stats.png);	}
.icon-48-thememanager				{	background-image: url(../images/header/icon-48-themes.png);	}
.icon-48-writemess					{	background-image: url(../images/header/icon-48-writemess.png);	}
.icon-48-featured					{	background-image: url(../images/header/icon-48-featured.png);	}
.icon-48-sections					{	background-image: url(../images/header/icon-48-section.png);	}

.icon-48-content-category-edit		{	background-image: url(../images/header/icon-48-category.png);	}

.icon-48-install					{	background-image: url(../images/header/icon-48-extension.png);	}
.icon-48-dbbackup					{	background-image: url(../images/header/icon-48-backup.png);	}
.icon-48-dbrestore					{	background-image: url(../images/header/icon-48-dbrestore.png);	}
.icon-48-dbquery					{	background-image: url(../images/header/icon-48-query.png);	}
.icon-48-systeminfo					{	background-image: url(../images/header/icon-48-info.png);	}
.icon-48-massmail					{	background-image: url(../images/header/icon-48-massmail.png);	}
.icon-48-redirect					{	background-image: url(../images/header/icon-48-redirect.png);	}
.icon-48-search						{	background-image: url(../images/header/icon-48-search.png);	}
.icon-48-finder						{	background-image: url(../images/header/icon-48-search.png);	}
.icon-48-newsfeeds					{	background-image: url(../images/header/icon-48-newsfeeds.png);	}
.icon-48-newsfeeds-cat				{	background-image: url(../images/header/icon-48-newsfeeds-cat.png);	}
.icon-48-weblinks					{	background-image: url(../images/header/icon-48-links.png);	}
.icon-48-weblinks-categories		{	background-image: url(../images/header/icon-48-links-cat.png);	}
.icon-48-weblinks-category-edit		{	background-image: url(../images/header/icon-48-links-cat.png);	}
.icon-48-weblinks-category-add		{	background-image: url(../images/header/icon-48-category-add.png);	}

/* Adminlist grids */

table.adminlist {
	width: 100%;
	border-spacing: 1px;
	background-color: #f3f3f3;
	color: #666;
}

table.adminlist td,
table.adminlist th {
	padding: 4px;
}

table.adminlist td {padding-left: 8px;}

table.adminlist thead th {
	text-align: center;
	background: #f7f7f7;
	color: #666;
	border-bottom: 1px solid #CCC;
	border-left: 1px solid #fff;
}

table.adminlist thead th.left {
	text-align: left;
}

table.adminlist thead a:hover {
	text-decoration: none;
}

table.adminlist thead th img {
	vertical-align: middle;
	padding-left: 3px;
}

table.adminlist tbody th {
	font-weight: bold;
}

table.adminlist tbody tr {
	background-color: #fff;
	text-align: left;
}

table.adminlist tbody tr.row0:hover td,
table.adminlist tbody tr.row1:hover td	{
	background-color: #e8f6fe;
}

table.adminlist tbody tr td {
	background: #fff;
	border: 1px solid #fff;
}

table.adminlist tbody tr.row1 td {
	background: #f0f0f0;
	border-top: 1px solid #FFF;
}

table.adminlist tfoot tr {
	text-align: center;
	color: #333;
}

table.adminlist tfoot td,table.adminlist tfoot th {
	background-color: #f7f7f7;
	border-top: 1px solid #999;
	text-align: center;
}

table.adminlist td.order {
	text-align: center;
	white-space: nowrap;
	width: 200px;
}

table.adminlist td.order span {
	float: left;
	width: 20px;
	text-align: center;
	background-repeat: no-repeat;
	height: 13px;
}

table.adminlist .pagination {
	display: inline-block;
	padding: 0;
	margin: 0 auto;
}

/* Tree indentation & nesting - Up to 10 levels deep so don't go crazy :) */
table.adminlist td.indent-4 	{	padding-left: 4px;		}
table.adminlist td.indent-19 	{	padding-left: 19px;		}
table.adminlist td.indent-34 	{	padding-left: 34px;		}
table.adminlist td.indent-49 	{	padding-left: 49px;		}
table.adminlist td.indent-64 	{	padding-left: 64px;		}
table.adminlist td.indent-79 	{	padding-left: 79px;		}
table.adminlist td.indent-94 	{	padding-left: 94px;		}
table.adminlist td.indent-109 	{	padding-left: 109px;	}
table.adminlist td.indent-124 	{	padding-left: 124px;	}
table.adminlist td.indent-139 	{	padding-left: 139px;	}

table.adminlist tr td.btns a {
	text-decoration: underline;
}

/* -- FORM STYLES ----------------------------- */

/* Standards for commonly used elements */
div.width-20	{width: 20%;}
div.width-30	{width: 30%;}
div.width-35	{width: 35%;}
div.width-40	{width: 40%;}
div.width-45	{width: 45%;}
div.width-50	{width: 50%;}
div.width-55	{width: 55%;}
div.width-60	{width: 60%;}
div.width-65	{width: 65%;}
div.width-70	{width: 70%;}
div.width-80	{width: 80%;}
div.width-100	{width: 100%;}

.clrlft		{clear: left;}
.clrrt		{clear: right;}
.fltlft		{float: left;}
.fltrt		{float: right;}
.fltnone	{float: none;}

div.width-20 fieldset,
div.width-30 fieldset,
div.width-35 fieldset,
div.width-40 fieldset,
div.width-45 fieldset,
div.width-50 fieldset,
div.width-55 fieldset,
div.width-60 fieldset,
div.width-65 fieldset,
div.width-70 fieldset,
div.width-80 fieldset,
div.width-100 fieldset	{
	background-color: #fff;
	padding: 5px 17px 17px 17px;
}

/* -- PANE SLIDER STYLES ----------------------------- */
.pane-sliders {
	margin: 18px 0 0 0;
	position:relative;
}
.pane-sliders .title {
	margin: 0;
	padding: 2px 2px 2px 5px;
	color: #666;
	cursor: pointer;
}

#content-pane {
	margin: 8px 10px 15px 15px;
}

.pane-sliders .panel {
	margin-bottom: 3px;
	border:solid 1px #ccc;
}

.pane-sliders .panel h3 {
	background: #fafafa;
	color: #666;
}

.pane-sliders .content {
	background: #fff;
}

.pane-sliders .adminlist {
	border: 0 none;
	font-size: 1em;
}

.pane-sliders .adminlist td {
	border: 0 none;
}

.pane-toggler span {
	background: transparent url(../images/j_arrow.png) 5px 50% no-repeat;
	padding-left: 20px;
}

.pane-toggler-down span {
	background: transparent url(../images/j_arrow_down.png) 5px 50% no-repeat;
	padding-left: 20px;
}

.pane-toggler-down {
	border-bottom: 1px solid #ccc;
}

h3.pane-toggler-down a:hover,
h3.pane-toggler a:hover {
	text-decoration: none;
}

.pane-slider.pane-hide {
	display: none;
}

.pane-slider ol li {
	list-style: none;
	margin-left: -25px;
	margin-top: 10px;
}

input#jformparams_link_titles1,
input#jformparams_show_title1,
input#jformparams_link_category1 {
	margin-left: 13px;
}

div#position-icon.pane-sliders div.pane-down div.icon-wrapper {
	margin: 5px 0 5px 0;
}

div#position-icon.pane-sliders div.pane-down .icon-wrapper .icon {
	padding: 5px 0 5px 10px;
	margin: 0;
}

div#position-icon.pane-sliders .icon {
	background: #fff;
}

/* -- TAB STYLES ----------------------------- */
dl.tabs {
	float: left;
	margin: 10px 0 -1px 0;
	z-index: 50;
}

dl.tabs dt {
	float: left;
	padding: 4px 10px;
	border: 1px solid #ccc;
	margin-left: 3px;
	background: #e9e9e9;
	color: #666;
}

dl.tabs dt.open {
	background: #F9F9F9;
	border-bottom: 1px solid #f9f9f9;
	z-index: 100;
	color: #000;
}

div.current {
	clear: both;
	border: 1px solid #ccc;
	padding: 10px 10px;
}

div.current dd {
	padding: 0;
	margin: 0;
}

dl#content-pane.tabs {
	margin: 1px 0 0 0;
}

div.current label,
div.current span.faux-label {
	display: block;
	min-width: 150px;
	float: left;
	clear: left;
	margin-top: 8px;
}

div.current fieldset {
	border: none 0;
}

div.current fieldset.adminform {
	border: 1px #ccc solid;
}

div.current fieldset.radio {
	float: left;
}

div.current fieldset.radio input {
	clear: none;
	min-width: 15px;
	float: left;
	margin: 3px 0 0 2px;
}

div.current fieldset.radio label {
	clear: none;
	min-width: 45px;
	float: left;
	margin: 3px 0 0 5px;
}

div.current fieldset.checkboxes {
	float: left;
	clear: right;
}

div.current fieldset.checkboxes input {
	clear: left;
	min-width: 15px;
	float: left;
	margin: 3px 0 0 2px;
}

div.current fieldset.checkboxes label {
	clear: right;
	min-width: 45px;
	margin: 3px 0 0 5px;
}

div.current input,
div.current textarea,
div.current select {
	clear: none;
	float: left;
	margin: 3px 0 0 2px;
}

div.current select {
	margin-bottom: 15px;
}

p.tab-description {
	font-size: 1.091em;
	margin-left: 0;
	margin-top: 5px;
}

/* Required elements */
input.required {
	background-color: #d5eeff;
}

.star {
	color:#EB8207;
	font-size:1.2em;
}

/* Field label widths - long label */
fieldset.adminform.long label,
fieldset.adminform.long span.faux-label {
	min-width: 180px;
}

/* Field label widths - short label */
fieldset.adminform label,
fieldset.adminform span.faux-label {
	min-width: 135px;
	padding: 0 5px 0 0;
}

fieldset.panelform {
	overflow: hidden;
	clear: both;
}
fieldset.panelform label,
fieldset.panelform div.paramrow label,
fieldset.panelform span.faux-label {
	min-width: 145px;
	max-width: 250px;
	padding: 0 5px 0 0;
}
</style> 