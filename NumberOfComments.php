<?php

require_once( "$IP/extensions/Comments/Comments.php" );

$wgExtensionCredits['variable'][] = array(
		'path' => __FILE__,
		'name' => 'NumberOfComments',
		'author' => 'UltrasonicNXT/Adam Carter',
		'url' => 'https://github.com/Brickimedia/NumberOfComments',
		'description-msg' => 'numberofcomments-desc',
		'version'  => 1.0,
);

$wgExtensionMessagesFiles['NumberOfComments'] = dirname(__FILE__) . '/NumberOfComments.i18n.php';
$wgExtensionMessagesFiles['NumberOfCommentsMagic'] = dirname(__FILE__) . '/NumberOfComments.i18n.magic.php';

$wgHooks['ParserGetVariableValueSwitch'][] = 'getNumberOfCommens';
$wgHooks['MagicWordwgVariableIDs'][] = 'declareNumberOfComments';

function getNumberOfComments( &$parser, &$cache, &$magicWordId, &$ret ) {
	$dbr = wfGetDB( DB_SLAVE );
	
	$id = $parser->getTitle()->getId();
	
	$res = $dbr->selectField(
			'Comments',
			'COUNT(*)',
			array( 'Comment_Page_ID', $id )
	);
	
	if( !$res ){
		$ret = 0;
	} else {
		$ret = intval( $res );
	}
	
	return true;
}

function declareNumberOfComments( &$customVariableIds ) {
	$customVariableIds[] = 'NoC';

	return true;
}