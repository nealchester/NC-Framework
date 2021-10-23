<?php

function nc_new_contactmethods($contactmethods){
    $contactmethods['phonenumber'] = __('Phone Number','nc-framework');
    $contactmethods['facebook']     = 'Facebook';
    $contactmethods['twitter']      = 'Twitter';
    $contactmethods['linkedin']     = 'LinkedIn';
    $contactmethods['pinterest']    = 'Pinterest';
    $contactmethods['instagram']    = 'Instagram';
    $contactmethods['youtube']      = 'Youtube';
    $contactmethods['vimeo']        = 'Vimeo';
    $contactmethods['tumblr']       = 'Tumblr';

    // Remove useless
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    return $contactmethods;
}

add_filter('user_contactmethods', 'nc_new_contactmethods', 10, 1);

?>