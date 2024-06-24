<?php
define( 'Theme_Name', 'Blog' );
define( 'Theme_URL', get_template_directory_uri() );
/*Theme Setup*/
require_once dirname( __FILE__ ) . '/function/theme-setup.php';
require_once dirname( __FILE__ ) . '/function/helpers.php';
require_once dirname( __FILE__ ) . '/function/ajax.php';
require_once dirname( __FILE__ ) . '/function/wp_bootstrap_navwalker.php';
require_once dirname( __FILE__ ) . '/function/custom-woocommerce.php';
require_once dirname( __FILE__ ) . '/function/post-type.php';
/*Custom Admin */
require_once dirname( __FILE__ ) . '/admin/customize-admin.php';
require_once dirname( __FILE__ ) . '/admin/admin-init.php';
/*Header Structure*/
require_once dirname( __FILE__ ) . '/structure/structure-header.php';
require_once dirname( __FILE__ ) . '/structure/structure-footer.php';
require_once dirname( __FILE__ ) . '/structure/structure-posts.php';
/*Theme Widgets*/
require get_template_directory() . '/inc/widgets/widget-recent-posts.php';
/*Posttype Register*/
