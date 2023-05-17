<?php
require_once(__DIR__ . '/../../../resources/views/instagram/instagram_basic_display_api.php' );

$accessToken = 'ACCESS-TOKEN';

$params = array(
    'get_code' => $_GET['code'] ?? ''
);
$ig = new instagram_basic_display_api( $params );
?>
<a href="<?php echo $ig->authorizationUrl; ?>" class="button-new">linka ccount</a>
