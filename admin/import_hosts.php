<?php
require_once( '../../kernel/setup_inc.php' );
require_once( WIKI_PKG_PATH.'BitPage.php' );
require_once( META_PKG_PATH.'meta_lib.php' );

$gBitSystem->verifyPermission( 'p_serverinfo_admin' );

$feedback = array();

if( !empty( $_REQUEST['import_hosts'] ) ) {
	if( !empty( $_FILES['serverinfo_hosts']['tmp_name'] ) ) {
		if( $hostFile = fopen( $_FILES['serverinfo_hosts']['tmp_name'], 'r' ) ) {
unset( $_FILES );
			$feedbackLine = '';
			while( $hostLine = trim( fgets( $hostFile ) ) ) {
				$feedbackLine = '';
				$hostData = array();
				$metaStore = array();
				$pageStore = array();
				$hostPage = new BitPage();

				$hostData = preg_split( '/[\h]+/', $hostLine );
				if( $pageData = BitPage::pageExists( $hostData[0] ) ) {
					// load exiting page
					$hostPage->mPageId = $pageData[0]['page_id'];
					$hostPage->load();
					$feedbackLine .= 'Loaded existing host '.$hostPage->getTitle();
				} else {
					// create the page
					$pageStore['title'] = $hostData[0];
					$hostPage->store( $pageStore );
					$feedbackLine .= 'Created new host '.$hostPage->getTitle();
				}
				switch( $hostData[1] ) {
					case 'A':
						if( $metaId = meta_get_attribute_id( 'IP' ) ) {
							$metaStore['metatt'][$metaId] = meta_get_value_id( $hostData[2] );
							$feedbackLine .= ' and added IP '.$hostData[2];
						}
						break;
					case 'CNAME':
						$aliasStore['title'] = $hostPage->getTitle(); // required for saving
						$aliasStore['alias_string'] = $hostData[2];
						$hostPage->store( $aliasStore );
						$feedbackLine .= ' and created an alias '.$hostData[2];
						break;
				}
				$feedback['success'][] = $feedbackLine;
				meta_content_store( $hostPage, $metaStore );
				unset( $hostPage );
			}
		}
	} else {
		$feedback['error'] = 'Could not read server hosts file';
	}
}

$gBitSmarty->assign( 'formFeedback', $feedback );

$gBitSystem->display( 'bitpackage:serverinfo/admin_import_hosts.tpl', 'Import Host Data' , array( 'display_mode' => 'admin' ));
