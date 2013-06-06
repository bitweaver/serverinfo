<?php
global $gBitSystem, $gLibertySystem, $gBitThemes;

$registerHash = array(
	'package_name' => 'serverinfo',
	'package_path' => dirname( __FILE__ ).'/',
);
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'serverinfo' ) ) {
}
?>
