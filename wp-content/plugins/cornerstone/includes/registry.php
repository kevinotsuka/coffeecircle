<?php

/**
 * List of classes and modules to require when Cornerstone loads
 *
 * Framework items are always loaded. This keeps the front end as lean as possible
 * Builder items are loaded when a user is logged in. (init hook)
 */

return array(

	// Always Loaded
	'framework' => array(

		// Common
		'common/class-common',
		'common/class-integration-manager',

		// Customizer Settings
		'customizer/class-customizer-manager',

		// Shortcodes
		'shortcodes/class-shortcode-manager',

		// Utility
		'utility/helpers',
		'utility/api',

	),

	// Loaded when logged in.
	'builder' => array(

		// Utility
		'utility/wp-clean-slate',

		// Builder
		'builder/class-builder',
		'builder/class-preview-window',
		'builder/class-router',
		'builder/class-control-mixins',
		'builder/class-data-controller',
		'builder/class-setting-section-base',
		'builder/class-setting-sections-manager',

		// Layout
		'layouts/class-layout-manager',
		'layouts/class-user-layout-manager',

		// Elements
		'elements/class-element-base',
		'elements/class-element-manager',
		'elements/class-element-renderer',


		// Admin
		'admin/class-admin',
		'admin/class-settings-handler',

		// Tools
		'tools/class-code-editor',
		'tools/class-shortcode-generator',
		'tools/functions'

	)
);