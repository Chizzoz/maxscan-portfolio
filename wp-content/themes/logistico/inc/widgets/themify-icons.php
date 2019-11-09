<?php
/**
 * Themify Icon List for logistico
 */
function logistico_get_social_icons() {
    $ti_icons =  array(
        'ti-instagram',
        'ti-google',
        'ti-github',
        'ti-flickr',
        'ti-facebook',
        'ti-dropbox',
        'ti-dribbble',
        'ti-apple',
        'ti-android',
        'ti-yahoo',
        'ti-wordpress',
        'ti-vimeo-alt',
        'ti-twitter-alt',
        'ti-tumblr-alt',
        'ti-trello',
        'ti-stack-overflow',
        'ti-soundcloud',
        'ti-sharethis',
        'ti-sharethis-alt',
        'ti-reddit',
        'ti-pinterest-alt',
        'ti-microsoft-alt',
        'ti-linux',
        'ti-jsfiddle',
        'ti-joomla',
        'ti-html5',
        'ti-flickr-alt',
        'ti-email',
        'ti-drupal',
        'ti-dropbox-alt',
        'ti-css3',
        'ti-rss',
        'ti-rss-alt',
    );
    return apply_filters('logistico_ti_icon_list', $ti_icons);
}
