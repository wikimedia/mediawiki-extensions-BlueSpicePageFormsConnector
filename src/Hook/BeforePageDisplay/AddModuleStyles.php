<?php

namespace BlueSpice\PageFormsConnector\Hook\BeforePageDisplay;

class AddModuleStyles extends \BlueSpice\Hook\BeforePageDisplay {

	/**
	 * @inheritDoc
	 */
	protected function skipProcessing() {
		$action = $this->out->getRequest()->getText( 'action', 'view' );
		if ( $action === 'formedit' ) {
			return false;
		}
		$title = $this->out->getTitle();
		if ( $title && $title->isSpecial( 'FormEdit' ) ) {
			return false;
		}

		return true;
	}

	/**
	 * @inheritDoc
	 */
	protected function doProcess() {
		$this->out->addModuleStyles( 'ext.bluespice.pageformsconnector.styles' );

		return true;
	}
}
