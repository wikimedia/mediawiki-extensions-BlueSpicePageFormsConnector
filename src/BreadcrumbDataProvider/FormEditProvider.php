<?php

namespace BlueSpice\PageFormsConnector\BreadcrumbDataProvider;

use BlueSpice\Discovery\BreadcrumbDataProvider\BaseBreadcrumbDataProvider;
use Title;

class FormEditProvider extends BaseBreadcrumbDataProvider {

	/**
	 * @param Title $title
	 * @return Title
	 */
	public function getRelevantTitle( $title ): Title {
		// FormEdit/FormName/Page/Subpage => Page/Subpage
		$bits = explode( '/', $title->getText() );
		// Remove first two bits
		array_shift( $bits );
		array_shift( $bits );

		if ( count( $bits ) === 0 ) {
			return $title;
		}
		return $this->titleFactory->newFromText( implode( '/', $bits ) );
	}

	/**
	 * @param Title $title
	 * @return array
	 */
	public function getLabels( $title ): array {
		return [
			'text' => $this->messageLocalizer->msg( 'formedit' )
		];
	}

	/**
	 * @param Title $title
	 * @return bool
	 */
	public function applies( Title $title ): bool {
		return $title->isSpecial( 'FormEdit' );
	}
}
