<?php

namespace BlueSpice\PageFormsConnector\Hook\SpecialPageBeforeExecute;

use MediaWiki\MediaWikiServices;
use PermissionsError;
use SpecialPage;
use Title;

/** There is no \BlueSpice\Hook\SpecialPageBeforeExecute */
class CheckFormEditContext {

	/**
	 * @param SpecialPage $special
	 * @param string $subPage
	 * @return void
	 */
	public static function callback( SpecialPage $special, $subPage ) {
		if ( $special->getName() !== 'FormEdit' ) {
			return;
		}
		$subpageParts = explode( '/', $subPage, 2 );
		$pageName = $subpageParts[1] ?? $special->getRequest()->getVal( 'target', '' );
		if ( empty( $pageName ) ) {
			return;
		}
		$userCanReadPageUnderEdit = MediaWikiServices::getInstance()
			->getPermissionManager()
			->userCan( 'read', $special->getUser(), Title::newFromText( $pageName ) );

		if ( !$userCanReadPageUnderEdit ) {
			throw new PermissionsError( 'read' );
		}
	}
}
