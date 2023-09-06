# Divi Collapsible WordPress plugin

WordPress Plugin to convert the Divi's mobile menu into a collapsible menu

## How to use it

1. Download the plugin files
2. Upload the zip file to the WordPress website
3. Activate the plugin

## Description

A simple plugin that will transform the default Divi's Mobile menu into a collapsable menu while keeping usable the link of the parent menu item. The plugin once activated, will output one `<style>` tag in the Header of your website which contains all the required CSS code for the collapsible menu items and one `<script>` tag in the Footer (to avoid render blocking issues), which contains all the JS code required for this to work properply.

The JS script, adds a new element (`<a>`) for all the menu items that have children. Inside this new elment there are two SVG icons (`+` - for opening the sub-menu, `x` - for closing the sub-menu).

Onece activated, it will convert the original Divi's Mobile menu into a Collapsible menu while preserving the parent link. The Sub Menu can be opened by clickin on the `+` icon.

To close the menu, click on the `x` icon
