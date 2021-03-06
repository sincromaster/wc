<style type="text/css">
/*!
 * jQuery Mobile v1.0rc2
 * http://jquerymobile.com/
 *
 * Copyright 2010, jQuery Project
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 */
/*!
* jQuery Mobile Framework
* Copyright (c) jQuery Project
* Dual licensed under the MIT (MIT-LICENSE.txt) and GPL (GPL-LICENSE.txt) licenses.
*/

/* Swatches */

/* A
-----------------------------------------------------------------------------------------------------------*/

.ui-body-a,
.ui-dialog.ui-overlay-a {
	<?php /*?>border: 1px solid 		<?php echo $mobile_custom_styles['Content_body_border'];?><?php */?> /*{a-body-border}*/
	color: 					<?php echo $mobile_custom_styles['Content_body_text_color'];?> /*{a-body-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['Content_body_text_shadow_x'];?> /*{a-body-shadow-x}*/ <?php echo $mobile_custom_styles['Content_body_text_shadow_y'];?> /*{a-body-shadow-y}*/ <?php echo $mobile_custom_styles['Content_body_text_shadow_radius'];?> /*{a-body-shadow-radius}*/ <?php echo $mobile_custom_styles['Content_body_text_shadow_color'];?> /*{a-body-shadow-color}*/;
	background: 			<?php echo $mobile_custom_styles['Content_body_background'];?> /*{a-body-background-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{a-body-background-start}*/), to( <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{a-body-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{a-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{a-body-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{a-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{a-body-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{a-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{a-body-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{a-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{a-body-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{a-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{a-body-background-end}*/);
}
.ui-body-a,
.ui-body-a input,
.ui-body-a select,
.ui-body-a textarea,
.ui-body-a button {
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
}

.ui-body-a .ui-link-inherit {
	color: 	<?php echo $mobile_custom_styles['Content_body_text_color'];?> /*{a-body-color}*/;
}

.ui-body-a .ui-link {
	color: <?php echo $mobile_custom_styles['Content_body_link_color'];?> /*{a-body-link-color}*/;
	font-weight: bold;
}

.ui-body-a .ui-link:hover {
	color: <?php echo $mobile_custom_styles['Content_body_link_hover'];?> /*{a-body-link-hover}*/;
}

.ui-body-a .ui-link:active {
	color: <?php echo $mobile_custom_styles['Content_body_link_active'];?> /*{a-body-link-active}*/;
}

.ui-body-a .ui-link:visited {
    color: <?php echo $mobile_custom_styles['Content_body_link_visited'];?> /*{a-body-link-visited}*/;
}

.ui-btn-up-a {
	border: 1px solid 		<?php if(isset($mobile_custom_styles['a_button_normal_border'])) { echo $mobile_custom_styles['a_button_normal_border']; }else{ echo "#bbbbbb"; }?> /*{a-bup-border}*/;
	background: 			<?php if(isset($mobile_custom_styles['a_button_normal_background'])) { echo $mobile_custom_styles['a_button_normal_background']; }else{ echo "#bbbbbb"; }?> /*{a-bup-background-color}*/;
	font-weight: bold;
	color: 					<?php if(isset($mobile_custom_styles['a_button_normal_text_color'])) { echo $mobile_custom_styles['a_button_normal_text_color']; }else{ echo "#bbbbbb"; }?> /*{a-bup-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['a_button_normal_text_shadow_x'];?> /*{a-bup-shadow-x}*/ <?php echo $mobile_custom_styles['a_button_normal_text_shadow_y'];?> /*{a-bup-shadow-y}*/ <?php echo $mobile_custom_styles['a_button_normal_text_shadow_radius'];?> /*{a-bup-shadow-radius}*/ <?php echo $mobile_custom_styles['a_button_normal_text_shadow_color'];?> /*{a-bup-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['a_button_normal_background_start'];?> /*{a-bup-background-start}*/), to( <?php echo $mobile_custom_styles['a_button_normal_background_end'];?> /*{a-bup-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['a_button_normal_background_start'];?> /*{a-bup-background-start}*/, <?php echo $mobile_custom_styles['a_button_normal_background_end'];?> /*{a-bup-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['a_button_normal_background_start'];?> /*{a-bup-background-start}*/, <?php echo $mobile_custom_styles['a_button_normal_background_end'];?> /*{a-bup-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['a_button_normal_background_start'];?> /*{a-bup-background-start}*/, <?php echo $mobile_custom_styles['a_button_normal_background_end'];?> /*{a-bup-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['a_button_normal_background_start'];?> /*{a-bup-background-start}*/, <?php echo $mobile_custom_styles['a_button_normal_background_end'];?> /*{a-bup-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['a_button_normal_background_start'];?> /*{a-bup-background-start}*/, <?php echo $mobile_custom_styles['a_button_normal_background_end'];?> /*{a-bup-background-end}*/);
}
.ui-btn-up-a a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['a_button_normal_text_color'];?> /*{a-bup-color}*/;
}

.ui-btn-hover-a {
	border: 1px solid 		<?php if(isset($mobile_custom_styles['a_button_hover_border'])) { echo $mobile_custom_styles['a_button_hover_border']; }else{ echo "#bbbbbb"; }?> /*{a-bhover-border}*/;
	background: 			<?php if(isset($mobile_custom_styles['a_button_hover_background_color'])) { echo $mobile_custom_styles['a_button_hover_background_color']; }else{ echo "#bbbbbb"; }?> /*{a-bhover-background-color}*/;
	font-weight: bold;
	color: 					<?php if(isset($mobile_custom_styles['a_button_hover_text_color'])) { echo $mobile_custom_styles['a_button_hover_text_color']; }else{ echo "#bbbbbb"; }?> /*{a-bhover-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['a_button_hover_text_shadow_x'];?> /*{a-bhover-shadow-x}*/ <?php echo $mobile_custom_styles['a_button_hover_text_shadow_y'];?> /*{a-bhover-shadow-y}*/ <?php echo $mobile_custom_styles['a_button_hover_text_shadow_radius'];?> /*{a-bhover-shadow-radius}*/ <?php echo $mobile_custom_styles['a_button_hover_text_shadow_color'];?> /*{a-bhover-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['a_button_hover_background_start'];?> /*{a-bhover-background-start}*/), to( <?php echo $mobile_custom_styles['a_button_hover_background_end'];?> /*{a-bhover-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['a_button_hover_background_start'];?> /*{a-bhover-background-start}*/, <?php echo $mobile_custom_styles['a_button_hover_background_end'];?> /*{a-bhover-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['a_button_hover_background_start'];?> /*{a-bhover-background-start}*/, <?php echo $mobile_custom_styles['a_button_hover_background_end'];?> /*{a-bhover-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['a_button_hover_background_start'];?> /*{a-bhover-background-start}*/, <?php echo $mobile_custom_styles['a_button_hover_background_end'];?> /*{a-bhover-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['a_button_hover_background_start'];?> /*{a-bhover-background-start}*/, <?php echo $mobile_custom_styles['a_button_hover_background_end'];?> /*{a-bhover-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['a_button_hover_background_start'];?> /*{a-bhover-background-start}*/, <?php echo $mobile_custom_styles['a_button_hover_background_end'];?> /*{a-bhover-background-end}*/);
}
.ui-btn-hover-a a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['a_button_hover_text_color'];?> /*{a-bhover-color}*/;
}

.ui-btn-down-a {
	border: 1px solid 		<?php if(isset($mobile_custom_styles['a_button_pressed_border'])) { echo $mobile_custom_styles['a_button_pressed_border']; }else{ echo "#bbbbbb"; }?> /*{a-bdown-border}*/;
	background: 			<?php if(isset($mobile_custom_styles['a_button_pressed_background_color'])) { echo $mobile_custom_styles['a_button_pressed_background_color']; }else{ echo "#bbbbbb"; }?> /*{a-bdown-background-color}*/;
	font-weight: bold;
	color: 					<?php if(isset($mobile_custom_styles['a_button_pressed_text_color'])) { echo $mobile_custom_styles['a_button_pressed_text_color']; }else{ echo "#bbbbbb"; }?> /*{a-bdown-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['a_button_pressed_text_shadow_x'];?> /*{a-bdown-shadow-x}*/ <?php echo $mobile_custom_styles['a_button_pressed_text_shadow_y'];?> /*{a-bdown-shadow-y}*/ <?php echo $mobile_custom_styles['a_button_pressed_text_shadow_radius'];?> /*{a-bdown-shadow-radius}*/ <?php echo $mobile_custom_styles['a_button_pressed_text_shadow_color'];?> /*{a-bdown-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['a_button_pressed_background_start'];?> /*{a-bdown-background-start}*/), to( <?php echo $mobile_custom_styles['a_button_pressed_background_end'];?> /*{a-bdown-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['a_button_pressed_background_start'];?> /*{a-bdown-background-start}*/, <?php echo $mobile_custom_styles['a_button_pressed_background_end'];?> /*{a-bdown-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['a_button_pressed_background_start'];?> /*{a-bdown-background-start}*/, <?php echo $mobile_custom_styles['a_button_pressed_background_end'];?> /*{a-bdown-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['a_button_pressed_background_start'];?> /*{a-bdown-background-start}*/, <?php echo $mobile_custom_styles['a_button_pressed_background_end'];?> /*{a-bdown-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['a_button_pressed_background_start'];?> /*{a-bdown-background-start}*/, <?php echo $mobile_custom_styles['a_button_pressed_background_end'];?> /*{a-bdown-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['a_button_pressed_background_start'];?> /*{a-bdown-background-start}*/, <?php echo $mobile_custom_styles['a_button_pressed_background_end'];?> /*{a-bdown-background-end}*/);
}
.ui-btn-down-a a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['a_button_pressed_text_color'];?> /*{a-bdown-color}*/;
}

.ui-btn-up-a,
.ui-btn-hover-a,
.ui-btn-down-a {
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
	text-decoration: none;
}

/* B
-----------------------------------------------------------------------------------------------------------*/
.ui-bar-b {
	border: 0; 		/*{b-bar-border}*/
	background: 			<?php echo $mobile_custom_styles['Header_footer_background'];?> /*{b-bar-background-color}*/;
	color: <?php echo $mobile_custom_styles['Header_footer_text_color']; ?> /*{b-bar-color}*/;
	font-weight: bold;
	text-shadow: <?php echo $mobile_custom_styles['Header_footer_text_shadow_x']; ?> /*{b-bar-shadow-x}*/ <?php echo $mobile_custom_styles['Header_footer_text_shadow_y']; ?> /*{b-bar-shadow-y}*/ <?php echo $mobile_custom_styles['Header_footer_text_shadow_radius']; ?> /*{b-bar-shadow-radius}*/ 	<?php echo $mobile_custom_styles['Header_footer_text_shadow_color']; ?> /*{b-bar-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{b-bar-background-start}*/), to( <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{b-bar-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{b-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{b-bar-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{b-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{b-bar-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{b-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{b-bar-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{b-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{b-bar-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{b-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{b-bar-background-end}*/);
}

.ui-bar-b .ui-link-inherit {
	color: 	<?php echo $mobile_custom_styles['Header_footer_text_color'];?> /*{b-bar-color}*/;
}
.ui-bar-b .ui-link {
	color: <?php echo $mobile_custom_styles['Content_body_link_color'];?> /*{b-bar-link-color}*/;
	font-weight: bold;
}

.ui-bar-b .ui-link:hover {
	color: <?php echo $mobile_custom_styles['Content_body_link_hover'];?> /*{b-bar-link-hover}*/;
}

.ui-bar-b .ui-link:active {
	color: <?php echo $mobile_custom_styles['Content_body_link_active'];?> /*{b-bar-link-cctive}*/;
}

.ui-bar-b .ui-link:visited {
    color: <?php echo $mobile_custom_styles['Content_body_link_visited'];?> /*{b-bar-link-visited}*/;
}

.ui-bar-b,
.ui-bar-b input,
.ui-bar-b select,
.ui-bar-b textarea,
.ui-bar-b button {
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
}

.ui-btn-up-b {
	border: 1px solid 		<?php echo $mobile_custom_styles['b_button_normal_border'];?> /*{b-bup-border}*/;
	background: 			<?php echo $mobile_custom_styles['b_button_normal_background'];?> /*{b-bup-background-color}*/;
	font-weight: bold;
	color: 					<?php echo $mobile_custom_styles['b_button_normal_text_color'];?> /*{b-bup-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['b_button_normal_text_shadow_x'];?> /*{b-bup-shadow-x}*/ <?php echo $mobile_custom_styles['b_button_normal_text_shadow_y'];?> /*{b-bup-shadow-y}*/ <?php echo $mobile_custom_styles['b_button_normal_text_shadow_radius'];?> /*{b-bup-shadow-radius}*/ <?php echo $mobile_custom_styles['b_button_normal_text_shadow_color'];?> /*{b-bup-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['b_button_normal_background_start'];?> /*{b-bup-background-start}*/), to( <?php echo $mobile_custom_styles['b_button_normal_background_end'];?> /*{b-bup-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['b_button_normal_background_start'];?> /*{b-bup-background-start}*/, <?php echo $mobile_custom_styles['b_button_normal_background_end'];?> /*{b-bup-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['b_button_normal_background_start'];?> /*{b-bup-background-start}*/, <?php echo $mobile_custom_styles['b_button_normal_background_end'];?> /*{b-bup-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['b_button_normal_background_start'];?> /*{b-bup-background-start}*/, <?php echo $mobile_custom_styles['b_button_normal_background_end'];?> /*{b-bup-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['b_button_normal_background_start'];?> /*{b-bup-background-start}*/, <?php echo $mobile_custom_styles['b_button_normal_background_end'];?> /*{b-bup-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['b_button_normal_background_start'];?> /*{b-bup-background-start}*/, <?php echo $mobile_custom_styles['b_button_normal_background_end'];?> /*{b-bup-background-end}*/);
}

.ui-btn-up-b a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['b_button_normal_text_color'];?> /*{b-bup-color}*/;
}

.ui-btn-hover-b {
	border: 1px solid 		<?php echo $mobile_custom_styles['b_button_hover_border'];?> /*{b-bhover-border}*/;
	background: 			<?php echo $mobile_custom_styles['b_button_hover_background_color'];?> /*{b-bhover-background-color}*/;
	font-weight: bold;
	color: 					<?php echo $mobile_custom_styles['b_button_hover_text_color'];?> /*{b-bhover-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['b_button_hover_text_shadow_x'];?> /*{b-bhover-shadow-x}*/ <?php echo $mobile_custom_styles['b_button_hover_text_shadow_y'];?> /*{b-bhover-shadow-y}*/ <?php echo $mobile_custom_styles['b_button_hover_text_shadow_radius'];?> /*{b-bhover-shadow-radius}*/ <?php echo $mobile_custom_styles['b_button_hover_text_shadow_color'];?> /*{b-bhover-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['b_button_hover_background_start'];?> /*{b-bhover-background-start}*/), to( <?php echo $mobile_custom_styles['b_button_hover_background_end'];?> /*{b-bhover-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['b_button_hover_background_start'];?> /*{b-bhover-background-start}*/, <?php echo $mobile_custom_styles['b_button_hover_background_end'];?> /*{b-bhover-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['b_button_hover_background_start'];?> /*{b-bhover-background-start}*/, <?php echo $mobile_custom_styles['b_button_hover_background_end'];?> /*{b-bhover-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['b_button_hover_background_start'];?> /*{b-bhover-background-start}*/, <?php echo $mobile_custom_styles['b_button_hover_background_end'];?> /*{b-bhover-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['b_button_hover_background_start'];?> /*{b-bhover-background-start}*/, <?php echo $mobile_custom_styles['b_button_hover_background_end'];?> /*{b-bhover-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['b_button_hover_background_start'];?> /*{b-bhover-background-start}*/, <?php echo $mobile_custom_styles['b_button_hover_background_end'];?> /*{b-bhover-background-end}*/);
}
.ui-btn-hover-b a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['b_button_hover_text_color'];?> /*{b-bhover-color}*/;
}

.ui-btn-down-b {
	border: 1px solid 		<?php echo $mobile_custom_styles['b_button_pressed_border'];?> /*{b-bdown-border}*/;
	background: 			<?php echo $mobile_custom_styles['b_button_pressed_background_color'];?> /*{b-bdown-background-color}*/;
	font-weight: bold;
	color: 					<?php echo $mobile_custom_styles['b_button_pressed_text_color'];?> /*{b-bdown-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['b_button_pressed_text_shadow_x'];?> /*{b-bdown-shadow-x}*/ <?php echo $mobile_custom_styles['b_button_pressed_text_shadow_y'];?> /*{b-bdown-shadow-y}*/ <?php echo $mobile_custom_styles['b_button_pressed_text_shadow_radius'];?> /*{b-bdown-shadow-radius}*/ <?php echo $mobile_custom_styles['b_button_pressed_text_shadow_color'];?> /*{b-bdown-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['b_button_pressed_background_start'];?> /*{b-bdown-background-start}*/), to( <?php echo $mobile_custom_styles['b_button_pressed_background_end'];?> /*{b-bdown-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['b_button_pressed_background_start'];?> /*{b-bdown-background-start}*/, <?php echo $mobile_custom_styles['b_button_pressed_background_end'];?> /*{b-bdown-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['b_button_pressed_background_start'];?> /*{b-bdown-background-start}*/, <?php echo $mobile_custom_styles['b_button_pressed_background_end'];?> /*{b-bdown-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['b_button_pressed_background_start'];?> /*{b-bdown-background-start}*/, <?php echo $mobile_custom_styles['b_button_pressed_background_end'];?> /*{b-bdown-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['b_button_pressed_background_start'];?> /*{b-bdown-background-start}*/, <?php echo $mobile_custom_styles['b_button_pressed_background_end'];?> /*{b-bdown-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['b_button_pressed_background_start'];?> /*{b-bdown-background-start}*/, <?php echo $mobile_custom_styles['b_button_pressed_background_end'];?> /*{b-bdown-background-end}*/);
}
.ui-btn-down-b a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['b_button_pressed_text_color'];?> /*{b-bdown-color}*/;
}
.ui-btn-up-b,
.ui-btn-hover-b,
.ui-btn-down-b {
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
	text-decoration: none;
}

/* C
-----------------------------------------------------------------------------------------------------------*/

.ui-bar-c {
	border: 0 /*{c-bar-border}*/;
	background: 			<?php echo $mobile_custom_styles['Header_footer_background'];?> /*{c-bar-background-color}*/;
	color: <?php echo $mobile_custom_styles['Header_footer_text_color']; ?> /*{c-bar-color}*/;
	font-weight: bold;
	text-shadow: <?php echo $mobile_custom_styles['Header_footer_text_shadow_x']; ?> /*{c-bar-shadow-x}*/ <?php echo $mobile_custom_styles['Header_footer_text_shadow_y']; ?> /*{c-bar-shadow-y}*/ <?php echo $mobile_custom_styles['Header_footer_text_shadow_radius']; ?> /*{c-bar-shadow-radius}*/ 	<?php echo $mobile_custom_styles['Header_footer_text_shadow_color']; ?> /*{c-bar-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{c-bar-background-start}*/), to( <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{c-bar-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{c-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{c-bar-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{c-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{c-bar-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{c-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{c-bar-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{c-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{c-bar-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['Header_footer_background_start']; ?> /*{c-bar-background-start}*/, <?php echo $mobile_custom_styles['Header_footer_background_end']; ?> /*{c-bar-background-end}*/);
}

.ui-bar-c .ui-link-inherit {
	color: 	<?php echo $mobile_custom_styles['Header_footer_text_color'];?> /*{c-bar-color}*/;
}
.ui-bar-c .ui-link {
	color: <?php echo $mobile_custom_styles['Content_body_link_color'];?> /*{c-bar-link-color}*/;
	font-weight: bold;
}

.ui-bar-c .ui-link:hover {
	color: <?php echo $mobile_custom_styles['Content_body_link_hover'];?> /*{c-bar-link-hover}*/;
}

.ui-bar-c .ui-link:active {
	color: <?php echo $mobile_custom_styles['Content_body_link_active'];?> /*{c-bar-link-cctive}*/;
}

.ui-bar-c .ui-link:visited {
    color: <?php echo $mobile_custom_styles['Content_body_link_visited'];?> /*{c-bar-link-visited}*/;
}

.ui-bar-c,
.ui-bar-c input,
.ui-bar-c select,
.ui-bar-c textarea,
.ui-bar-c button {
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
}

.ui-body-c,
.ui-dialog.ui-overlay-c {
	<?php /*?>border: 1px solid 		<?php echo $mobile_custom_styles['Content_body_border'];?><?php */?> /*{c-body-border}*/
	color: 					<?php echo $mobile_custom_styles['Content_body_text_color'];?> /*{c-body-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['Content_body_text_shadow_x'];?> /*{c-body-shadow-x}*/ <?php echo $mobile_custom_styles['Content_body_text_shadow_y'];?> /*{c-body-shadow-y}*/ <?php echo $mobile_custom_styles['Content_body_text_shadow_radius'];?> /*{c-body-shadow-radius}*/ <?php echo $mobile_custom_styles['Content_body_text_shadow_color'];?> /*{c-body-shadow-color}*/;
	background: 			<?php echo $mobile_custom_styles['Content_body_background'];?> /*{c-body-background-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{c-body-background-start}*/), to( <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{c-body-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{c-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{c-body-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{c-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{c-body-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{c-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{c-body-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{c-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{c-body-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['Content_body_background_start'];?> /*{c-body-background-start}*/, <?php echo $mobile_custom_styles['Content_body_background_end'];?> /*{c-body-background-end}*/);
}
.ui-body-c,
.ui-body-c input,
.ui-body-c select,
.ui-body-c textarea,
.ui-body-c button {
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
}

.ui-body-c .ui-link-inherit {
	color: 	<?php echo $mobile_custom_styles['Content_body_text_color'];?> /*{c-body-color}*/;
}

.ui-body-c .ui-link {
	color: <?php echo $mobile_custom_styles['Content_body_link_color'];?> /*{c-body-link-color}*/;
	font-weight: bold;
}

.ui-body-c .ui-link:hover {
	color: <?php echo $mobile_custom_styles['Content_body_link_hover'];?> /*{c-body-link-hover}*/;
}

.ui-body-c .ui-link:active {
	color: <?php echo $mobile_custom_styles['Content_body_link_active'];?> /*{c-body-link-active}*/;
}

.ui-body-c .ui-link:visited {
    color: <?php echo $mobile_custom_styles['Content_body_link_visited'];?> /*{c-body-link-visited}*/;
}

.ui-btn-up-c {
	border: 1px solid 		<?php if(isset($mobile_custom_styles['c_button_normal_border'])) { echo $mobile_custom_styles['c_button_normal_border']; }else{ echo "#bbbbbb"; }?> /*{c-bup-border}*/;
	background: 			<?php if(isset($mobile_custom_styles['c_button_normal_background'])) { echo $mobile_custom_styles['c_button_normal_background']; }else{ echo "#333333"; }?> /*{c-bup-background-color}*/;
	font-weight: bold;
	color: 					<?php if(isset($mobile_custom_styles['c_button_normal_text_color'])) { echo $mobile_custom_styles['c_button_normal_text_color']; }else{ echo "#ffffff"; }?> /*{c-bup-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['c_button_normal_text_shadow_x'];?> /*{c-bup-shadow-x}*/ <?php echo $mobile_custom_styles['c_button_normal_text_shadow_y'];?> /*{c-bup-shadow-y}*/ <?php echo $mobile_custom_styles['c_button_normal_text_shadow_radius'];?> /*{c-bup-shadow-radius}*/ <?php echo $mobile_custom_styles['c_button_normal_text_shadow_color'];?> /*{c-bup-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['c_button_normal_background_start'];?> /*{c-bup-background-start}*/), to( <?php echo $mobile_custom_styles['c_button_normal_background_end'];?> /*{c-bup-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['c_button_normal_background_start'];?> /*{c-bup-background-start}*/, <?php echo $mobile_custom_styles['c_button_normal_background_end'];?> /*{c-bup-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['c_button_normal_background_start'];?> /*{c-bup-background-start}*/, <?php echo $mobile_custom_styles['c_button_normal_background_end'];?> /*{c-bup-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['c_button_normal_background_start'];?> /*{c-bup-background-start}*/, <?php echo $mobile_custom_styles['c_button_normal_background_end'];?> /*{c-bup-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['c_button_normal_background_start'];?> /*{c-bup-background-start}*/, <?php echo $mobile_custom_styles['c_button_normal_background_end'];?> /*{c-bup-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['c_button_normal_background_start'];?> /*{c-bup-background-start}*/, <?php echo $mobile_custom_styles['c_button_normal_background_end'];?> /*{c-bup-background-end}*/);
}

.ui-btn-up-c a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['c_button_normal_text_color'];?> /*{c-bup-color}*/;
}

.ui-btn-hover-c {
	border: 1px solid 		<?php if(isset($mobile_custom_styles['c_button_hover_border'])) { echo $mobile_custom_styles['c_button_hover_border']; }else{ echo "#bbbbbb"; }?> /*{c-bhover-border}*/;
	background: 			<?php if(isset($mobile_custom_styles['c_button_hover_background_color'])) { echo $mobile_custom_styles['c_button_hover_background_color']; }else{ echo "#dadada"; }?> /*{c-bhover-background-color}*/;
	font-weight: bold;
	color: 					<?php echo $mobile_custom_styles['c_button_hover_text_color'];?> /*{c-bhover-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['c_button_hover_text_shadow_x'];?> /*{c-bhover-shadow-x}*/ <?php echo $mobile_custom_styles['c_button_hover_text_shadow_y'];?> /*{c-bhover-shadow-y}*/ <?php echo $mobile_custom_styles['c_button_hover_text_shadow_radius'];?> /*{c-bhover-shadow-radius}*/ <?php echo $mobile_custom_styles['c_button_hover_text_shadow_color'];?> /*{c-bhover-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['c_button_hover_background_start'];?> /*{c-bhover-background-start}*/), to( <?php echo $mobile_custom_styles['c_button_hover_background_end'];?> /*{c-bhover-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['c_button_hover_background_start'];?> /*{c-bhover-background-start}*/, <?php echo $mobile_custom_styles['c_button_hover_background_end'];?> /*{c-bhover-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['c_button_hover_background_start'];?> /*{c-bhover-background-start}*/, <?php echo $mobile_custom_styles['c_button_hover_background_end'];?> /*{c-bhover-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['c_button_hover_background_start'];?> /*{c-bhover-background-start}*/, <?php echo $mobile_custom_styles['c_button_hover_background_end'];?> /*{c-bhover-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['c_button_hover_background_start'];?> /*{c-bhover-background-start}*/, <?php echo $mobile_custom_styles['c_button_hover_background_end'];?> /*{c-bhover-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['c_button_hover_background_start'];?> /*{c-bhover-background-start}*/, <?php echo $mobile_custom_styles['c_button_hover_background_end'];?> /*{c-bhover-background-end}*/);
}
.ui-btn-hover-c a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['c_button_hover_text_color'];?> /*{c-bhover-color}*/;
}

.ui-btn-down-c {
	border: 1px solid 		<?php if(isset($mobile_custom_styles['c_button_pressed_border'])) { echo $mobile_custom_styles['c_button_pressed_border']; }else{ echo "#808080"; }?> /*{c-bdown-border}*/;
	background: 			<?php if(isset($mobile_custom_styles['c_button_pressed_background_color'])) { echo $mobile_custom_styles['c_button_pressed_background_color']; }else{ echo "#fdfdfd"; }?> /*{c-bdown-background-color}*/;
	font-weight: bold;
	color: 					<?php echo $mobile_custom_styles['c_button_pressed_text_color'];?> /*{c-bdown-color}*/;
	text-shadow: <?php echo $mobile_custom_styles['c_button_pressed_text_shadow_x'];?> /*{c-bdown-shadow-x}*/ <?php echo $mobile_custom_styles['c_button_pressed_text_shadow_y'];?> /*{c-bdown-shadow-y}*/ <?php echo $mobile_custom_styles['c_button_pressed_text_shadow_radius'];?> /*{c-bdown-shadow-radius}*/ <?php echo $mobile_custom_styles['c_button_pressed_text_shadow_color'];?> /*{c-bdown-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['c_button_pressed_background_start'];?> /*{c-bdown-background-start}*/), to( <?php echo $mobile_custom_styles['c_button_pressed_background_end'];?> /*{c-bdown-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['c_button_pressed_background_start'];?> /*{c-bdown-background-start}*/, <?php echo $mobile_custom_styles['c_button_pressed_background_end'];?> /*{c-bdown-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['c_button_pressed_background_start'];?> /*{c-bdown-background-start}*/, <?php echo $mobile_custom_styles['c_button_pressed_background_end'];?> /*{c-bdown-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['c_button_pressed_background_start'];?> /*{c-bdown-background-start}*/, <?php echo $mobile_custom_styles['c_button_pressed_background_end'];?> /*{c-bdown-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['c_button_pressed_background_start'];?> /*{c-bdown-background-start}*/, <?php echo $mobile_custom_styles['c_button_pressed_background_end'];?> /*{c-bdown-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['c_button_pressed_background_start'];?> /*{c-bdown-background-start}*/, <?php echo $mobile_custom_styles['c_button_pressed_background_end'];?> /*{c-bdown-background-end}*/);
}
.ui-btn-down-c a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['c_button_pressed_text_color'];?> /*{c-bdown-color}*/;
}
.ui-btn-up-c,
.ui-btn-hover-c,
.ui-btn-down-c {
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
	text-decoration: none;
}/* Structure */

/* links within "buttons" 
-----------------------------------------------------------------------------------------------------------*/

a.ui-link-inherit {
	text-decoration: none !important;
}


/* Active class used as the "on" state across all themes
-----------------------------------------------------------------------------------------------------------*/

.ui-btn-active {
	border: 1px solid 		<?php echo $mobile_custom_styles['active_state_border'];?> /*{global-active-border}*/;
	background: 			<?php echo $mobile_custom_styles['active_state_background'];?> /*{global-active-background-color}*/;
	font-weight: bold;
	color: 					<?php echo $mobile_custom_styles['active_state_text_color'];?> /*{global-active-color}*/;
	cursor: pointer;
	text-shadow: <?php echo $mobile_custom_styles['active_state_text_shadow_x'];?> /*{global-active-shadow-x}*/ <?php echo $mobile_custom_styles['active_state_text_shadow_y'];?> /*{global-active-shadow-y}*/ <?php echo $mobile_custom_styles['active_state_text_shadow_radius'];?> /*{global-active-shadow-radius}*/ <?php echo $mobile_custom_styles['active_state_text_shadow_color'];?> /*{global-active-shadow-color}*/;
	text-decoration: none;
	background-image: -webkit-gradient(linear, left top, left bottom, from( <?php echo $mobile_custom_styles['active_state_background_start'];?> /*{global-active-background-start}*/), to( <?php echo $mobile_custom_styles['active_state_background_end'];?> /*{global-active-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( <?php echo $mobile_custom_styles['active_state_background_start'];?> /*{global-active-background-start}*/, <?php echo $mobile_custom_styles['active_state_background_end'];?> /*{global-active-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( <?php echo $mobile_custom_styles['active_state_background_start'];?> /*{global-active-background-start}*/, <?php echo $mobile_custom_styles['active_state_background_end'];?> /*{global-active-background-end}*/); /* FF3.6 */
	background-image:     -ms-linear-gradient( <?php echo $mobile_custom_styles['active_state_background_start'];?> /*{global-active-background-start}*/, <?php echo $mobile_custom_styles['active_state_background_end'];?> /*{global-active-background-end}*/); /* IE10 */
	background-image:      -o-linear-gradient( <?php echo $mobile_custom_styles['active_state_background_start'];?> /*{global-active-background-start}*/, <?php echo $mobile_custom_styles['active_state_background_end'];?> /*{global-active-background-end}*/); /* Opera 11.10+ */
	background-image:         linear-gradient( <?php echo $mobile_custom_styles['active_state_background_start'];?> /*{global-active-background-start}*/, <?php echo $mobile_custom_styles['active_state_background_end'];?> /*{global-active-background-end}*/);
	font-family: <?php echo $mobile_custom_styles['font_family'];?> /*{global-font-family}*/;
}
.ui-btn-active a.ui-link-inherit {
	color: 					<?php echo $mobile_custom_styles['active_state_text_color'];?> /*{global-active-color}*/;
}


/* button inner top highlight
-----------------------------------------------------------------------------------------------------------*/

.ui-btn-inner {
	border-top: 1px solid 	#fff;
	border-color: 			rgba(255,255,255,.3);
}


/* corner rounding classes
-----------------------------------------------------------------------------------------------------------*/

.ui-corner-tl {
	-moz-border-radius-topleft: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-top-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-top-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-tr {
	-moz-border-radius-topright: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-top-right-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-top-right-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-bl {
	-moz-border-radius-bottomleft: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-bottom-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-bottom-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-br {
	-moz-border-radius-bottomright: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-bottom-right-radius: <?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-bottom-right-radius: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-top {
	-moz-border-radius-topleft: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-top-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-top-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-moz-border-radius-topright: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-top-right-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-top-right-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-bottom {
	-moz-border-radius-bottomleft: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-bottom-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-bottom-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-moz-border-radius-bottomright: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-bottom-right-radius: <?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-bottom-right-radius: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	}
.ui-corner-right {
	-moz-border-radius-topright: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-top-right-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-top-right-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-moz-border-radius-bottomright: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-bottom-right-radius: <?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-bottom-right-radius: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-left {
	-moz-border-radius-topleft: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-top-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-top-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-moz-border-radius-bottomleft: 		<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-bottom-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-bottom-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-all {
	-moz-border-radius: 				<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	-webkit-border-radius: 				<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
	border-radius: 						<?php echo $mobile_custom_styles['Corner_Radii_group'];?> /*{global-radii-blocks}*/;
}
.ui-corner-none {
	-moz-border-radius: 				   0;
	-webkit-border-radius: 				   0;
	border-radius: 						   0;
}

/* Interaction cues
-----------------------------------------------------------------------------------------------------------*/
.ui-disabled {
	opacity: 							.3;
}
.ui-disabled,
.ui-disabled a {
	pointer-events: none;
	cursor: default;
}

/* Icons
-----------------------------------------------------------------------------------------------------------*/


/* Alt icon color
-----------------------------------------------------------------------------------------------------------*/

/* HD/"retina" sprite
-----------------------------------------------------------------------------------------------------------*/

/* plus minus */
.ui-icon-plus {
	background-position: 	-0 50%;
}
.ui-icon-minus {
	background-position: 	-36px 50%;
}

/* delete/close */
.ui-icon-delete {
	background-position: 	-72px 50%;
}

/* arrows */
.ui-icon-arrow-r {
	background-position: 	-108px 50%;
}
.ui-icon-arrow-l {
	background-position: 	-144px 50%;
}
.ui-icon-arrow-u {
	background-position: 	-180px 50%;
}
.ui-icon-arrow-d {
	background-position: 	-216px 50%;
}

/* misc */
.ui-icon-check {
	background-position: 	-252px 50%;
}
.ui-icon-gear {
	background-position: 	-288px 50%;
}
.ui-icon-refresh {
	background-position: 	-324px 50%;
}
.ui-icon-forward {
	background-position: 	-360px 50%;
}
.ui-icon-back {
	background-position: 	-396px 50%;
}
.ui-icon-grid {
	background-position: 	-432px 50%;
}
.ui-icon-star {
	background-position: 	-468px 50%;
}
.ui-icon-alert {
	background-position: 	-504px 50%;
}
.ui-icon-info {
	background-position: 	-540px 50%;
}
.ui-icon-home {
	background-position: 	-576px 50%;
}
.ui-icon-search,
.ui-icon-searchfield:after {
	background-position: 	-612px 50%;
}
.ui-icon-checkbox-off {
	background-position: 	-684px 50%;
}
.ui-icon-checkbox-on {
	background-position: 	-648px 50%;
}
.ui-icon-radio-off {
	background-position: 	-756px 50%;
}
.ui-icon-radio-on {
	background-position: 	-720px 50%;
}


/* checks,radios */
.ui-checkbox .ui-icon {
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
}
.ui-icon-checkbox-off,
.ui-icon-radio-off {
	background-color: transparent;	
}
.ui-checkbox-on .ui-icon,
.ui-radio-on .ui-icon {
	background-color: <?php echo $mobile_custom_styles['active_state_background'];?> /*{global-active-background-color}*/; /* NOTE: this hex should match the active state color. It's repeated here for cascade */
}

/* loading icon */
.ui-icon-loading {
	background-image: url(images/ajax-loader.png);
	width: 40px;
	height: 40px;
	-moz-border-radius: 20px;
	-webkit-border-radius: 20px;
	border-radius: 20px;
	background-size: 35px 35px;
}


/* Button corner classes
-----------------------------------------------------------------------------------------------------------*/

.ui-btn-corner-tl {
	-moz-border-radius-topleft: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-top-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-top-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-tr {
	-moz-border-radius-topright: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-top-right-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-top-right-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-bl {
	-moz-border-radius-bottomleft: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-bottom-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-bottom-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-br {
	-moz-border-radius-bottomright: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-bottom-right-radius: <?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-bottom-right-radius: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-top {
	-moz-border-radius-topleft: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-top-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-top-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-moz-border-radius-topright: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-top-right-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-top-right-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-bottom {
	-moz-border-radius-bottomleft: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-bottom-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-bottom-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-moz-border-radius-bottomright: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-bottom-right-radius: <?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-bottom-right-radius: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-right {
	 -moz-border-radius-topright: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-top-right-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-top-right-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-moz-border-radius-bottomright: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-bottom-right-radius: <?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-bottom-right-radius: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-left {
	-moz-border-radius-topleft: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-top-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-top-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-moz-border-radius-bottomleft: 		<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-bottom-left-radius: 	<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-bottom-left-radius: 			<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}
.ui-btn-corner-all {
	-moz-border-radius: 				<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	-webkit-border-radius: 				<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
	border-radius: 						<?php echo $mobile_custom_styles['Corner_Radii_buttons'];?> /*{global-radii-buttons}*/;
}

/* radius clip workaround for cleaning up corner trapping */
.ui-corner-tl,
.ui-corner-tr,
.ui-corner-bl, 
.ui-corner-br,
.ui-corner-top,
.ui-corner-bottom, 
.ui-corner-right,
.ui-corner-left,
.ui-corner-all,
.ui-btn-corner-tl,
.ui-btn-corner-tr,
.ui-btn-corner-bl, 
.ui-btn-corner-br,
.ui-btn-corner-top,
.ui-btn-corner-bottom, 
.ui-btn-corner-right,
.ui-btn-corner-left,
.ui-btn-corner-all {
  -webkit-background-clip: padding-box;
     -moz-background-clip: padding;
          background-clip: padding-box;
}

/* Overlay / modal
-----------------------------------------------------------------------------------------------------------*/

.ui-overlay {
	background: #666;
	opacity: .5;
	filter: Alpha(Opacity=50);
	position: absolute;
	width: 100%;
	height: 100%;
}
.ui-overlay-shadow {
	-moz-box-shadow: 0px 0px 12px 			rgba(0,0,0,.6);
	-webkit-box-shadow: 0px 0px 12px 		rgba(0,0,0,.6);
	box-shadow: 0px 0px 12px 				rgba(0,0,0,.6);
}
.ui-shadow {
	-moz-box-shadow: <?php echo $mobile_custom_styles['Box_shadow_size'];?> /*{global-box-shadow-size}*/ 			<?php echo $mobile_custom_styles['Box_shadow_color'];?>  /*{global-box-shadow-color}*/;
	-webkit-box-shadow: <?php echo $mobile_custom_styles['Box_shadow_size'];?> /*{global-box-shadow-size}*/ 		<?php echo $mobile_custom_styles['Box_shadow_color'];?>  /*{global-box-shadow-color}*/;
	box-shadow: <?php echo $mobile_custom_styles['Box_shadow_size'];?> /*{global-box-shadow-size}*/ 				<?php echo $mobile_custom_styles['Box_shadow_color'];?>  /*{global-box-shadow-color}*/;
}
.ui-bar-a .ui-shadow,
.ui-bar-b .ui-shadow ,
.ui-bar-c .ui-shadow  {
	-moz-box-shadow: 0px 1px 0 				rgba(255,255,255,.3);
	-webkit-box-shadow: 0px 1px 0 			rgba(255,255,255,.3);
	box-shadow: 0px 1px 0 					rgba(255,255,255,.3);
}
.ui-shadow-inset {
	-moz-box-shadow: inset 0px 1px 4px 		rgba(0,0,0,.2);
	-webkit-box-shadow: inset 0px 1px 4px 	rgba(0,0,0,.2);
	box-shadow: inset 0px 1px 4px 			rgba(0,0,0,.2);
}
.ui-icon-shadow {
	-moz-box-shadow: 0px 1px 0 				rgba(255,255,255,.4);
	-webkit-box-shadow: 0px 1px 0 			rgba(255,255,255,.4);
	box-shadow: 0px 1px 0 					rgba(255,255,255,.4);
}

/* Focus state - set here for specificity
-----------------------------------------------------------------------------------------------------------*/

.ui-focus {
	-moz-box-shadow: 0px 0px 12px 		<?php echo $mobile_custom_styles['active_state_background'];?> /*{global-active-background-color}*/;
	-webkit-box-shadow: 0px 0px 12px 	<?php echo $mobile_custom_styles['active_state_background'];?> /*{global-active-background-color}*/;
	box-shadow: 0px 0px 12px 			<?php echo $mobile_custom_styles['active_state_background'];?> /*{global-active-background-color}*/;
}

/* unset box shadow in browsers that don't do it right
-----------------------------------------------------------------------------------------------------------*/

.ui-mobile-nosupport-boxshadow * {
	-moz-box-shadow: none !important;
	-webkit-box-shadow: none !important;
	box-shadow: none !important;
}

/* ...and bring back focus */
.ui-mobile-nosupport-boxshadow .ui-focus {
	outline-width: 2px;
}
</style>
