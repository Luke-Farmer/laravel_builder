<?php
require_once( 'defines.php' );

Class instagram_basic_display_api {
    private $_appId = INSTAGRAM_APP_ID;
    private $_appSecret = INSTAGRAM_APP_SECRET;
    private $_redirectUrl = INSTAGRAM_APP_REDIRECT_URI;
    private $_getCode = '';
    private $_apiBaseUrl = 'https://api.instagram.com/';
    private $_graphBaseUrl = 'https://graph.instagram.com/';
    private $_userAccessToken = '';
    private $_userAccessTokenExpires = '';

    public $authorizationUrl = '';

    function __construct( $params ) {
        // save instagram code
        $this->_getCode = $params['get_code'];

        // get an access token

        // get authorization url
        $this->_setAuthorizationUrl();
    }

    private function _setAuthorizationUrl() {
        $getVars = array(
            'app_id' => $this->_appId,
            'redirect_uri' => $this->_redirectUrl,
            'scope' => 'user_profile,user_media',
            'response_type' => 'code'
        );

        // create url
        $this->authorizationUrl = $this->_apiBaseUrl . 'oauth/authorize?' . http_build_query( $getVars );
    }

}