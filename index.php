<?php
/*
Plugin Name: Divi Collapsible Mobile Menu
Description: A WordPress plugin that adds a collapsible mobile menu to the Divi theme.
Version: 1.0.0
Author: Eduard Ungureanu
Author URI: https://divi.tech
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


function dt_collapsible_mobile_menu_style() {
    echo '<style id="dt-collapsale-mobile-menu-styles">';
    echo '
			/*Style the icon\'s placeholder*/
			ul.et_mobile_menu li.menu-item-has-children .mobile-toggle,
			ul.et_mobile_menu li.page_item_has_children .mobile-toggle,
			.et-db #et-boc .et-l ul.et_mobile_menu li.menu-item-has-children .mobile-toggle,
			.et-db #et-boc .et-l ul.et_mobile_menu li.page_item_has_children .mobile-toggle {
				width: 44px;
				height: 100%;
				padding: 0px !important;
				max-height: 44px;
				position: absolute;
				right: 0px;
				top: 0px;
				z-index: 999;
				background-color: transparent;
				border-bottom: 0;
				text-align: center;
			}
			ul.et_mobile_menu > li.menu-item-has-children,
			ul.et_mobile_menu > li.page_item_has_children,
			ul.et_mobile_menu > li.menu-item-has-children .sub-menu li.menu-item-has-children,
			.et-db #et-boc .et-l ul.et_mobile_menu > li.menu-item-has-children,
			.et-db #et-boc .et-l ul.et_mobile_menu > li.page_item_has_children,
			.et-db #et-boc .et-l ul.et_mobile_menu > li.menu-item-has-children .sub-menu li.menu-item-has-children {
				position: relative;
			}
			.et_mobile_menu .menu-item-has-children > a,
			.et-db #et-boc .et-l .et_mobile_menu .menu-item-has-children > a {
				background-color: transparent;
			}

			/*Hide the Sub-menu*/
			ul.et_mobile_menu .menu-item-has-children .sub-menu,
			#main-header ul.et_mobile_menu .menu-item-has-children .sub-menu,
			.et-db #et-boc .et-l ul.et_mobile_menu .menu-item-has-children .sub-menu,
			.et-db #main-header ul.et_mobile_menu .menu-item-has-children .sub-menu {
				display: none !important;
				visibility: hidden !important;
			}

			/*Show the sub-menu when the + icon is clicked*/
			ul.et_mobile_menu .menu-item-has-children .sub-menu.visible,
			#main-header ul.et_mobile_menu .menu-item-has-children .sub-menu.visible,
			.et-db #et-boc .et-l ul.et_mobile_menu .menu-item-has-children .sub-menu.visible,
			.et-db #main-header ul.et_mobile_menu .menu-item-has-children .sub-menu.visible {
				display: block !important;
				visibility: visible !important;
			}

			/*Create the opening/closing icon using the SVG Icons*/
			ul.et_mobile_menu li.menu-item-has-children .mobile-toggle .dt-icons,
			.et-db #et-boc .et-l ul.et_mobile_menu li.menu-item-has-children .mobile-toggle .dt-icons {
				top: 10px;
				position: relative;
			}

			/*Hide the closing icon if the sub-menu is not open*/
			ul.et_mobile_menu li.menu-item-has-children:not(.dt-open) .mobile-toggle .dt-close-icon,
			.et-db #et-boc .et-l ul.et_mobile_menu li.menu-item-has-children:not(.dt-open) .mobile-toggle .dt-close-icon {
				display: none;
			}

			/*Hide the opening icon if the sub-menu is open*/
			ul.et_mobile_menu li.menu-item-has-children.dt-open > .mobile-toggle .dt-open-icon,
			.et-db #et-boc .et-l ul.et_mobile_menu li.menu-item-has-children.dt-open > .mobile-toggle .dt-open-icon {
				display: none;
			}';
    echo '</style>';
}

add_action('wp_head', 'dt_collapsible_mobile_menu_style');

function dt_collapsible_mobile_menu_script() {
  echo '<script id="dt-collapsale-mobile-menu-script">';
  echo 'jQuery(function ($) {
    $(document).ready(function () {
      $("body ul.et_mobile_menu li.menu-item-has-children, body ul.et_mobile_menu  li.page_item_has_children").append(
        "<span class="mobile-toggle no-smooth-scroll" aria-label="toggle sub menu"><svg class="dt-icons dt-open-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg><svg class="dt-icons dt-close-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>",
      );
      $("ul.et_mobile_menu li.menu-item-has-children .mobile-toggle, ul.et_mobile_menu li.page_item_has_children .mobile-toggle").click(function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent("li").toggleClass("dt-open");
        $(this)
          .parent("li")
          .find("ul.children")
          .first()
          .toggleClass("visible");
        $(this)
          .parent("li")
          .find("ul.sub-menu")
          .first()
          .toggleClass("visible");
      });
      $(".mobile-toggle")
        .on("mouseover", function () {
          $(this).parent().addClass("is-hover");
        })
        .on("mouseout", function () {
          $(this).parent().removeClass("is-hover");
        });
    });
  });';
  echo '</script>';
}

add_action('wp_footer', 'dt_collapsible_mobile_menu_script');
