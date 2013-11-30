<?php

class NumberOfComments {

	static function declareNumberOfCommentsMagic( &$customVariableIds ) {
		$customVariableIds[] = 'NoC';
		return true;
	}

	static function setupNumberOfCommentsParser( &$parser ) {
		$parser->setFunctionHook( 'NoC', 'NumberOfComments::getNumberOfCommentsParser', SFH_NO_HASH );
		return true;
	}

	static function getNumberOfCommentsMagic( &$parser, &$cache, &$magicWordId, &$ret ) {
		$id = $parser->getTitle()->getArticleID();
		$ret = NumberOfComments::getNumberOfComments( $id );

		return true;
	}

	static function getNumberOfCommentsParser( $parser, $page = 'default', $param2 = '', $param3 = '' ) {
		$page = Title::newFromText( $page );

		if ( $page instanceof Title ) {
			$id = $page->getArticleID();
		} else {
			$id = $parser->getTitle()->getArticleID();
		}

		return NumberOfComments::getNumberOfComments( $id );
	}

	static function getNumberOfComments( $pageId ) {
		$dbr = wfGetDB( DB_SLAVE );

		$res = $dbr->selectField(
			'Comments',
			'COUNT(*)',
			array( 'Comment_Page_ID' => $pageId ),
			__METHOD__
		);

		if ( !$res ) {
			return 0;
		} else {
			return intval( $res );
		}
	}
}