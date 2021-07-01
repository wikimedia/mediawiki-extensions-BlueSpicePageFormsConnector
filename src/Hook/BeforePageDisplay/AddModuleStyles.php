<?php

namespace BlueSpice\PageFormsConnector\Hook\BeforePageDisplay;

class AddModuleStyles extends \BlueSpice\Hook\BeforePageDisplay {

	protected function skipProcessing() {
		$action = $this->out->getRequest()->getText( 'action', 'view' );
		if ( $action === 'formedit' ) {
			return false;
		}
		if ( $this->out->getTitle()->isSpecial( 'FormEdit' ) ) {
			return false;
		}

		return true;
	}

	protected function doProcess() {
		$this->out->addModuleStyles( 'ext.bluespice.pageformsconnector.styles' );

		return true;
	}
}
