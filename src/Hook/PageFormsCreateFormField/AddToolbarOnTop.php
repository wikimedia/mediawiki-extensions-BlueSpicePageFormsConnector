<?php

namespace BlueSpice\PageFormsConnector\Hook\PageFormsCreateFormField;

use PFFormField;

class AddToolbarOnTop {

	/**
	 * @param PFFormField &$formField
	 * @param string &$curValue
	 * @param array $formSubmitted
	 * @return true|void
	 */
	public static function callback( &$formField, &$curValue, $formSubmitted ) {
		if ( !$formField->hasFieldArg( 'editor' ) ) {
			return true;
		}
		if ( $formField->getFieldArg( 'editor' ) !== 'visualeditor' ) {
			return true;
		}

		$class = 'toolbarOnTop';
		if ( $formField->hasFieldArg( 'class' ) ) {
			if ( str_contains( $formField->getFieldArg( 'class' ), 'toolbarOnTop' ) ) {
				return true;
			}
			$class = $formField->getFieldArg( 'class' ) . ' ' . $class;
		}
		$formField->setFieldArg( 'class', $class );
	}
}
