<?php

//
// Variables.
//

$param_icon_value          = array( 'glass', 'music', 'search', 'envelope-o', 'heart', 'star', 'star-o', 'user', 'film', 'th-large', 'th', 'th-list', 'check', 'times', 'search-plus', 'search-minus', 'power-off', 'signal', 'gear', 'cog', 'trash-o', 'home', 'file-o', 'clock-o', 'road', 'download', 'arrow-circle-o-down', 'arrow-circle-o-up', 'inbox', 'play-circle-o', 'rotate-right', 'repeat', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcode', 'tag', 'tags', 'book', 'bookmark', 'print', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'list', 'dedent', 'outdent', 'indent', 'video-camera', 'photo', 'image', 'picture-o', 'pencil', 'map-marker', 'adjust', 'tint', 'edit', 'pencil-square-o', 'share-square-o', 'check-square-o', 'arrows', 'step-backward', 'fast-backward', 'backward', 'play', 'pause', 'stop', 'forward', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-circle', 'minus-circle', 'times-circle', 'check-circle', 'question-circle', 'info-circle', 'crosshairs', 'times-circle-o', 'check-circle-o', 'ban', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'mail-forward', 'share', 'expand', 'compress', 'plus', 'minus', 'asterisk', 'exclamation-circle', 'gift', 'leaf', 'fire', 'eye', 'eye-slash', 'warning', 'exclamation-triangle', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-cart', 'folder', 'folder-open', 'arrows-v', 'arrows-h', 'bar-chart-o', 'twitter-square', 'facebook-square', 'camera-retro', 'key', 'gears', 'cogs', 'comments', 'thumbs-o-up', 'thumbs-o-down', 'star-half', 'heart-o', 'sign-out', 'linkedin-square', 'thumb-tack', 'external-link', 'sign-in', 'trophy', 'github-square', 'upload', 'lemon-o', 'phone', 'square-o', 'bookmark-o', 'phone-square', 'twitter', 'facebook', 'github', 'unlock', 'credit-card', 'rss', 'hdd-o', 'bullhorn', 'bell', 'certificate', 'hand-o-right', 'hand-o-left', 'hand-o-up', 'hand-o-down', 'arrow-circle-left', 'arrow-circle-right', 'arrow-circle-up', 'arrow-circle-down', 'globe', 'wrench', 'tasks', 'filter', 'briefcase', 'arrows-alt', 'group', 'users', 'chain', 'link', 'cloud', 'flask', 'cut', 'scissors', 'copy', 'files-o', 'paperclip', 'save', 'floppy-o', 'square', 'navicon', 'reorder', 'bars', 'list-ul', 'list-ol', 'strikethrough', 'underline', 'table', 'magic', 'truck', 'pinterest', 'pinterest-square', 'google-plus-square', 'google-plus', 'money', 'caret-down', 'caret-up', 'caret-left', 'caret-right', 'columns', 'unsorted', 'sort', 'sort-down', 'sort-desc', 'sort-up', 'sort-asc', 'envelope', 'linkedin', 'rotate-left', 'undo', 'legal', 'gavel', 'dashboard', 'tachometer', 'comment-o', 'comments-o', 'flash', 'bolt', 'sitemap', 'umbrella', 'paste', 'clipboard', 'lightbulb-o', 'exchange', 'cloud-download', 'cloud-upload', 'user-md', 'stethoscope', 'suitcase', 'bell-o', 'coffee', 'cutlery', 'file-text-o', 'building-o', 'hospital-o', 'ambulance', 'medkit', 'fighter-jet', 'beer', 'h-square', 'plus-square', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-double-down', 'angle-left', 'angle-right', 'angle-up', 'angle-down', 'desktop', 'laptop', 'tablet', 'mobile-phone', 'mobile', 'circle-o', 'quote-left', 'quote-right', 'spinner', 'circle', 'mail-reply', 'reply', 'github-alt', 'folder-o', 'folder-open-o', 'smile-o', 'frown-o', 'meh-o', 'gamepad', 'keyboard-o', 'flag-o', 'flag-checkered', 'terminal', 'code', 'mail-reply-all', 'reply-all', 'star-half-empty', 'star-half-full', 'star-half-o', 'location-arrow', 'crop', 'code-fork', 'unlink', 'chain-broken', 'question', 'info', 'exclamation', 'superscript', 'subscript', 'eraser', 'puzzle-piece', 'microphone', 'microphone-slash', 'shield', 'calendar-o', 'fire-extinguisher', 'rocket', 'maxcdn', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-circle-down', 'html5', 'css3', 'anchor', 'unlock-alt', 'bullseye', 'ellipsis-h', 'ellipsis-v', 'rss-square', 'play-circle', 'ticket', 'minus-square', 'minus-square-o', 'level-up', 'level-down', 'check-square', 'pencil-square', 'external-link-square', 'share-square', 'compass', 'toggle-down', 'caret-square-o-down', 'toggle-up', 'caret-square-o-up', 'toggle-right', 'caret-square-o-right', 'euro', 'eur', 'gbp', 'dollar', 'usd', 'rupee', 'inr', 'cny', 'rmb', 'yen', 'jpy', 'ruble', 'rouble', 'rub', 'won', 'krw', 'bitcoin', 'btc', 'file', 'file-text', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'thumbs-up', 'thumbs-down', 'youtube-square', 'youtube', 'xing', 'xing-square', 'youtube-play', 'dropbox', 'stack-overflow', 'instagram', 'flickr', 'adn', 'bitbucket', 'bitbucket-square', 'tumblr', 'tumblr-square', 'long-arrow-down', 'long-arrow-up', 'long-arrow-left', 'long-arrow-right', 'apple', 'windows', 'android', 'linux', 'dribbble', 'skype', 'foursquare', 'trello', 'female', 'male', 'gittip', 'sun-o', 'moon-o', 'archive', 'bug', 'vk', 'weibo', 'renren', 'pagelines', 'stack-exchange', 'arrow-circle-o-right', 'arrow-circle-o-left', 'toggle-left', 'caret-square-o-left', 'dot-circle-o', 'wheelchair', 'vimeo-square', 'turkish-lira', 'try', 'plus-square-o', 'space-shuttle', 'slack', 'envelope-square', 'wordpress', 'openid', 'institution', 'bank', 'university', 'mortar-board', 'graduation-cap', 'yahoo', 'google', 'reddit', 'reddit-square', 'stumbleupon-circle', 'stumbleupon', 'delicious', 'digg', 'pied-piper-square', 'pied-piper', 'pied-piper-alt', 'drupal', 'joomla', 'language', 'fax', 'building', 'child', 'paw', 'spoon', 'cube', 'cubes', 'behance', 'behance-square', 'steam', 'steam-square', 'recycle', 'automobile', 'car', 'cab', 'taxi', 'tree', 'spotify', 'deviantart', 'soundcloud', 'database', 'file-pdf-o', 'file-word-o', 'file-excel-o', 'file-powerpoint-o', 'file-photo-o', 'file-picture-o', 'file-image-o', 'file-zip-o', 'file-archive-o', 'file-sound-o', 'file-audio-o', 'file-movie-o', 'file-video-o', 'file-code-o', 'vine', 'codepen', 'jsfiddle', 'life-bouy', 'life-saver', 'support', 'life-ring', 'circle-o-notch', 'ra', 'rebel', 'ge', 'empire', 'git-square', 'git', 'hacker-news', 'tencent-weibo', 'qq', 'wechat', 'weixin', 'send', 'paper-plane', 'send-o', 'paper-plane-o', 'history', 'circle-thin', 'header', 'paragraph', 'sliders', 'share-alt', 'share-alt-square', 'bomb' );
$param_social_icon_value   = array( 'thumb-up', 'thumb-down', 'rss', 'facebook', 'twitter', 'pinterest', 'github', 'path', 'linkedin', 'dribbble', 'stumble-upon', 'behance', 'reddit', 'google-plus', 'youtube', 'vimeo', 'flickr', 'slideshare', 'picassa', 'skype', 'steam', 'instagram', 'foursquare', 'delicious', 'chat', 'torso', 'tumblr', 'video-chat', 'digg', 'wordpress' );

sort( $param_icon_value );
sort( $param_social_icon_value );

//
// Section
//

// csg_map( array(
//   'id'        => 'x_section',
//   'title'        => __( 'Section', csl18n() ),
//   'section'    => __( 'Structure', csl18n() ),
//   'description' => __( 'Top level structure.', csl18n() ),
//   'demo' => 'http://theme.co/x/demo/integrity/1/shortcodes/content-band/',
//   'params'      => array(
//     array(
//       'param_name'  => 'bg_color',
//       'heading'     => __( 'Background Color', csl18n() ),
//       'description' => __( 'Select the background color of your section (leave blank for "transparent").', csl18n() ),
//       'type'        => 'colorpicker',
//     ),
//     array(
//       'param_name'  => 'bg_pattern',
//       'heading'     => __( 'Background Pattern', csl18n() ),
//       'description' => __( 'Upload a background pattern to your section.', csl18n() ),
//       'type'        => 'attach_image',
//     ),
//     array(
//       'param_name'  => 'bg_image',
//       'heading'     => __( 'Background Image', csl18n() ),
//       'description' => __( 'Upload a background image to your section (this will overwrite your Background Pattern).', csl18n() ),
//       'type'        => 'attach_image',
//     ),
//     array(
//       'param_name'  => 'parallax',
//       'heading'     => __( 'Parallax', csl18n() ),
//       'description' => __( 'Select to activate the parallax effect with background patterns and images.', csl18n() ),
//       'type'        => 'checkbox',
//       'value'       => 'true'
//     ),
//     array(
//       'param_name'  => 'bg_video',
//       'heading'     => __( 'Background Video', csl18n() ),
//       'description' => __( 'Include the path to your background video (this will overwrite both your Background Pattern and Background Image).', csl18n() ),
//       'type'        => 'textfield',
//     ),
//     array(
//       'param_name'  => 'bg_video_poster',
//       'heading'     => __( 'Background Video Poster', csl18n() ),
//       'description' => __( 'Include a poster image for your background video on mobile devices.', csl18n() ),
//       'type'        => 'attach_image',
//     ),
//     array(
//       'param_name'  => 'class',
//       'heading'     => __( 'Class', csl18n() ),
//       'description' => __( '(Optional) Enter a unique class name.', csl18n() ),
//       'type'        => 'textfield',
//       'advanced'    => true
//     ),
//     csg_map_default_style()
//   )
// ));



// //
// // Row.
// //

// csg_map(
//   array(
//     'id'            => 'x_row',
//     'title'            => __( 'Row', csl18n() ),
//     'section'        => __( 'Structure', csl18n() ),
//     'description'     => __( 'Use a row to group your columns.', csl18n() ),
//     'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/container/',
//   'params'          => array(
//       array(
//       'param_name'  => 'inner_container',
//       'heading'     => __( 'Inner Container', csl18n() ),
//       'description' => __( 'Use this to contain this row to your site max width.', csl18n() ),
//       'type'        => 'checkbox',
//       'value'       => 'true'
//     ),
//     array(
//         'param_name'  => 'marginless_columns',
//         'heading'     => __( 'Marginless Columns', csl18n() ),
//         'description' => __( 'Select to make columns marginless.', csl18n() ),
//         'type'        => 'checkbox',
//         'value'       => 'true'
//       ),
//     array(
//       'param_name'  => 'bg_color',
//       'heading'     => __( 'Background Color', csl18n() ),
//       'description' => __( 'Select the background color of your row (leave blank for "transparent").', csl18n() ),
//       'type'        => 'colorpicker',
//     ),
//       csg_map_default_id(),
//       csg_map_default_class(),
//       csg_map_default_style()
//     )
//   )
// );


// //
// // Column
// //

// csg_map(
//   array(
//     'id'          => 'x_column',
//     'title'       => __( 'Column', csl18n() ),
//     'section'     => __( 'Structure', csl18n() ),
//     'description' => __( 'Create a custom layout with multiple columns.', csl18n() ),
//     'demo' => 'http://theme.co/x/demo/integrity/1/shortcodes/columns/',
//     'params'      => array(
//       array(
//         'param_name'  => 'type',
//         'heading'     => __( 'Column Width', csl18n() ),
//         'description' => __( 'Select how much space you want this column to fill.', csl18n() ),
//         'type'        => 'dropdown',
//         'value'       => array(
//           'One Half'      => 'one-half',
//           'One Third'     => 'one-third',
//           'Two Thirds'    => 'two-thirds',
//           'One Fourth'    => 'one-fourth',
//           'Three Fourths' => 'three-fourths',
//           'One Fifth'     => 'one-fifth',
//           'Two Fifths'    => 'two-fifths',
//           'Three Fifths'  => 'three-fifths',
//           'Four Fifths'   => 'four-fifths',
//         )
//       ),
//       array(
//         'param_name'  => 'last',
//         'heading'     => __( 'Last', csl18n() ),
//         'description' => __( 'If this is the last column in a row, enable this so things will clear properly.', csl18n() ),
//         'type'        => 'checkbox',
//         'value'       => 'true'
//       ),
//       array(
//         'param_name'  => 'fade',
//         'heading'     => __( 'Fade Effect', csl18n() ),
//         'description' => __( 'Select to activate the fade effect.', csl18n() ),
//         'type'        => 'checkbox',
//         'value'       => 'true'
//       ),
//       array(
//         'param_name'  => 'fade_animation',
//         'heading'     => __( 'Fade Animation', csl18n() ),
//         'description' => __( 'Select the type of fade animation you want to use.', csl18n() ),
//         'type'        => 'dropdown',
//         'value'       => array(
//           'In'             => 'in',
//           'In From Top'    => 'in-from-top',
//           'In From Left'   => 'in-from-left',
//           'In From Right'  => 'in-from-right',
//           'In From Bottom' => 'in-from-bottom'
//         )
//       ),
//       array(
//         'param_name'  => 'fade_animation_offset',
//         'heading'     => __( 'Fade Animation Offset', csl18n() ),
//         'description' => __( 'Set how large you want the offset for your fade animation to be.', csl18n() ),
//         'type'        => 'textfield',
//         'value'       => '45px'
//       ),
//       csg_map_default_id(),
//       csg_map_default_class(),
//       csg_map_default_style(),
//     )
//   )
// );

//
// Horizontal rule.
//

csg_map(
  array(
    'id'        => 'x_line',
    'title'        => __( 'Line', csl18n() ),
    'section'    => __( 'Structure', csl18n() ),
    'description' => __( 'Place a horizontal rule in your content', csl18n() ),
    'demo' => 'http://theme.co/x/demo/integrity/1/shortcodes/line/',
    'params'      => array(
      csg_map_default_id( array( 'advanced' => false ) ),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Gap.
//

csg_map(
  array(
    'id'        => 'x_gap',
    'title'        => __( 'Gap', csl18n() ),
    'section'    => __( 'Structure', csl18n() ),
    'description' => __( 'Insert a vertical gap in your content', csl18n() ),
    'demo' => 'http://theme.co/x/demo/integrity/1/shortcodes/gap/',
  'params'      => array(
      array(
        'param_name'  => 'size',
        'heading'     => __( 'Size', csl18n() ),
        'description' => __( 'Enter in the size of your gap. Pixels, ems, and percentages are all valid units of measurement.', csl18n() ),
        'type'        => 'textfield',
        'value'       => '1.313em'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style(),
    )
  )
);


//
// Clear.
//

csg_map(
  array(
    'id'        => 'x_clear',
    'title'        => __( 'Clear', csl18n() ),
    'section'    => __( 'Structure', csl18n() ),
    'description' => __( 'Clear floated elements in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/clear/',
  'params'      => array(
      csg_map_default_id( array( 'advanced' => false) ),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Blockquote.
//

csg_map(
  array(
    'id'        => 'x_blockquote',
    'title'        => __( 'Blockquote', csl18n() ),
    'section'    => __( 'Typography', csl18n() ),
    'description' => __( 'Include a blockquote in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/blockquote/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'cite',
        'heading'     => __( 'Cite', csl18n() ),
        'description' => __( 'Cite the person you are quoting.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', csl18n() ),
        'description' => __( 'Select the alignment of the blockquote.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Pullquote.
//

csg_map(
  array(
    'id'        => 'x_pullquote',
    'title'        => __( 'Pullquote', csl18n() ),
    'section'    => __( 'Typography', csl18n() ),
    'description' => __( 'Include a pullquote in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/pullquote/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'cite',
        'heading'     => __( 'Cite', csl18n() ),
        'description' => __( 'Cite the person you are quoting.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', csl18n() ),
        'description' => __( 'Select the alignment of the pullquote.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'   => 'left',
          'Right'  => 'right'
        )
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style(),
    )
  )
);


//
// Alert.
//

csg_map(
  array(
    'id'        => 'x_alert',
    'title'        => __( 'Alert', csl18n() ),
    'section'    => __( 'Information', csl18n() ),
    'description' => __( 'Provide information to users with alerts', csl18n() ),
    'demo' => 'http://theme.co/x/demo/integrity/1/shortcodes/alert/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'heading',
        'heading'     => __( 'Heading', csl18n() ),
        'description' => __( 'Enter the heading of your alert.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Type', csl18n() ),
        'description' => __( 'Select the alert style.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Success' => 'success',
          'Info'    => 'info',
          'Warning' => 'warning',
          'Danger'  => 'danger',
          'Muted'   => 'muted'
        )
      ),
      array(
        'param_name'  => 'close',
        'heading'     => __( 'Close', csl18n() ),
        'description' => __( 'Select to display the close button.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Map.
//

csg_map(
  array(
    'id'        => 'x_map',
    'title'        => __( 'Map (Embed)', csl18n() ),
    'section'    => __( 'Media', csl18n() ),
    'description' => __( 'Embed a map from a third-party provider', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/map/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Code (See Notes Below)', csl18n() ),
        'description' => __( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', csl18n() ),
        'description' => __( 'Select to remove the container around the map.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style(),
    )
  )
);


//
// Google map.
//

csg_map(
  array(
    'id'            => 'x_google_map',
    'title'            => __( 'Google Map', csl18n() ),
    'weight'          => 530,
    'icon'            => 'google-map',
    'section'        => __( 'Media', csl18n() ),
    'description'     => __( 'Embed a customizable Google map', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/map/',
  'params'          => array(
      array(
        'param_name'  => 'lat',
        'heading'     => __( 'Latitude', csl18n() ),
        'description' => __( 'Enter in the center latitude of your map.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'lng',
        'heading'     => __( 'Longitude', csl18n() ),
        'description' => __( 'Enter in the center longitude of your map.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'drag',
        'heading'     => __( 'Draggable', csl18n() ),
        'description' => __( 'Select to allow your users to drag the map view.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'zoom',
        'heading'     => __( 'Zoom Level', csl18n() ),
        'description' => __( 'Choose the initial zoom level of your map. This value should be between 1 and 18. 1 is fully zoomed out and 18 is right at street level.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'zoom_control',
        'heading'     => __( 'Zoom Control', csl18n() ),
        'description' => __( 'Select to activate the zoom control for the map.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'height',
        'heading'     => __( 'Height', csl18n() ),
        'description' => __( 'Choose an optional height for your map. If no height is selected, a responsive, proportional unit will be used. Any type of unit is acceptable (e.g. 450px, 30em, 40%, et cetera).', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'hue',
        'heading'     => __( 'Custom Color', csl18n() ),
        'description' => __( 'Choose an optional custom color for your map.', csl18n() ),
        'type'        => 'colorpicker',
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', csl18n() ),
        'description' => __( 'Select to remove the container around the map.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      csg_map_default_class(),
      csg_map_default_style(),
    )
  )
);


//
// Google map marker.
//

csg_map(
  array(
    'id'            => 'x_google_map_marker',
    'title'            => __( 'Google Map Marker', csl18n() ),
    'weight'          => 530,
    'icon'            => 'google-map-marker',
    'section'        => __( 'Media', csl18n() ),
    'description'     => __( 'Place a location marker on your Google map', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/map/',
  'params'          => array(
      array(
        'param_name'  => 'lat',
        'heading'     => __( 'Latitude', csl18n() ),
        'description' => __( 'Enter in the latitude of your marker.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'lng',
        'heading'     => __( 'Longitude', csl18n() ),
        'description' => __( 'Enter in the longitude of your marker.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'info',
        'heading'     => __( 'Additional Information', csl18n() ),
        'description' => __( 'Optional description text to appear in a popup when your marker is clicked on.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'image',
        'heading'     => __( 'Custom Marker Image', csl18n() ),
        'description' => __( 'Utilize a custom marker image instead of the default provided by Google.', csl18n() ),
        'type'        => 'attach_image',
      ),
    )
  )
);


//
// Skill bar.
//

csg_map(
  array(
    'id'        => 'x_skill_bar',
    'title'        => __( 'Skill Bar', csl18n() ),
    'section'    => __( 'Information', csl18n() ),
    'description' => __( 'Include an informational skill bar', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/skill-bar/',
  'params'      => array(
      array(
        'param_name'  => 'heading',
        'heading'     => __( 'Heading', csl18n() ),
        'description' => __( 'Enter the heading of your skill bar.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'percent',
        'heading'     => __( 'Percent', csl18n() ),
        'description' => __( 'Enter the percentage of your skill and be sure to include the percentage sign (i.e. 90%).', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'bar_text',
        'heading'     => __( 'Bar Text', csl18n() ),
        'description' => __( 'Enter in some alternate text in place of the percentage inside the skill bar.', csl18n() ),
        'type'        => 'textfield',
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Code.
//

csg_map(
  array(
    'id'        => 'x_code',
    'title'        => __( 'Code', csl18n() ),
    'section'    => __( 'Typography', csl18n() ),
    'description' => __( 'Add a block of example code to your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/code/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Buttons.
//

csg_map(
  array(
    'id'        => 'x_button',
    'title'        => __( 'Button', csl18n() ),
    'section'    => __( 'Marketing', csl18n() ),
    'description' => __( 'Add a clickable button to your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/buttons',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => '',
      ),
      array(
        'param_name'  => 'shape',
        'heading'     => __( 'Shape', csl18n() ),
        'description' => __( 'Select the button shape.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Square'  => 'square',
          'Rounded' => 'rounded',
          'Pill'    => 'pill'
        )
      ),
      array(
        'param_name'  => 'size',
        'heading'     => __( 'Size', csl18n() ),
        'description' => __( 'Select the button size.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Mini'        => 'mini',
          'Small'       => 'small',
          'Standard'    => 'regular',
          'Large'       => 'large',
          'Extra Large' => 'x-large',
          'Jumbo'       => 'jumbo'
        )
      ),
      array(
        'param_name'  => 'float',
        'heading'     => __( 'Float', csl18n() ),
        'description' => __( 'Optionally float the button.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'None'  => 'none',
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      array(
        'param_name'  => 'block',
        'heading'     => __( 'Block', csl18n() ),
        'description' => __( 'Select to make your button go fullwidth.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'circle',
        'heading'     => __( 'Marketing Circle', csl18n() ),
        'description' => __( 'Select to include a marketing circle around your button.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'icon_only',
        'heading'     => __( 'Icon Only', csl18n() ),
        'description' => __( 'Select if you are only using an icon in your button.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', csl18n() ),
        'description' => __( 'Enter in the URL you want your button to link to.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Enter in the title attribute you want for your button (will also double as title for popover or tooltip if you have chosen to display one).', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', csl18n() ),
        'description' => __( 'Select to open your button link in a new window.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'blank'
      ),
      array(
        'param_name'  => 'info',
        'heading'     => __( 'Info', csl18n() ),
        'description' => __( 'Select whether or not you want to add a popover or tooltip to your button.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'None'    => 'none',
          'Popover' => 'popover',
          'Tooltip' => 'tooltip'
        )
      ),
      array(
        'param_name'  => 'info_place',
        'heading'     => __( 'Info Placement', csl18n() ),
        'description' => __( 'Select where you want your popover or tooltip to appear.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Top'    => 'top',
          'Left'   => 'left',
          'Right'  => 'right',
          'Bottom' => 'bottom'
        )
      ),
      array(
        'param_name'  => 'info_trigger',
        'heading'     => __( 'Info Trigger', csl18n() ),
        'description' => __( 'Select what actions you want to trigger the popover or tooltip.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Hover' => 'hover',
          'Click' => 'click',
          'Focus' => 'focus'
        )
      ),
      array(
        'param_name'  => 'info_content',
        'heading'     => __( 'Info Content', csl18n() ),
        'description' => __( 'Extra content for the popover.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'lightbox_thumb',
        'heading'     => __( 'Lightbox Thumbnail', csl18n() ),
        'description' => __( 'Use this option to select a thumbnail for your lightbox thumbnail navigation or to set an image if you are linking out to a video.', csl18n() ),
        'type'        => 'attach_image',

      ),
      array(
        'param_name'  => 'lightbox_video',
        'heading'     => __( 'Lightbox Video', csl18n() ),
        'description' => __( 'Select if you are linking to a video from this button in the lightbox.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'lightbox_caption',
        'heading'     => __( 'Lightbox Caption', csl18n() ),
        'description' => __( 'Lightbox caption text.', csl18n() ),
        'type'        => 'textfield',

      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Block grid.
//

csg_map(
  array(
    'id'            => 'x_block_grid',
    'title'            => __( 'Block Grid', csl18n() ),
    'weight'          => 880,
    'icon'            => 'block-grid',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include a block grid container in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/block-grid/',
  'params'          => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Type', csl18n() ),
        'description' => __( 'Select how many block grid items you want per row.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Two'   => 'two-up',
          'Three' => 'three-up',
          'Four'  => 'four-up',
          'Five'  => 'five-up'
        )
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Block grid item.
//

csg_map(
  array(
    'id'            => 'x_block_grid_item',
    'title'            => __( 'Block Grid Item', csl18n() ),
    'weight'          => 870,
    'icon'            => 'block-grid-item',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include a block grid item in your block grid', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/block-grid/',
  'params'          => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Images.
//

csg_map(
  array(
    'id'        => 'x_image',
    'title'        => __( 'Image', csl18n() ),
    'section'    => __( 'Media', csl18n() ),
    'description' => __( 'Include an image in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/images/',
  'params'      => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Style', csl18n() ),
        'description' => __( 'Select the image style.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'      => 'none',
          'Thumbnail' => 'thumbnail',
          'Rounded'   => 'rounded',
          'Circle'    => 'circle'
        )
      ),
      array(
        'param_name'  => 'float',
        'heading'     => __( 'Float', csl18n() ),
        'description' => __( 'Optionally float the image.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'  => 'none',
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      array(
        'param_name'  => 'src',
        'heading'     => __( 'Src', csl18n() ),
        'description' => __( 'Enter your image.', csl18n() ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'alt',
        'heading'     => __( 'Alt', csl18n() ),
        'description' => __( 'Enter in the alt text for your image.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'link',
        'heading'     => __( 'Link', csl18n() ),
        'description' => __( 'Select to wrap your image in an anchor tag.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', csl18n() ),
        'description' => __( 'Enter in the URL you want your image to link to. If using this image for a lightbox, enter the URL of your media here (e.g. YouTube embed URL, et cetera). Leave this field blank if you want to link to the image uploaded to the "Src" for your lightbox.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Enter in the title attribute you want for your image (will also double as title for popover or tooltip if you have chosen to display one).', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', csl18n() ),
        'description' => __( 'Select to open your image link in a new window.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'blank'
      ),
      array(
        'param_name'  => 'info',
        'heading'     => __( 'Info', csl18n() ),
        'description' => __( 'Select whether or not you want to add a popover or tooltip to your image.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'    => 'none',
          'Popover' => 'popover',
          'Tooltip' => 'tooltip'
        )
      ),
      array(
        'param_name'  => 'info_place',
        'heading'     => __( 'Info Placement', csl18n() ),
        'description' => __( 'Select where you want your popover or tooltip to appear.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Top'    => 'top',
          'Left'   => 'left',
          'Right'  => 'right',
          'Bottom' => 'bottom'
        )
      ),
      array(
        'param_name'  => 'info_trigger',
        'heading'     => __( 'Info Trigger', csl18n() ),
        'description' => __( 'Select what actions you want to trigger the popover or tooltip.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Hover' => 'hover',
          'Click' => 'click',
          'Focus' => 'focus'
        )
      ),
      array(
        'param_name'  => 'info_content',
        'heading'     => __( 'Info Content', csl18n() ),
        'description' => __( 'Extra content for the popover.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'lightbox_thumb',
        'heading'     => __( 'Lightbox Thumbnail', csl18n() ),
        'description' => __( 'Use this option to select a different thumbnail for your lightbox thumbnail navigation or to set an image if you are linking out to a video. Will default to the "Src" image if nothing is set.', csl18n() ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'lightbox_video',
        'heading'     => __( 'Lightbox Video', csl18n() ),
        'description' => __( 'Select if you are linking to a video from this image in the lightbox.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'lightbox_caption',
        'heading'     => __( 'Lightbox Caption', csl18n() ),
        'description' => __( 'Lightbox caption text.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'id',
        'heading'     => __( 'ID', csl18n() ),
        'description' => __( '(Optional) Enter a unique ID.', csl18n() ),
        'type'        => 'textfield',

      ),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Icon list.
//

csg_map(
  array(
    'id'            => 'x_icon_list',
    'title'            => __( 'Icon List', csl18n() ),
    'weight'          => 780,
    'icon'            => 'icon-list',
    'section'        => __( 'Typography', csl18n() ),
    'description'     => __( 'Include an icon list in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/icon-list/',
  'params'          => array(
      csg_map_default_id( array( 'advanced' => false) ),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Icon list item.
//

csg_map(
  array(
    'id'            => 'x_icon_list_item',
    'title'            => __( 'Icon List Item', csl18n() ),
    'weight'          => 770,
    'icon'            => 'icon-list-item',
    'section'        => __( 'Typography', csl18n() ),
    'description'     => __( 'Include an icon list item in your icon list', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/icon-list/',
  'params'          => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Type', csl18n() ),
        'description' => __( 'Select your icon.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => $param_icon_value
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);



//
// Text columns.
//

csg_map(
  array(
    'id'        => 'x_columnize',
    'title'        => __( 'Columnize', csl18n() ),
    'section'    => __( 'Content', csl18n() ),
    'description' => __( 'Split your text into multiple columns', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/columnize/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Video player.
//

csg_map(
  array(
    'id'        => 'x_video_player',
    'title'        => __( 'Video (Self Hosted)', csl18n() ),
    'section'    => __( 'Media', csl18n() ),
    'description' => __( 'Include responsive video into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-video/',
  'params'      => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Aspect Ratio', csl18n() ),
        'description' => __( 'Select your aspect ratio.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          '16:9' => '16:9',
          '5:3'  => '5:3',
          '5:4'  => '5:4',
          '4:3'  => '4:3',
          '3:2'  => '3:2'
        )
      ),
      array(
        'param_name'  => 'm4v',
        'heading'     => __( 'M4V', csl18n() ),
        'description' => __( 'Include and .m4v version of your video.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'ogv',
        'heading'     => __( 'OGV', csl18n() ),
        'description' => __( 'Include and .ogv version of your video for additional native browser support.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'poster',
        'heading'     => __( 'Poster Image', csl18n() ),
        'description' => __( 'Include a poster image for your self-hosted video.', csl18n() ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'hide_controls',
        'heading'     => __( 'Hide Controls', csl18n() ),
        'description' => __( 'Select to hide the controls on your self-hosted video.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'autoplay',
        'heading'     => __( 'Autoplay', csl18n() ),
        'description' => __( 'Select to automatically play your self-hosted video.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', csl18n() ),
        'description' => __( 'Select to remove the container around the video.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Video embed.
//

csg_map(
  array(
    'id'        => 'x_video_embed',
    'title'        => __( 'Video (Embedded)', csl18n() ),
    'section'    => __( 'Media', csl18n() ),
    'description' => __( 'Include responsive video into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-video/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Code (See Notes Below)', csl18n() ),
        'description' => __( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Aspect Ratio', csl18n() ),
        'description' => __( 'Select your aspect ratio.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          '16:9' => '16:9',
          '5:3'  => '5:3',
          '5:4'  => '5:4',
          '4:3'  => '4:3',
          '3:2'  => '3:2'
        )
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', csl18n() ),
        'description' => __( 'Select to remove the container around the video.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Accordion.
//

csg_map(
  array(
    'id'            => 'x_accordion',
    'title'            => __( 'Accordion', csl18n() ),
    'weight'          => 930,
    'icon'            => 'accordion',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include an accordion into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/accordion/',
  'params'          => array(
      csg_map_default_id( array( 'advanced' => false) ),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Accordion item.
//

csg_map(
  array(
    'id'            => 'x_accordion_item',
    'title'            => __( 'Accordion Item', csl18n() ),
    'weight'          => 940,
    'icon'            => 'accordion-item',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include an accordion item in your accordion', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/accordion/',
  'params'          => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'parent_id',
        'heading'     => __( 'Parent ID', csl18n() ),
        'description' => __( 'Optionally include an ID given to the parent accordion to only allow one toggle to be open at a time.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Include a title for your accordion item.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'open',
        'heading'     => __( 'Open', csl18n() ),
        'description' => __( 'Select for your accordion item to be open by default.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Tab nav.
//

csg_map(
  array(
    'id'            => 'x_tab_nav',
    'title'            => __( 'Tab Nav', csl18n() ),
    'weight'          => 920,
    'icon'            => 'tab-nav',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include a tab nav into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
  'params'          => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Tab Nav Items Per Row', csl18n() ),
        'description' => __( 'If your tab nav is on top, select how many tab nav items you want per row.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'Two'   => 'two-up',
          'Three' => 'three-up',
          'Four'  => 'four-up',
          'Five'  => 'five-up'
        )
      ),
      array(
        'param_name'  => 'float',
        'heading'     => __( 'Tab Nav Position', csl18n() ),
        'description' => __( 'Select the position of your tab nav.', csl18n() ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'  => 'none',
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Tab nav item.
//

csg_map(
  array(
    'id'            => 'x_tab_nav_item',
    'title'            => __( 'Tab Nav Item', csl18n() ),
    'weight'          => 910,
    'icon'            => 'tab-nav-item',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include a tab nav item into your tab nav', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
  'params'          => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Include a title for your tab nav item.', csl18n() ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'active',
        'heading'     => __( 'Active', csl18n() ),
        'description' => __( 'Select to make this tab nav item active.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Tabs.
//

csg_map(
  array(
    'id'            => 'x_tabs',
    'title'            => __( 'Tabs', csl18n() ),
    'weight'          => 900,
    'icon'            => 'tabs',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include a tabs container after your tab nav', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
  'params'          => array(
      array(
        'param_name'  => 'id',
        'heading'     => __( 'ID', csl18n() ),
        'description' => __( '(Optional) Enter a unique ID.', csl18n() ),
        'type'        => 'textfield',

      ),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Tab.
//

csg_map(
  array(
    'id'            => 'x_tab',
    'title'            => __( 'Tab', csl18n() ),
    'weight'          => 890,
    'icon'            => 'tab',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Include a tab into your tabs container', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
  'params'          => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'active',
        'heading'     => __( 'Active', csl18n() ),
        'description' => __( 'Select to make this tab active.', csl18n() ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Responsive visibility.
//

csg_map(
  array(
    'id'            => 'x_visibility',
    'title'            => __( 'Visibility', csl18n() ),
    'weight'          => 850,
    'icon'            => 'visibility',
    'section'        => __( 'Content', csl18n() ),
    'description'     => __( 'Alter content based on screen size', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-visibility/',
  'params'          => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Visibility Type', csl18n() ),
        'description' => __( 'Select how you want to hide or show your content.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Hidden Phone'    => 'hidden-phone',
          'Hidden Tablet'   => 'hidden-tablet',
          'Hidden Desktop'  => 'hidden-desktop',
          'Visible Phone'   => 'visible-phone',
          'Visible Tablet'  => 'visible-tablet',
          'Visible Desktop' => 'visible-desktop'
        )
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Slider.
//

csg_map(
  array(
    'id'            => 'x_slider',
    'title'            => __( 'Slider', csl18n() ),
    'weight'          => 590,
    'icon'            => 'slider',
    'section'        => __( 'Media', csl18n() ),
    'description'     => __( 'Include a slider in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-slider/',
  'params'          => array(
      array(
        'param_name'  => 'animation',
        'heading'     => __( 'Animation', csl18n() ),
        'description' => __( 'Select your slider animation.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Slide' => 'slide',
          'Fade'  => 'fade'
        )
      ),
      array(
        'param_name'  => 'slide_time',
        'heading'     => __( 'Slide Time', csl18n() ),
        'description' => __( 'The amount of time a slide will stay visible in milliseconds.', csl18n() ),
        'type'        => 'textfield',

        'value'       => '5000'
      ),
      array(
        'param_name'  => 'slide_speed',
        'heading'     => __( 'Slide Speed', csl18n() ),
        'description' => __( 'The amount of time to transition between slides in milliseconds.', csl18n() ),
        'type'        => 'textfield',

        'value'       => '650'
      ),
      array(
        'param_name'  => 'slideshow',
        'heading'     => __( 'Slideshow', csl18n() ),
        'description' => __( 'Select for your slides to advance automatically.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'random',
        'heading'     => __( 'Random', csl18n() ),
        'description' => __( 'Select to randomly display your slides each time the page loads.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'control_nav',
        'heading'     => __( 'Control Navigation', csl18n() ),
        'description' => __( 'Select to display the control navigation.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'prev_next_nav',
        'heading'     => __( 'Previous/Next Navigation', csl18n() ),
        'description' => __( 'Select to display the previous/next navigation.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', csl18n() ),
        'description' => __( 'Select to remove the container from your slider.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Slide.
//

csg_map(
  array(
    'id'            => 'x_slide',
    'title'            => __( 'Slide', csl18n() ),
    'weight'          => 600,
    'icon'            => 'slide',
    'section'        => __( 'Media', csl18n() ),
    'description'     => __( 'Include a slide into your slider', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-slider/',
  'params'          => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',

        'value'       => ''
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Protected content.
//

csg_map(
  array(
    'id'        => 'x_protect',
    'title'        => __( 'Protect', csl18n() ),
    'section'    => __( 'Content', csl18n() ),
    'description' => __( 'Protect content from non logged in users', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/protected-content/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',

        'value'       => ''
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Recent posts.
//

csg_map(
  array(
    'id'        => 'x_recent_posts',
    'title'        => __( 'Recent Posts', csl18n() ),
    'section'    => __( 'Social', csl18n() ),
    'description' => __( 'Display your most recent posts', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/recent-posts/',
  'params'      => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Post Type', csl18n() ),
        'description' => __( 'Choose between standard posts or portfolio posts.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Posts'     => 'post',
          'Portfolio' => 'portfolio'
        )
      ),
      array(
        'param_name'  => 'count',
        'heading'     => __( 'Post Count', csl18n() ),
        'description' => __( 'Select how many posts to display.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4'
        )
      ),
      array(
        'param_name'  => 'offset',
        'heading'     => __( 'Offset', csl18n() ),
        'description' => __( 'Enter a number to offset initial starting post of your recent posts.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'section',
        'heading'     => __( 'Category', csl18n() ),
        'description' => __( 'To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'orientation',
        'heading'     => __( 'Orientation', csl18n() ),
        'description' => __( 'Select the orientation or your recent posts.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Horizontal' => 'horizontal',
          'Vertical'   => 'vertical'
        )
      ),
      array(
        'param_name'  => 'no_image',
        'heading'     => __( 'Remove Featured Image', csl18n() ),
        'description' => __( 'Select to remove the featured image.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'fade',
        'heading'     => __( 'Fade Effect', csl18n() ),
        'description' => __( 'Select to activate the fade effect.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Audio player.
//

csg_map(
  array(
    'id'        => 'x_audio_player',
    'title'        => __( 'Audio (Self Hosted)', csl18n() ),
    'section'    => __( 'Media', csl18n() ),
    'description' => __( 'Place audio files into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/audio/',
  'params'      => array(
      array(
        'param_name'  => 'mp3',
        'heading'     => __( 'MP3', csl18n() ),
        'description' => __( 'Include and .mp3 version of your audio.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'oga',
        'heading'     => __( 'OGA', csl18n() ),
        'description' => __( 'Include and .oga version of your audio for additional native browser support.', csl18n() ),
        'type'        => 'textfield',

      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Audio embed.
//

csg_map(
  array(
    'id'        => 'x_audio_embed',
    'title'        => __( 'Audio (Embedded)', csl18n() ),
    'section'    => __( 'Media', csl18n() ),
    'description' => __( 'Place audio files into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/audio/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Code (See Notes Below)', csl18n() ),
        'description' => __( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', csl18n() ),
        'type'        => 'textarea_html',

        'value'       => ''
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Pricing table.
//

csg_map(
  array(
    'id'            => 'x_pricing_table',
    'title'            => __( 'Pricing Table', csl18n() ),
    'weight'          => 680,
    'icon'            => 'pricing-table',
    'section'        => __( 'Marketing', csl18n() ),
    'description'     => __( 'Include a pricing table in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-pricing-table/',
  'params'          => array(
      array(
        'param_name'  => 'columns',
        'heading'     => __( 'Columns', csl18n() ),
        'description' => __( 'Select how many columns you want for your pricing table.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4',
          '5' => '5'
        )
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Pricing table column.
//

csg_map(
  array(
    'id'            => 'x_pricing_table_column',
    'title'            => __( 'Pricing Table Column', csl18n() ),
    'weight'          => 670,
    'icon'            => 'pricing-table-column',
    'section'        => __( 'Marketing', csl18n() ),
    'description'     => __( 'Include a pricing table column', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-pricing-table/',
  'params'          => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',

        'value'       => ''
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Include a title for your pricing column.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'featured',
        'heading'     => __( 'Featured', csl18n() ),
        'description' => __( 'Select to make this your featured offer.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'featured_sub',
        'heading'     => __( 'Featured Sub Heading', csl18n() ),
        'description' => __( 'Include a sub heading for your featured column.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'currency',
        'heading'     => __( 'Currency Symbol', csl18n() ),
        'description' => __( 'Enter in the currency symbol you want to use.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'price',
        'heading'     => __( 'Price', csl18n() ),
        'description' => __( 'Enter in the price for this pricing column.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'interval',
        'heading'     => __( 'Interval', csl18n() ),
        'description' => __( 'Enter in the time period that this pricing column is for.', csl18n() ),
        'type'        => 'textfield',

        'value'       => 'Per Month'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Callout.
//

csg_map(
  array(
    'id'        => 'x_callout',
    'title'        => __( 'Callout', csl18n() ),
    'section'    => __( 'Marketing', csl18n() ),
    'description' => __( 'Include a marketing callout into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/callout/',
  'params'      => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', csl18n() ),
        'description' => __( 'Select the alignment for your callout.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Enter the title for your callout.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'message',
        'heading'     => __( 'Message', csl18n() ),
        'description' => __( 'Enter the message for your callout.', csl18n() ),
        'type'        => 'textarea',

      ),
      array(
        'param_name'  => 'button_text',
        'heading'     => __( 'Button Text', csl18n() ),
        'description' => __( 'Enter the text for your callout button.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'button_icon',
        'heading'     => __( 'Button Icon', csl18n() ),
        'description' => __( 'Optionally enter the button icon.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => $param_icon_value
      ),
      array(
        'param_name'  => 'circle',
        'heading'     => __( 'Marketing Circle', csl18n() ),
        'description' => __( 'Select to include a marketing circle around your button.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', csl18n() ),
        'description' => __( 'Enter in the URL you want your callout button to link to.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', csl18n() ),
        'description' => __( 'Select to open your callout link button in a new window.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'blank'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Promo.
//

csg_map(
  array(
    'id'        => 'x_promo',
    'title'        => __( 'Promo', csl18n() ),
    'section'    => __( 'Marketing', csl18n() ),
    'description' => __( 'Include a marketing promo in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/promo/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',

        'value'       => ''
      ),
      array(
        'param_name'  => 'image',
        'heading'     => __( 'Promo Image', csl18n() ),
        'description' => __( 'Include an image for your promo element.', csl18n() ),
        'type'        => 'attach_image',

      ),
      array(
        'param_name'  => 'alt',
        'heading'     => __( 'Alt', csl18n() ),
        'description' => __( 'Enter in the alt text for your promo image.', csl18n() ),
        'type'        => 'textfield',

      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


// //
// // Responsive lightbox.
// //

// csg_map(
//   array(
//     'id'        => 'lightbox',
//     'title'        => __( 'Responsive Lightbox', csl18n() ),
//     'section'    => __( 'Media', csl18n() ),
//     'description' => __( 'Display images in a responsive lightbox', csl18n() ),
//     'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-lightbox/',
//   'params'      => array(
//       array(
//         'param_name'  => 'selector',
//         'heading'     => __( 'Selector', csl18n() ),
//         'description' => __( 'Enter in the selector for your images (e.g. if your class is "lightbox-img" enter ".lightbox-img"). Set to ".x-img-link" to automatically setup a lightbox for all linked [image] shortcodes on your page.', csl18n() ),
//         'type'        => 'textfield',

//         'value'       => '.x-img-link'
//       ),
//       array(
//         'param_name'  => 'deeplink',
//         'heading'     => __( 'Deeplink', csl18n() ),
//         'description' => __( 'Select to activate deeplinking (creates unique link for each image).', csl18n() ),
//         'type'        => 'checkbox',

//         'value'       => 'true'
//       ),
//       array(
//         'param_name'  => 'opacity',
//         'heading'     => __( 'Backdrop Opacity', csl18n() ),
//         'description' => __( 'Enter in the opacity for the backdrop (valid inputs are numbers 0 to 1).', csl18n() ),
//         'type'        => 'textfield',

//         'value'       => '0.875'
//       ),
//       array(
//         'param_name'  => 'prev_scale',
//         'heading'     => __( 'Previous Item Scale', csl18n() ),
//         'description' => __( 'Enter in the scale for the previous item (valid inputs are numbers 0 to 1).', csl18n() ),
//         'type'        => 'textfield',

//         'value'       => '0.75'
//       ),
//       array(
//         'param_name'  => 'prev_opacity',
//         'heading'     => __( 'Previous Item Opacity', csl18n() ),
//         'description' => __( 'Enter in the opacity for the previous item (valid inputs are numbers 0 to 1).', csl18n() ),
//         'type'        => 'textfield',

//         'value'       => '0.75'
//       ),
//       array(
//         'param_name'  => 'next_scale',
//         'heading'     => __( 'Next Item Scale', csl18n() ),
//         'description' => __( 'Enter in the scale for the next item (valid inputs are numbers 0 to 1).', csl18n() ),
//         'type'        => 'textfield',

//         'value'       => '0.75'
//       ),
//       array(
//         'param_name'  => 'next_opacity',
//         'heading'     => __( 'Next Item Opacity', csl18n() ),
//         'description' => __( 'Enter in the opacity for the next item (valid inputs are numbers 0 to 1).', csl18n() ),
//         'type'        => 'textfield',

//         'value'       => '0.75'
//       ),
//       array(
//         'param_name'  => 'orientation',
//         'heading'     => __( 'Orientation', csl18n() ),
//         'description' => __( 'Select the orientation of your lightbox.', csl18n() ),
//         'type'        => 'dropdown',

//         'value'       => array(
//           'Horizontal' => 'horizontal',
//           'Vertical'   => 'vertical'
//         )
//       ),
//       array(
//         'param_name'  => 'thumbnails',
//         'heading'     => __( 'Thumbnails', csl18n() ),
//         'description' => __( 'Select to activate thumbnail navigation.', csl18n() ),
//         'type'        => 'checkbox',

//         'value'       => 'true'
//       )
//     )
//   )
// );


//
// Post author.
//

csg_map(
  array(
    'id'        => 'x_author',
    'title'        => __( 'Author', csl18n() ),
    'section'    => __( 'Social', csl18n() ),
    'description' => __( 'Include post author information', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/author',
  'params'      => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Enter in a title for your author information.', csl18n() ),
        'type'        => 'textfield',

        'value'       => 'About the Author'
      ),
      array(
        'param_name'  => 'author_id',
        'heading'     => __( 'Author ID', csl18n() ),
        'description' => __( 'By default the author of the post or page will be output by leaving this input blank. If you would like to output the information of another author, enter in their user ID here.', csl18n() ),
        'type'        => 'textfield',
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Prompt.
//

csg_map(
  array(
    'id'        => 'x_prompt',
    'title'        => __( 'Prompt', csl18n() ),
    'section'    => __( 'Marketing', csl18n() ),
    'description' => __( 'Include a marketing prompt into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/prompt/',
  'params'      => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', csl18n() ),
        'description' => __( 'Select the alignment of your prompt.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Enter the title for your prompt.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'message',
        'heading'     => __( 'Message', csl18n() ),
        'description' => __( 'Enter the message for your prompt.', csl18n() ),
        'type'        => 'textarea',

      ),
      array(
        'param_name'  => 'button_text',
        'heading'     => __( 'Button Text', csl18n() ),
        'description' => __( 'Enter the text for your prompt button.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'button_icon',
        'heading'     => __( 'Button Icon', csl18n() ),
        'description' => __( 'Optionally enter the button icon.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => $param_icon_value
      ),
      array(
        'param_name'  => 'circle',
        'heading'     => __( 'Marketing Circle', csl18n() ),
        'description' => __( 'Select to include a marketing circle around your button.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', csl18n() ),
        'description' => __( 'Enter in the URL you want your prompt button to link to.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', csl18n() ),
        'description' => __( 'Select to open your prompt button link in a new window.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'blank'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Entry share.
//

csg_map(
  array(
    'id'        => 'x_share',
    'title'        => __( 'Social Sharing', csl18n() ),
    'section'    => __( 'Social', csl18n() ),
    'description' => __( 'Include social sharing into your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/entry-share/',
  'params'      => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Enter in a title for your social links.', csl18n() ),
        'type'        => 'textfield',

        'value'       => 'Share this Post'
      ),
      array(
        'param_name'  => 'facebook',
        'heading'     => __( 'Facebook', csl18n() ),
        'description' => __( 'Select to activate the Facebook sharing link.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'twitter',
        'heading'     => __( 'Twitter', csl18n() ),
        'description' => __( 'Select to activate the Twitter sharing link.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'google_plus',
        'heading'     => __( 'Google Plus', csl18n() ),
        'description' => __( 'Select to activate the Google Plus sharing link.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'linkedin',
        'heading'     => __( 'LinkedIn', csl18n() ),
        'description' => __( 'Select to activate the LinkedIn sharing link.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'pinterest',
        'heading'     => __( 'Pinterest', csl18n() ),
        'description' => __( 'Select to activate the Pinterest sharing link.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'reddit',
        'heading'     => __( 'Reddit', csl18n() ),
        'description' => __( 'Select to activate the Reddit sharing link.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      array(
        'param_name'  => 'email',
        'heading'     => __( 'Email', csl18n() ),
        'description' => __( 'Select to activate the email sharing link.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Table of contents.
//

csg_map(
  array(
    'id'            => 'x_toc',
    'title'            => __( 'Table of Contents', csl18n() ),
    'weight'          => 630,
    'icon'            => 'toc',
    'section'        => __( 'Information', csl18n() ),
    'description'     => __( 'Include a table of contents in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/table-of-contents/',
  'params'          => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Set the title of the table of contents.', csl18n() ),
        'type'        => 'textfield',

        'value'       => 'Table of Contents'
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', csl18n() ),
        'description' => __( 'Select the alignment of your table of contents.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Left'      => 'left',
          'Right'     => 'right',
          'Fullwidth' => 'block'
        )
      ),
      array(
        'param_name'  => 'columns',
        'heading'     => __( 'Columns', csl18n() ),
        'description' => __( 'Select a column count for your links if you have chosen "Fullwidth" as your alignment.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          '1' => '1',
          '2' => '2',
          '3' => '3'
        )
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Table of contents item.
//

csg_map(
  array(
    'id'            => 'x_toc_item',
    'title'            => __( 'Table of Contents Item', csl18n() ),
    'weight'          => 620,
    'icon'            => 'toc-item',
    'section'        => __( 'Information', csl18n() ),
    'description'     => __( 'Include a table of contents item', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/table-of-contents/',
  'params'          => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', csl18n() ),
        'description' => __( 'Set the title of the table of contents item.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'page',
        'heading'     => __( 'Page', csl18n() ),
        'description' => __( 'Set the page of the table of contents item.', csl18n() ),
        'type'        => 'textfield',

      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Custom headline.
//

csg_map(
  array(
    'id'        => 'x_custom_headline',
    'title'        => __( 'Custom Headline', csl18n() ),
    'section'    => __( 'Typography', csl18n() ),
    'description' => __( 'Include a custom headline in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/custom-headline/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',

        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', csl18n() ),
        'description' => __( 'Select which way to align the custom headline.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      array(
        'param_name'  => 'level',
        'heading'     => __( 'Heading Level', csl18n() ),
        'description' => __( 'Select which level to use for your heading (e.g. h2).', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'looks_like',
        'heading'     => __( 'Looks Like', csl18n() ),
        'description' => __( 'Select which level your heading should look like (e.g. h3).', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'accent',
        'heading'     => __( 'Accent', csl18n() ),
        'description' => __( 'Select to activate the heading accent.', csl18n() ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);






//
// Feature headline.
//

csg_map(
  array(
    'id'        => 'x_feature_headline',
    'title'        => __( 'Feature Headline', csl18n() ),
    'section'    => __( 'Typography', csl18n() ),
    'description' => __( 'Include a feature headline in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/feature-headline/',
  'params'      => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', csl18n() ),
        'description' => __( 'Enter your text.', csl18n() ),
        'type'        => 'textarea_html',

        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', csl18n() ),
        'description' => __( 'Select which way to align the feature headline.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      array(
        'param_name'  => 'level',
        'heading'     => __( 'Heading Level', csl18n() ),
        'description' => __( 'Select which level to use for your heading (e.g. h2).', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'looks_like',
        'heading'     => __( 'Looks Like', csl18n() ),
        'description' => __( 'Select which level your heading should look like (e.g. h3).', csl18n() ),
        'type'        => 'dropdown',

        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'icon',
        'heading'     => __( 'Icon', csl18n() ),
        'description' => __( 'Select the icon to use with your feature headline.', csl18n() ),
        'type'        => 'dropdown',

        'value'       => $param_icon_value
      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Responsive text.
//

csg_map(
  array(
    'id'        => 'x_responsive_text',
    'title'        => __( 'Responsive Text', csl18n() ),
    'section'    => __( 'Typography', csl18n() ),
    'description' => __( 'Include responsive text in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/responsive-text/',
  'params'      => array(
      array(
        'param_name'  => 'selector',
        'heading'     => __( 'Selector', csl18n() ),
        'description' => __( 'Enter in the selector for your responsive text (e.g. if your class is "h-responsive" enter ".h-responsive").', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'compression',
        'heading'     => __( 'Compression', csl18n() ),
        'description' => __( 'Enter the compression for your responsive text (adjust up and down to desired level in small increments).', csl18n() ),
        'type'        => 'textfield',

        'value'       => '1.0'
      ),
      array(
        'param_name'  => 'min_size',
        'heading'     => __( 'Minimum Size', csl18n() ),
        'description' => __( 'Enter the minimum size of your responsive text.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'max_size',
        'heading'     => __( 'Maximum Size', csl18n() ),
        'description' => __( 'Enter the maximum size of your responsive text.', csl18n() ),
        'type'        => 'textfield',

      )
    )
  )
);


//
// Search.
//

csg_map(
  array(
    'id'        => 'x_search',
    'title'        => __( 'Search', csl18n() ),
    'section'    => __( 'Content', csl18n() ),
    'description' => __( 'Include a search field in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/search/',
  'params'      => array(
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);


//
// Counter.
//

csg_map(
  array(
    'id'        => 'x_counter',
    'title'        => __( 'Counter', csl18n() ),
    'section'    => __( 'Information', csl18n() ),
    'description' => __( 'Include an animated number counter in your content', csl18n() ),
    'demo' =>   'http://theme.co/x/demo/integrity/1/shortcodes/counter/',
  'params'      => array(
      array(
        'param_name'  => 'num_start',
        'heading'     => __( 'Starting Number', csl18n() ),
        'description' => __( 'Enter in the number that you would like your counter to start from.', csl18n() ),
        'type'        => 'textfield',

        'value'       => '0'
      ),
      array(
        'param_name'  => 'num_end',
        'heading'     => __( 'Ending Number', csl18n() ),
        'description' => __( 'Enter int he number that you would like your counter to end at. This must be higher than your starting number.', csl18n() ),
        'type'        => 'textfield',

        'value'       => '100'
      ),
      array(
        'param_name'  => 'num_speed',
        'heading'     => __( 'Counter Speed', csl18n() ),
        'description' => __( 'The amount of time to transition between numbers in milliseconds.', csl18n() ),
        'type'        => 'textfield',

        'value'       => '1500'
      ),
      array(
        'param_name'  => 'num_prefix',
        'heading'     => __( 'Number Prefix', csl18n() ),
        'description' => __( 'Prefix your number with a symbol or text.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'num_suffix',
        'heading'     => __( 'Number Suffix', csl18n() ),
        'description' => __( 'Suffix your number with a symbol or text.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'num_color',
        'heading'     => __( 'Number Color', csl18n() ),
        'description' => __( 'Select the color of your number.', csl18n() ),
        'type'        => 'colorpicker',

      ),
      array(
        'param_name'  => 'text_above',
        'heading'     => __( 'Text Above', csl18n() ),
        'description' => __( 'Optionally include text above your number.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'text_below',
        'heading'     => __( 'Text Below', csl18n() ),
        'description' => __( 'Optionally include text below your number.', csl18n() ),
        'type'        => 'textfield',

      ),
      array(
        'param_name'  => 'text_color',
        'heading'     => __( 'Text Color', csl18n() ),
        'description' => __( 'Select the color of your text above and below the number if you have include any.', csl18n() ),
        'type'        => 'colorpicker',

      ),
      csg_map_default_id(),
      csg_map_default_class(),
      csg_map_default_style()
    )
  )
);

function csg_map_default( $args = array() ) {
  return wp_parse_args( $args, array(
    'param_name'  => 'generic',
    'heading'     => __( 'Text', csl18n() ),
    'description' => __( 'Enter your text.', csl18n() ),
    'type'        => 'textfield',
    'value'       => ''
  ));
}


function csg_map_default_id( $args = array() ) {
  return wp_parse_args( $args, csg_map_default( array(
    'param_name'  => 'id',
    'heading'     => __( 'ID', csl18n() ),
    'description' => __( '(Optional) Enter a unique ID.', csl18n() ),
    'type'        => 'textfield',
    'advanced'    => true
  ) ) );
}


function csg_map_default_class( $args = array() ) {
  return wp_parse_args( $args, csg_map_default( array(
    'param_name'  => 'class',
    'heading'     => __( 'Class', csl18n() ),
    'description' => __( '(Optional) Enter a unique class name.', csl18n() ),
    'type'        => 'textfield',
    'advanced'    => true
  ) ) );
}

function csg_map_default_style( $args = array() ) {
  return wp_parse_args( $args, csg_map_default( array(
    'param_name'  => 'style',
    'heading'     => __( 'Style', csl18n() ),
    'description' => __( '(Optional) Enter inline CSS.', csl18n() ),
    'type'        => 'textfield',
    'advanced'    => true
  ) ) );
}
