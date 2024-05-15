<?php
function krowd_custom_color_theme() {
   $theme_color = krowd_get_option('color_theme', '');
   $theme_color_second = krowd_get_option('color_theme_second', '');
   if( !empty($theme_color) || !empty($theme_color_second) ){ 
      ob_start();

   /* ----- Style Color Theme ----- */
?>

<?php if( !empty($theme_color) ){ ?>

.btn-link:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.page-link:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.page-links > a:hover, .page-links > span:not(.page-links-title):hover {
   border-color: 1px solid <?php echo esc_attr($theme_color) ?>;
}
.page-links > span:not(.page-links-title) {
   border: 1px solid <?php echo esc_attr($theme_color) ?>;
}
.page-links .post-page-numbers:hover {
   border-color: <?php echo esc_attr($theme_color) ?>;
}
.page-links span.post-page-numbers {
   border-color: <?php echo esc_attr($theme_color) ?>;
}
ul.feature-list > li:after, ul.list-style-1 > li:after {
   color: <?php echo esc_attr($theme_color) ?>;
}
ul.list-style-2 > li {
   color: <?php echo esc_attr($theme_color) ?>;
}
.pager .paginations a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.pager .paginations a.active {
   background: <?php echo esc_attr($theme_color) ?>;
   border-color: <?php echo esc_attr($theme_color) ?>;
}
.bg-theme {
   background: <?php echo esc_attr($theme_color) ?> !important;
}
.bg-theme-2 {
   background: <?php echo esc_attr($theme_color) ?> !important;
}
.text-theme {
   color: <?php echo esc_attr($theme_color) ?> !important;
}
.hover-color-theme a:hover {
   color: <?php echo esc_attr($theme_color) ?> !important;
}
.btn-theme, .btn, .btn-white, .btn-theme-2, .btn-theme-2 input[type*="submit"], .btn-black, input[type*="submit"]:not(.fa):not(.btn-theme), #tribe-events .tribe-events-button, .tribe-events-button {
   background: <?php echo esc_attr($theme_color) ?>;
}
#tribe-events .tribe-events-button:hover, .tribe-events-button:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.btn-inline {
   color: <?php echo esc_attr($theme_color) ?>;
}
.socials a i {
   background: <?php echo esc_attr($theme_color) ?>;
}
.socials-2 li a i:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.alert-danger {
   background: <?php echo esc_attr($theme_color) ?>;
}
.desc-slider a {
   color: <?php echo esc_attr($theme_color) ?>;
}
#wp-footer a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.topbar .topbar-information i {
   color: <?php echo esc_attr($theme_color) ?>;
}
.topbar .header-right .header-social .socials > li a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.topbar .header-right .mini-cart-header .mini-cart .mini-cart-items {
   background: <?php echo esc_attr($theme_color) ?>;
}
.header-mobile .topbar-mobile a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.header-mobile .topbar-mobile .topbar-user .login-register .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.header-mobile .topbar-mobile .create-a-project .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.header-mobile .header-mobile-content .mini-cart-header a.mini-cart .mini-cart-items {
   background: <?php echo esc_attr($theme_color) ?>;
}
ul.gva-nav-menu > li:hover > a, ul.gva-nav-menu > li:active > a, ul.gva-nav-menu > li:focus > a, ul.gva-nav-menu > li.current_page_parent > a {
   color: <?php echo esc_attr($theme_color) ?>;
}
ul.gva-nav-menu > li .submenu-inner li a:hover, ul.gva-nav-menu > li .submenu-inner li a:focus, ul.gva-nav-menu > li .submenu-inner li a:active, ul.gva-nav-menu > li ul.submenu-inner li a:hover, ul.gva-nav-menu > li ul.submenu-inner li a:focus, ul.gva-nav-menu > li ul.submenu-inner li a:active {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gavias-off-canvas-toggle {
   background: <?php echo esc_attr($theme_color) ?>;
}
#gavias-off-canvas .off-canvas-top .top-social > a:hover {
   background: <?php echo esc_attr($theme_color) ?>;
   border-color: <?php echo esc_attr($theme_color) ?>;
}
#gavias-off-canvas .off-canvas-top .gavias-off-canvas-close:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
#gavias-off-canvas ul#menu-main-menu > li > a.active > a {
   color: <?php echo esc_attr($theme_color) ?>;
}
#gavias-off-canvas ul#menu-main-menu > li .submenu-inner.dropdown-menu li a:hover, #gavias-off-canvas ul#menu-main-menu > li .submenu-inner.dropdown-menu li a:focus {
   color: <?php echo esc_attr($theme_color) ?>;
}
#gavias-off-canvas ul#menu-main-menu > li .submenu-inner.dropdown-menu li.active > a {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-offcanvas-content a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-offcanvas-content .close-canvas a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li.menu-item-has-children .caret:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li ul.submenu-inner li a:hover, .gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li div.submenu-inner li a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.megamenu-main .widget.widget-html ul li strong {
   color: <?php echo esc_attr($theme_color) ?>;
}
.col-bg-theme-inner > .elementor-column-wrap > .elementor-widget-wrap {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-productscategory-navigation .widget-title {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-products-list .widget-title {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-social-links.style-v2 ul.socials > li > a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-team .team-position {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-team.team-horizontal .team-header .social-list a:hover {
   color: <?php echo esc_attr($theme_color) ?> !important;
}
.gsc-team.team-horizontal .team-name:after {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-team.team-vertical .team-body .info {
   background: <?php echo esc_attr($theme_color) ?>;
}
.post-small .post .cat-links a {
   color: <?php echo esc_attr($theme_color) ?>;
}
.elementor-widget-icon-box.icon-color-theme .elementor-icon, .elementor-widget-icon-box.icon-color-theme .elementor-icon-list-icon, .elementor-widget-icon-list.icon-color-theme .elementor-icon, .elementor-widget-icon-list.icon-color-theme .elementor-icon-list-icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.elementor-widget-icon-box.hover-color-theme a:hover, .elementor-widget-icon-list.hover-color-theme a:hover {
   color: <?php echo esc_attr($theme_color) ?> !important;
}
.gva-content-horizontal .content-hover-horizontal .content-item .content .action svg {
   fill: <?php echo esc_attr($theme_color) ?>;
}
.gsc-career .box-content .job-type {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-hover-box-carousel .hover-box-item .box-content .box-icon {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-countdown {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box .highlight-icon .box-icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box .highlight-icon .box-icon svg {
   fill: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box .highlight-icon .icon-container {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box-group.style-1 .icon-box-item-content .icon-box-item-inner .box-icon i {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box-group.style-1 .icon-box-item-content .icon-box-item-inner .box-icon svg {
   fill: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box-styles.style-1 .icon-box-inner .box-icon {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box-styles.style-1:hover .icon-inner .box-icon:before {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box-styles.style-2 .box-icon {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-icon-box-styles.style-2:hover .icon-inner .box-icon:before {
   background: <?php echo esc_attr($theme_color) ?>;
}
.milestone-block.style-2 .box-content {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gallery-post a.zoomGallery {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-heading .heading-video .video-link {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-heading .title .highlight, .gsc-heading .title strong {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-heading .sub-title {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-image-content.skin-v1 .line-color:after {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-image-content.skin-v2 .box-content .read-more svg {
   fill: <?php echo esc_attr($theme_color) ?>;
}
.gsc-image-content.skin-v4 .box-content .read-more svg {
   fill: <?php echo esc_attr($theme_color) ?>;
}
.gva-posts-grid .posts-grid-filter ul.nav-tabs > li > a.active {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-carousel.style-1 .testimonial-item .testimonial-content .quote-icon {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-carousel.style-1 .testimonial-item .testimonial-content .testimonial-information span.testimonial-job {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-carousel.style-2 .testimonial-item .testimonial-information span.testimonial-name {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-carousel.style-2 .testimonial-item .testimonial-information span.dot {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-carousel.style-2 .testimonial-item:hover .icon-quote {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-single.style-1 .testimonial-item .testimonial-content .testimonial-left .testimonial-name {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-single.style-1 .owl-nav .owl-prev:hover, .gva-testimonial-single.style-1 .owl-nav .owl-next:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-single.style-1 .owl-nav .owl-prev.owl-next, .gva-testimonial-single.style-1 .owl-nav .owl-next.owl-next {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-testimonial-single.style-2 .testimonial-item .testimonial-video .video-link {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-video-box.style-1 .video-inner .video-action .popup-video {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-video-carousel .video-item-inner .video-link {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-pricing.style-1 .content-inner .plan-price .price-value {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-pricing.style-1 .content-inner .plan-price .interval {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-pricing.style-1 .content-inner .plan-list li .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-pricing.style-2 .content-inner .price-meta .plan-price .price-value {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-pricing.style-2 .content-inner .price-meta .plan-price .interval {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-socials ul.social-links li a {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-tabs-content .nav_tabs > li a.active {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gsc-tabs-content .tab-content .tab-pane .tab-content-item ul > li:after {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-locations-map .makers .location-item .maker-item-inner .right .location-title:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-locations-map .makers .location-item .maker-item-inner:hover .location-title, .gva-locations-map .makers .location-item .maker-item-inner.active .location-title {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-locations-map .makers .location-item .maker-item-inner:hover .icon, .gva-locations-map .makers .location-item .maker-item-inner.active .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gsc-work-process .box-content .number-text {
   background: <?php echo esc_attr($theme_color) ?>;
}
.gva-user .login-account .profile:hover, .topbar-mobile .login-account .profile:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-user .login-register a .icon, .topbar-mobile .login-register a .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.gva-user .login-register a:hover, .topbar-mobile .login-register a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.widget .widget-title:after, .widget .widgettitle:after, .widget .wpb_singleimage_heading:after, .wpb_single_image .widget-title:after, .wpb_single_image .widgettitle:after, .wpb_single_image .wpb_singleimage_heading:after, .wpb_content_element .widget-title:after, .wpb_content_element .widgettitle:after, .wpb_content_element .wpb_singleimage_heading:after {
   background: <?php echo esc_attr($theme_color) ?>;
}
.color-theme .widget-title, .color-theme .widgettitle {
   color: <?php echo esc_attr($theme_color) ?> !important;
}
.wp-sidebar ul li a:hover, .elementor-widget-sidebar ul li a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.wp-sidebar .post-author, .wp-sidebar .post-date, .elementor-widget-sidebar .post-author, .elementor-widget-sidebar .post-date {
   color: <?php echo esc_attr($theme_color) ?>;
}
 #wp-footer .widget ul li a:hover, #wp-footer .wpb_single_image ul li a:hover, #wp-footer .widget_nav_menu ul li a:hover {
   color: <?php echo esc_attr($theme_color) ?> !important;
}
.widget_tag_cloud .tagcloud > a:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.mailchimp-small .newsletter-form .form-left input[type="email"]:focus {
   border: 1px solid <?php echo esc_attr($theme_color) ?>;
}
.mailchimp-small .newsletter-form .form-right {
   background: <?php echo esc_attr($theme_color) ?>;
}
.mailchimp-small .newsletter-form .form-right .form-action {
   background: <?php echo esc_attr($theme_color) ?>;
}
.widget_categories ul > li > a:hover, .widget_archive ul > li > a:hover, .wp-sidebar .widget_nav_menu ul > li > a:hover, #wp-footer .widget_nav_menu ul > li > a:hover, .elementor-widget-sidebar .widget_nav_menu ul > li > a:hover, .widget_pages ul > li > a:hover, .widget_meta ul > li > a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.widget_categories ul > li.current_page_item > a, .widget_archive ul > li.current_page_item > a, .wp-sidebar .widget_nav_menu ul > li.current_page_item > a, #wp-footer .widget_nav_menu ul > li.current_page_item > a, .elementor-widget-sidebar .widget_nav_menu ul > li.current_page_item > a, .widget_pages ul > li.current_page_item > a, .widget_meta ul > li.current_page_item > a {
   color: <?php echo esc_attr($theme_color) ?>;
}
.widget_rss ul > li a .post-date, .widget_recent_entries ul > li a .post-date {
   color: <?php echo esc_attr($theme_color) ?>;
}
.widget_rss > ul li .rss-date {
   color: <?php echo esc_attr($theme_color) ?>;
}
.opening-time .phone {
   color: <?php echo esc_attr($theme_color) ?>;
}
.widget_gva_give_categories_widget ul.categories-listing li:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.support-box {
   background: <?php echo esc_attr($theme_color) ?>;
}
.download-box a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.post .entry-meta .entry-date {
   background: <?php echo esc_attr($theme_color) ?>;
}
.post .tag-links > a:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.post-style-2 .entry-content .entry-meta .right i {
   color: <?php echo esc_attr($theme_color) ?>;
}
.post-style-2 .entry-content .read-more .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.post-style-2:hover .entry-content .entry-meta .left {
   border-color: <?php echo esc_attr($theme_color) ?>;
}
.single.single-post #wp-content > article.post .entry-meta .cat-links a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.single.single-post #wp-content > article.post .post-content input[type="submit"] {
   background: <?php echo esc_attr($theme_color) ?>;
}
.post-navigation a:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.tribe-event-list-block .tribe-event-left .content-inner .tribe-start-date {
   background: <?php echo esc_attr($theme_color) ?>;
}
.tribe-event-list-block .tribe-event-right .content-inner .tribe-events-event-meta .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.tribe-event-list-block.v2 .event-action a {
   background: <?php echo esc_attr($theme_color) ?> !important;
}
.tribe-events-single .tribe-events-schedule .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-single-detail .tribe-event-single-meta-detail > div .icon {
   color: <?php echo esc_attr($theme_color) ?>;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-meta-bottom .event-single-organizer > .content-inner .meta-item .icon svg {
   fill: <?php echo esc_attr($theme_color) ?>;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-meta-bottom .event-single-venue > .content-inner {
   background: <?php echo esc_attr($theme_color) ?>;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-meta-bottom .event-single-venue > .content-inner:after {
   background: <?php echo esc_attr($theme_color) ?>;
}
.post-type-archive-tribe_events #tribe-events-bar #tribe-bar-form .tribe-bar-submit .tribe-events-button, .tribe-events-shortcode #tribe-events-bar #tribe-bar-form .tribe-bar-submit .tribe-events-button {
   background: <?php echo esc_attr($theme_color) ?>;
}
.post-type-archive-tribe_events table.tribe-events-calendar tbody td .tribe-events-tooltip .tribe-events-event-body .tribe-event-duration, .tribe-events-shortcode table.tribe-events-calendar tbody td .tribe-events-tooltip .tribe-events-event-body .tribe-event-duration {
   color: <?php echo esc_attr($theme_color) ?>;
}
.post-type-archive-tribe_events table.tribe-events-calendar tbody td:hover, .tribe-events-shortcode table.tribe-events-calendar tbody td:hover {
   border-bottom: 2px solid <?php echo esc_attr($theme_color) ?> !important;
}
.portfolio-v1 .images .link:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.portfolio-v1 .portfolio-content .content-inner .portfolio-meta {
   color: <?php echo esc_attr($theme_color) ?>;
}
.portfolio-v1 .portfolio-content .content-inner .portfolio-meta a {
   color: <?php echo esc_attr($theme_color) ?>;
}
.portfolio-v1:hover .portfolio-content .content-inner .arrow, .portfolio-v1:active .portfolio-content .content-inner .arrow, .portfolio-v1:focus .portfolio-content .content-inner .arrow {
   background: <?php echo esc_attr($theme_color) ?>;
}
.portfolio-v2 .images .link:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.portfolio-v2 .portfolio-content:after {
   background: <?php echo esc_attr($theme_color) ?>;
}
.portfolio-v2:hover .portfolio-content, .portfolio-v2:active .portfolio-content, .portfolio-v2:focus .portfolio-content {
   background: <?php echo esc_attr($theme_color) ?>;
}
.portfolio-filter ul.nav-tabs > li > a.active {
   color: <?php echo esc_attr($theme_color) ?>;
}
.service-block .service-content .content-inner .readmore a {
   color: <?php echo esc_attr($theme_color) ?>;
}
.team-progress-wrapper .team__progress .team__progress-bar {
   background: <?php echo esc_attr($theme_color) ?>;
}
.team-progress-wrapper .team__progress .team__progress-bar .percentage {
   background: <?php echo esc_attr($theme_color) ?>;
}
.team-progress-wrapper .team__progress .team__progress-bar .percentage:after {
   border-top-color: <?php echo esc_attr($theme_color) ?>;
}
.team-block.team-v1 .team-content .socials-team a:hover {
   background: <?php echo esc_attr($theme_color) ?>;
   border-color: <?php echo esc_attr($theme_color) ?>;
}
.team-block.team-v2 .team-image .socials-team a {
   background: <?php echo esc_attr($theme_color) ?>;
}
.team-block-single .heading:after {
   background: <?php echo esc_attr($theme_color) ?>;
}
.team-block-single .team-job {
   color: <?php echo esc_attr($theme_color) ?>;
}
.team-block-single .team-quote:after {
   color: <?php echo esc_attr($theme_color) ?>;
}
.team-block-single .socials-team a:hover {
   background: <?php echo esc_attr($theme_color) ?>;
   border-color: <?php echo esc_attr($theme_color) ?>;
}
.removecampaignupdate, .wp-crowd-btn-primary, .wpneo-edit-btn, .wp-crowd-btn, .wpneo-cancel-btn, .wpneo-save-btn, .wpneo-image-upload, #wpneo_active_edit_form, .wpneo-image-upload-btn {
   background: <?php echo esc_attr($theme_color) ?>;
}
.campaign-block .campaign-image .campaign_loved_html .wpneo-icon.wpneo-icon-love-full {
   background: <?php echo esc_attr($theme_color) ?>;
}
.campaign-block .campaign-content .campaign-meta .campaign-categories {
   background: <?php echo esc_attr($theme_color) ?>;
}
.campaign-block .campaign-content .campaign-goal .value-goal {
   color: <?php echo esc_attr($theme_color) ?>;
}
.campaign-block-2 .campaign-image .campaign_loved_html .wpneo-icon.wpneo-icon-love-full {
   background: <?php echo esc_attr($theme_color) ?>;
}
.campaign-block-2 .campaign-content .campaign-meta .campaign-categories {
   background: <?php echo esc_attr($theme_color) ?>;
}
.campaign-block-2:hover .campaign-content .campaign-title .title a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.campaign-block-2:hover .campaign-content .campaign-raised .value-goal {
   color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-left .woocommerce-product-gallery__trigger:hover {
   background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-left .campaign_loved_html .wpneo-icon.wpneo-icon-love-full, .wpneo-list-details .campaign-top .campaign-single-left #campaign_loved_html .wpneo-icon.wpneo-icon-love-full {
   background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-left .wpneo-post-img #campaign_loved_html .wpneo-icon.wpneo-icon-love-full {
   background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-right .campaign-meta .campaign-categories {
   background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-right .campaign-info .info-item .info-value {
   color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-right .campaign-goal .value-goal {
   color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-right .wpneo-single-sidebar .wpcf_predefined_pledge_amount li a:hover, .wpneo-list-details .campaign-top .campaign-single-right .wpneo-single-sidebar .wpcf_predefined_pledge_amount li a:focus {
   border-color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-right .wpneo-single-sidebar .cart input.input-text:focus {
   border-color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-bottom .wpneo-tabs .wpneo-tabs-menu > li a {
   background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-bottom .tab-rewards .tab-rewards-wrapper > div .reward-title .amount {
   color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-bottom .tab-rewards .tab-rewards-wrapper > div .reward-meta i {
   color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-bottom #wpneo-tab-reviews .comment-form-rating .stars a.active:after, .wpneo-list-details .campaign-bottom #wpneo-tab-reviews .comment-form-rating .stars a:hover:after {
   color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .campaign-bottom #wpneo-tab-update .campaign_update_wrapper ul.wpneo-crowdfunding-update > li:hover .round-circle {
   background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-list-details .project-related > .content-inner .widget-heading .widget-subtitle {
   color: <?php echo esc_attr($theme_color) ?>;
}
.pagination .disabled {
   background: <?php echo esc_attr($theme_color) ?>;
}
.pagination .current {
   background: <?php echo esc_attr($theme_color) ?>;
}
.not-found-wrapper .not-found-home > a {
   background: <?php echo esc_attr($theme_color) ?>;
}
.content-page-index .post-masonry-index .post.sticky .entry-content:after {
   color: <?php echo esc_attr($theme_color) ?>;
}
 #comments #add_review_button,
 #comments #submit {
   background: <?php echo esc_attr($theme_color) ?>;
}
 #comments #reply-title {
   color: <?php echo esc_attr($theme_color) ?>;
}
 #comments ol.comment-list .the-comment .comment-rate .on {
   color: <?php echo esc_attr($theme_color) ?>;
}
 #comments ol.comment-list .the-comment .comment-info:after {
   background: <?php echo esc_attr($theme_color) ?>;
}
 #comments ol.comment-list .the-comment .comment-info a:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
 #comments ol.comment-list .the-comment .comment-reply-link {
   color: <?php echo esc_attr($theme_color) ?>;
}
.comment-rating .comment-star-rating > li a.active {
   color: <?php echo esc_attr($theme_color) ?>;
}
.owl-carousel .owl-dots .owl-dot, .flex-control-nav .owl-dots .owl-dot, .ctf-tweets .owl-dots .owl-dot {
   background: <?php echo esc_attr($theme_color) ?>;
}
 ul.nav-tabs > li > a:hover, ul.nav-tabs > li > a:focus, ul.nav-tabs > li > a:active {
   color: <?php echo esc_attr($theme_color) ?>;
}
 ul.nav-tabs > li.active > a {
   background: <?php echo esc_attr($theme_color) ?> !important;
}
.btn-slider-white {
}
.btn-slider-white:hover, .btn-slider-white:focus, .btn-slider-white:active {
   background: <?php echo esc_attr($theme_color) ?>;
}
.tweet-1 .ctf-type-usertimeline {
   background: <?php echo esc_attr($theme_color) ?>;
}
.tweet-1 .ctf-type-usertimeline .ctf-tweets .ctf-item svg:hover, .tweet-1 .ctf-type-usertimeline .ctf-tweets .ctf-item i:hover {
   color: <?php echo esc_attr($theme_color) ?>;
}
.tweet-2 .ctf-type-usertimeline .ctf-item .ctf-tweet-text a {
   color: <?php echo esc_attr($theme_color) ?>;
}
.tweet-2 .ctf-type-usertimeline .ctf-item .ctf-tweet-text a:hover, .tweet-2 .ctf-type-usertimeline .ctf-item .ctf-tweet-text a:focus {
   color: <?php echo esc_attr($theme_color) ?>;
}
.tweet-2 .ctf-type-usertimeline .ctf-item .ctf-author-box .ctf-author-box-link .ctf-author-screenname {
   color: <?php echo esc_attr($theme_color) ?> !important;
}

.wpneo-links .wpneo-links-list a:hover, .wpneo-links .wpneo-links-list a:focus {
  color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-listings-dashboard .wpneo-listing-content p.wpneo-author a {
  color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-dashboard-summary ul li.active {
  background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-tabs-menu li.wpneo-current {
  border-bottom: 3px solid <?php echo esc_attr($theme_color) ?>;
}
.wpneo-pagination ul li a:hover,
.wpneo-pagination ul li span.current {
  border: 1px solid <?php echo esc_attr($theme_color) ?>;
}
.wpneo-dashboard-summary ul li.active:after {
  border-color: <?php echo esc_attr($theme_color) ?> rgba(0, 128, 0, 0) rgba(255, 255, 0, 0) rgba(0, 0, 0, 0);
}
.wpneo-links div a:hover .wpcrowd-arrow-down, .wpneo-links div.active a .wpcrowd-arrow-down {
  border: solid <?php echo esc_attr($theme_color) ?>;
}
.wpneo-single .wpneo-image-upload-btn {
  background: <?php echo esc_attr($theme_color) ?>;
}
#wpneofrontenddata .wpneo-form-action input[type="submit"].wpneo-submit-campaign {
  background: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-listings .wpneo-listing-content .wpneo-author a {
  color: <?php echo esc_attr($theme_color) ?>;
}
.wpneo-profile-button {
  background-color: <?php echo esc_attr($theme_color) ?>;
}

.woocommerce-tabs .nav-tabs > li.active > a {
  color: <?php echo esc_attr($theme_color) ?>;
}
.woocommerce-tab-product-info .submit {
  background: <?php echo esc_attr($theme_color) ?>;
}
.minibasket.light i {
  color: <?php echo esc_attr($theme_color) ?>;
}

table.variations a.reset_variations {
  color: <?php echo esc_attr($theme_color) ?> !important;
}
.single-product .social-networks > li a:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.single-product .image_frame .woocommerce-product-gallery__trigger:hover {
  background: <?php echo esc_attr($theme_color) ?>;
}
.single-product .image_frame .onsale {
  background: <?php echo esc_attr($theme_color) ?>;
}
.single-product ol.flex-control-nav.flex-control-thumbs .owl-item img.flex-active {
  border: 1px solid <?php echo esc_attr($theme_color) ?>;
}
.single-product .product-single-main.product-type-grouped table.group_table tr td.label a:hover, .single-product .product-single-main.product-type-grouped table.group_table tr td label a:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.single-product .entry-summary .woocommerce-product-rating .woocommerce-review-link:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.single-product .entry-summary .price {
  color: <?php echo esc_attr($theme_color) ?>;
}
.single-product .product-single-inner .cart .button, .single-product .product-single-inner .add-cart .button {
  background: <?php echo esc_attr($theme_color) ?>;
}
.single-product .product-single-inner .yith-wcwl-add-to-wishlist a {
  background: <?php echo esc_attr($theme_color) ?>;
}
.single-product .product-single-inner a.compare {
  background: <?php echo esc_attr($theme_color) ?>;
}
.single-product .product-single-inner form.cart .table-product-group td.label a:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.single-product .product-single-inner form.cart .add-cart button {
  background: <?php echo esc_attr($theme_color) ?>;
}
.single-product .product_meta > span a:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.woocommerce-account .woocommerce-MyAccount-navigation ul > li.is-active a {
  color: <?php echo esc_attr($theme_color) ?>;
}
.woocommerce #breadcrumb a:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.woocommerce-page .content-page-inner input.button, .woocommerce-page .content-page-inner a.button {
  background: <?php echo esc_attr($theme_color) ?>;
}
.woocommerce-cart-form__contents .woocommerce-cart-form__cart-item td.product-remove a.remove {
  background: <?php echo esc_attr($theme_color) ?>;
}
.shop-loop-actions .quickview a:hover, .shop-loop-actions .yith-wcwl-add-to-wishlist a:hover, .shop-loop-actions .yith-compare a:hover, .shop-loop-actions .add-to-cart a:hover {
  background: <?php echo esc_attr($theme_color) ?>;
}
.shop-loop-price .price {
  color: <?php echo esc_attr($theme_color) ?>;
}
.gva-countdown .countdown-times > div.day {
  color: <?php echo esc_attr($theme_color) ?>;
}
.product_list_widget .minicart-close:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.product_list_widget.cart_list .widget-product .name a:hover {
  color: <?php echo esc_attr($theme_color) ?> !important;
}
.product_list_widget.cart_list .widget-product .remove {
  background: <?php echo esc_attr($theme_color) ?>;
}
.woo-display-mode > a:hover, .woo-display-mode > a:active, .woo-display-mode > a:focus, .woo-display-mode > a.active {
  background: <?php echo esc_attr($theme_color) ?>;
}
.filter-sidebar .filter-sidebar-inner.layout-offcavas .filter-close {
  background: <?php echo esc_attr($theme_color) ?>;
}
.woocommerce .button[type*="submit"] {
  background: <?php echo esc_attr($theme_color) ?>;
}
.widget.widget_layered_nav ul > li a:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.widget.widget_product_categories li.current-cat > a {
  color: <?php echo esc_attr($theme_color) ?> !important;
}
.widget.widget_product_categories ul.product-categories > li.has-sub .cat-caret:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.widget.widget_product_categories ul.product-categories > li ul a:hover {
  color: <?php echo esc_attr($theme_color) ?>;
}
.owl-carousel .owl-nav > div:hover, .owl-carousel .owl-nav > div:focus, .flex-control-nav .owl-nav > div:hover, .flex-control-nav .owl-nav > div:focus, .ctf-tweets .owl-nav > div:hover, .ctf-tweets .owl-nav > div:focus{
   background: <?php echo esc_attr($theme_color) ?>;
}
.bg-row-theme, .bg-col-theme > .elementor-column-wrap{
   background: <?php echo esc_attr($theme_color) ?>;
}
<?php } //End Color Theme ?> 

<?php /* ----- Style Color Theme Second ---- */ ?>
<?php if( !empty($theme_color_second) ){ ?>
.hover-color-theme-2 a:hover {
  color: <?php echo esc_attr($theme_color_second) ?> !important;
}
.btn-theme:after, .btn:after, .btn-white:after, .btn-theme-2:after, .btn-theme-2 input[type*="submit"]:after, .btn-black:after, input[type*="submit"]:not(.fa):not(.btn-theme):after, #tribe-events .tribe-events-button:after, .tribe-events-button:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.btn-theme-2 {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.btn:after, input[type*="submit"]:not(.fa):not(.btn-theme):not(.wpcf7-submit):after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.elementor-accordion .elementor-accordion-item .elementor-tab-title a span {
  color: <?php echo esc_attr($theme_color_second) ?>;
}
.elementor-widget-icon-box.icon-color-theme-second .elementor-icon, .elementor-widget-icon-box.icon-color-theme-second .elementor-icon-list-icon, .elementor-widget-icon-list.icon-color-theme-second .elementor-icon, .elementor-widget-icon-list.icon-color-theme-second .elementor-icon-list-icon {
  color: <?php echo esc_attr($theme_color_second) ?>;
}
.elementor-widget-icon-box.hover-color-theme-second a:hover, .elementor-widget-icon-box.hover-color-theme-second a:hover *, .elementor-widget-icon-list.hover-color-theme-second a:hover, .elementor-widget-icon-list.hover-color-theme-second a:hover * {
  color: <?php echo esc_attr($theme_color_second) ?> !important;
}
.gsc-icon-box-group.style-1 .icon-box-item-content .icon-box-item-inner:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-icon-box-styles.style-1 .icon-box-inner .box-icon:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-icon-box-styles.style-1 .icon-box-inner .box-icon:before {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-icon-box-styles.style-2 .box-icon:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-icon-box-styles.style-2 .box-icon:before {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.milestone-block.style-1 .box-content .milestone-icon .icon {
  color: <?php echo esc_attr($theme_color_second) ?>;
}
.milestone-block.style-1 .box-content .milestone-icon .icon:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.milestone-block.style-1 .box-content .milestone-icon .icon i, .milestone-block.style-1 .box-content .milestone-icon .icon svg {
  color: <?php echo esc_attr($theme_color_second) ?>;
  fill: <?php echo esc_attr($theme_color_second) ?>;
}
.milestone-block.style-2 .box-content:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gallery-post a.zoomGallery:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-heading .sub-title:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-image-content.skin-v1 .line-color:before {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-image-content.skin-v3 .box-content {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gva-testimonial-carousel.style-1 .testimonial-item .content-inner:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gva-testimonial-carousel.style-1 .testimonial-item .line:before, .gva-testimonial-carousel.style-1 .testimonial-item .line:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gva-testimonial-carousel.style-1 .testimonial-item .line-2:before, .gva-testimonial-carousel.style-1 .testimonial-item .line-2:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gva-testimonial-single.style-1 .testimonial-item .testimonial-content {
  border-left: 3px solid <?php echo esc_attr($theme_color_second) ?>;
}
.gva-testimonial-single.style-1 .testimonial-item .testimonial-content .testimonial-right .testimonial-image .video-link {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-video-box.style-1 .video-inner .vide-image:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-tabs-content .nav_tabs > li a.active:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.gsc-work-process:hover .box-content .number-text, .gsc-work-process.active .box-content .number-text {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.post .entry-meta .meta-inline > span i {
  color: <?php echo esc_attr($theme_color_second) ?>;
}
.post:hover .content-inner .read-more {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.post-style-2 .entry-content .entry-meta .left {
  border: 4px solid <?php echo esc_attr($theme_color_second) ?>;
}
.post-style-3:hover .entry-content .read-more {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.single.single-post #wp-content > article.post .entry-meta .cat-links i {
  color: <?php echo esc_attr($theme_color_second) ?>;
}
.team-block.team-v2 .team-image .socials-team a:hover {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.team-block.team-v2.active .team-image .socials-team a.share-social {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.removecampaignupdate:hover, .wp-crowd-btn-primary:hover, .wpneo-edit-btn:hover, .wp-crowd-btn:hover, .wpneo-cancel-btn:hover, .wpneo-save-btn:hover, .wpneo-image-upload:hover, #wpneo_active_edit_form:hover, .wpneo-image-upload-btn:hover {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.campaign-block .campaign-content .campaign-progress .progress .progress-bar {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.campaign-block-2 .campaign-content .campaign-progress .progress .progress-bar {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-left .wpneo-post-img #campaign_loved_html .wpneo-icon {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.wpneo-list-details .campaign-top .campaign-single-right .campaign-progress .progress .progress-bar {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.wpneo-list-details .project-related > .content-inner .widget-heading .widget-subtitle:after {
  background: <?php echo esc_attr($theme_color_second) ?>;
}
.milestone-block.style-1:hover .milestone-icon .icon svg, .milestone-block.style-1:hover .milestone-icon .icon i {
   color: #1b1f2e;
   fill: #1b1f2e;
}
.bg-row-theme-second, .bg-col-theme-second > .elementor-column-wrap{
   background: <?php echo esc_attr($theme_color_second) ?>;
}
<?php } //End Color Theme Second ?> 


<?php

      $styles = ob_get_clean();
      
      $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
      
      $styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );

      if($styles){
         wp_enqueue_style( 'krowd-custom-style-color', KROWD_THEME_URL . '/css/custom_script.css');
         wp_add_inline_style( 'krowd-custom-style-color', $styles );
      }

   }
}

add_action( 'wp_enqueue_scripts', 'krowd_custom_color_theme', 99999 );