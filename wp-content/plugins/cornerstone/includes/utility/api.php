<?php

/**
 * Public API
 * These functions expose Cornerstone APIs, allowing it to be extended.
 * The processes represented here are otherwise handled internally.
 */


/**
 * Add a new Element to the Builder interface
 * Remember that elements must inherit from Cornerstone_Element_Base
 * This should be called from the cornerstone_load_elements action
 * @param  string $class_name Name of class for the custom element
 * @return none
 */
function cornerstone_add_element( $class_name ) {
	CS()->elements()->add( $class_name );
}

/**
 * Remove a previously added element from the Builder interface.
 * @param  string $name Name used when the element's class was added
 * @return none
 */
function cornerstone_remove_element( $name ) {
	CS()->elements()->remove( $name );
}

/**
 * Registers a class as a candidate for Cornerstone Integration
 * Call from within this hook: cornerstone_integrations (happens before init)
 * @param  string $name       unique handle
 * @param  string $class_name Class to test conditions for, and eventually load
 * @return  none
 */
function cornerstone_register_integration( $name, $class_name ) {
	CS()->integrations()->register( $name, $class_name );
}

/**
 * Unregister an integration that's been added so far
 * Call from within this hook: cornerstone_integrations (happens before init)
 * You may need to call on a later priority to ensure it was already registered
 * @param  string $name       unique handle
 * @return  none
 */
function cornerstone_unregister_integration( $name ) {
	CS()->integrations()->unregister( $name );
}
