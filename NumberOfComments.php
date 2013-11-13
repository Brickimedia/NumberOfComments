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

function getNumberOfComments( &$parser, &$cache, &$magicWordId, &$ret ) {
	
	$ret = 'NEED TO DO THIS!';
	
	return true;
}

$wgHooks['MagicWordwgVariableIDs'][] = 'declareNumberOfComments';
function declareNumberOfComments( &$customVariableIds ) {
	$customVariableIds[] = 'NoC';

	return true;
}