# Visibility Manager for Elementor

A WordPress plugin that adds a widget to Elementor for controlling the visibility of containers on your page through checkboxes.

## Description

This plugin adds a new Elementor widget called "Visibility Control" that allows you to:
- Create a list of containers you want to show/hide
- Generate checkboxes for each container
- Toggle visibility of containers by checking/unchecking boxes
- Save visibility states that persist across page refreshes

## Installation

1. Download the plugin files
2. Upload the plugin folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Elementor will now have a new widget called "Visibility Control"

## Usage

1. Edit your page with Elementor
2. Drag the "Visibility Control" widget to your page
3. In the widget settings, add items for each container you want to control:
   - Name: The label that will appear next to the checkbox
   - CSS Selector: The class or ID of the container (e.g., `.my-container` or `#my-container`)
4. Make sure your containers have the corresponding CSS classes or IDs
5. Save and preview your page
6. Use the checkboxes to show/hide containers

## Example 