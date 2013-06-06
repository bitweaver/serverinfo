<?php
global $gBitInstaller;
$gBitInstaller->registerPackageInfo( SERVERINFO_PKG_NAME, array(
	'description' => "Import Infomration about computer Servers",
	'license' => '<a href="http://www.gnu.org/licenses/licenses.html#LGPL">LGPL</a>',
) );

// ### Default UserPermissions
$gBitInstaller->registerUserPermissions( SERVERINFO_PKG_NAME, array(
	array('p_serverinfo_admin', 'Can adminster server informatoin', 'admin', SERVERINFO_PKG_NAME),
) );

