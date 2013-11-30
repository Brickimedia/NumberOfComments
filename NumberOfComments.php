<?php

require_once( "$IP/extensions/Comments/Comment.php" );

$wgExtensionCredits['variable'][] = array(
	'path' => __FILE__,
	'name' => 'NumberOfComments',
	'version' => 1.0,
	'author' => 'UltrasonicNXT/Adam Carter',
	'url' => 'https://github.com/Brickimedia/NumberOfComments',
	'description-msg' => 'numberofcomments-desc',
);

$wgExtensionMessagesFiles['NumberOfComments'] = __DIR__ . '/NumberOfComments.i18n.php';
$wgExtensionMessagesFiles['NumberOfCommentsMagic'] = __DIR__ . '/NumberOfComments.i18n.magic.php';

$wgHooks['ParserGetVariableValueSwitch'][] = 'NumberOfComments::getNumberOfCommentsMagic';
$wgHooks['MagicWordwgVariableIDs'][] = 'NumberOfComments::declareNumberOfCommentsMagic';
$wgHooks['ParserFirstCallInit'][] = 'NumberOfComments::setupNumberOfCommentsParser';

$wgAutoloadClasses['NumberOfComments'] = __DIR__ . '/NumberOfComments.body.php';

require_once( __DIR__ . '/NumberOfComments.body.php' );