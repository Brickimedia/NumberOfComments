<?php

require_once( "$IP/extensions/Comments/Comment.php" );

$wgExtensionCredits['variable'][] = array(
		'path' => __FILE__,
		'name' => 'NumberOfComments',
		'author' => 'UltrasonicNXT/Adam Carter',
		'url' => 'https://github.com/Brickimedia/NumberOfComments',
		'description-msg' => 'numberofcomments-desc',
		'version'  => 1.0,
);

$wgExtensionMessagesFiles['NumberOfComments'] = __DIR__ . '/NumberOfComments.i18n.php';
$wgExtensionMessagesFiles['NumberOfCommentsMagic'] = __DIR__ . '/NumberOfComments.i18n.magic.php';

$wgHooks['ParserGetVariableValueSwitch'][] = 'NumberOfComments::getNumberOfCommentsMagic';
$wgHooks['MagicWordwgVariableIDs'][] = 'NumberOfComments::declareNumberOfCommentsMagic';
$wgHooks['ParserFirstCallInit'][] = 'NumberOfComments::setupNumberOfCommentsParser';

$wgAutoLoadClasses['NumberOfComments'] = __DIR__ . '/NumberOfComments.body.php';

require_once( __DIR__. '/NumberOfComments.body.php' );