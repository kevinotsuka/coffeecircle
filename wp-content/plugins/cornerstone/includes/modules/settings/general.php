<?php

class CS_Settings_General extends Cornerstone_Setting_Section_Base {

  public function data() {

    $this->defaultCSS = __( "/*\nNo need for style tags here;\nsimply get started by writing\nCSS! Watch as your changes\nare reflected live in the\npreview area. Have fun!\n*/\n\n", csl18n() );
    $this->defaultJS  = __( "//\n// No need to add script tags\n// here; simply get started\n// by writing JavaScript!\n// Remember to save your\n// changes to see them :)\n//\n\n", csl18n() );

    return array(
      'name'        => 'general',
      'title'       => __( 'WordPress Settings', csl18n() ),
      'priority' => '10'
    );
  }

  public function controls() {

    global $post;

    $settings = get_post_meta( $post->ID, '_cornerstone_settings', true );
    $post_type_object = get_post_type_object( $post->post_type );

    //
    // Page Title
    //

    if ( post_type_supports( $post->post_type, 'title' ) ) {

      $this->addControl(
        'post_title',
        'text',
        __( 'Title', csl18n() ),
        __( 'Shortcut for changing the title from within Cornerstone.', csl18n() ),
        $post->post_title,
        array(
          'notLive' => 'settings-wp-changed'
        )
      );

    }



    if ( current_user_can( $post_type_object->cap->publish_posts ) ) {

      ob_start(); ?>
      <select name="post_status" id="post_status">
        <option<?php selected( $post->post_status, 'publish' ); ?> value='publish'><?php _e('Publish', csl18n() ); ?></option>
        <?php if ( 'private' == $post->post_status ) : ?>
        <option<?php selected( $post->post_status, 'private' ); ?> value='publish'><?php _e( 'Privately Published', csl18n()); ?></option>
        <?php elseif ( 'future' == $post->post_status ) : ?>
        <option<?php selected( $post->post_status, 'future' ); ?> value='future'><?php _e( 'Scheduled', csl18n() ); ?></option>
        <?php endif; ?>
        <option<?php selected( $post->post_status, 'pending' ); ?> value='pending'><?php _e( 'Pending Review', csl18n() ); ?></option>
        <?php if ( 'auto-draft' == $post->post_status ) : ?>
        <option<?php selected( $post->post_status, 'auto-draft' ); ?> value='draft'><?php _e( 'Draft', csl18n() ); ?></option>
        <?php else : ?>
        <option<?php selected( $post->post_status, 'draft' ); ?> value='draft'><?php _e( 'Draft', csl18n() ); ?></option>
        <?php endif; ?>
      </select>
      <?php $markup = ob_get_clean();

      $this->addControl(
        'post_status',
        'wpselect',
        __( 'Status', csl18n() ),
        null,
        ($post->post_status) ? $post->post_status : 'draft',
        array(
          'markup' => $markup,
          'notLive' => 'settings-wp-changed'
        )
      );

    }

    //
    // Comments
    //

    if ( post_type_supports( $post->post_type, 'comments' ) ) {

      $this->addControl(
        'allow_comments',
        'toggle',
        __( 'Allow Comments', csl18n() ),
        __( 'Opens or closes comments. Note: The comment form may not be shown if your chosen page template doesn&apost support them.', csl18n() ),
        ($post->comment_status == 'open' ),
        array(
          'notLive' => 'settings-wp-changed'
        )
      );

    }

    if (post_type_supports( $post->post_type, 'page-attributes' )) {
      $this->pageAttributes();
    }


    $this->addControl(
      'custom_css',
      'code-editor',
      null,
      null,
      ( !isset($settings['custom_css']) || $settings['custom_css'] == '' ) ? $this->defaultCSS : $settings['custom_css'],
      array(
        'settings' => array(
          'mode' => 'css'
        )
      )
    );

    if (current_user_can('unfiltered_html' )) {

      $this->addControl(
        'custom_js',
        'code-editor',
        null,
        null,
        ( !isset($settings['custom_js']) || $settings['custom_js'] == '' ) ? $this->defaultJS : $settings['custom_js'],
        array(
          'settings' => array(
            'mode' => 'javascript',
            'lint' => true
          )
        )
      );

    }


  }

  public function pageAttributes() {

    global $post;

    //
    // Parent
    //

    $post_type_object = get_post_type_object($post->post_type);
    if ( $post_type_object->hierarchical ) {

      $dropdown_args = array(
        'post_type'        => $post->post_type,
        'exclude_tree'     => $post->ID,
        'selected'         => $post->post_parent,
        'name'             => 'parent_id',
        'show_option_none' => __('(no parent)', csl18n() ),
        'sort_column'      => 'menu_order, post_title',
        'echo'             => 0,
      );

      $dropdown_args = apply_filters( 'page_attributes_dropdown_pages_args', $dropdown_args, $post );
      $pages = wp_dropdown_pages( $dropdown_args );
      if ( ! empty($pages) ) {
        $this->addControl(
          'post_parent',
          'wpselect',
          __('Parent Page', csl18n() ),
          null,
          "{$post->post_parent}",
          array(
            'markup' => wp_dropdown_pages( $dropdown_args ),
            'notLive' => 'settings-wp-changed'
          )
        );
      }
    }


    //
    // Page Templates
    //

    if ( 'page' == $post->post_type && 0 != count( get_page_templates( $post ) ) ) {
      $template = !empty($post->page_template) ? $post->page_template : false;

      $default_title = apply_filters( 'default_page_template_title',  __( 'Default Template' ), csl18n() );

      ob_start();
      page_template_dropdown($template);
      $options = ob_get_clean();

      $markup = '<select name="page_template" id="page_template">'
              . '<option value="default">' . esc_html( $default_title ) .'</option>'
              . $options
              . '</select>';

      $this->addControl(
        'page_template',
        'wpselect',
        __( 'Page Template', csl18n() ),
        null,
        ($template) ? $template : 'default',
        array(
          'markup' => $markup,
          'notLive' => 'settings-wp-changed'
        )
      );

    }

  }

  public function handler( $atts ) {

    extract( $atts );

    global $post;
    $settings = get_post_meta( $post->ID, '_cornerstone_settings', true );
    $post_type_object = get_post_type_object($post->post_type);
    $update = array();

    // Title
    $post_title = esc_html( $post_title );
    if ( $post_title != $post->post_title ) {
      $update['post_title'] = $post_title;
    }

    // Comments
    $allow_comments = ( $allow_comments == 'true' ) ? 'open' : 'closed';
    if ( $post->comment_status != $allow_comments) {
      $update['comment_status'] = $allow_comments;
    }

    // Publish
    if ( current_user_can( $post_type_object->cap->publish_posts ) ) {
      if ( $post->post_status != $post_status) {
        $update['post_status'] = $post_status;
      }
    }

    // Page only
    if (post_type_supports( $post->post_type, 'page-attributes' )) {

      if ( isset( $page_template ) ) {
        $update['page_template'] = $page_template;
      }

      if ( isset( $post_parent ) ) {
        $update['post_parent'] = $post_parent;
      }

    }

    // Update Custom CSS
    if ( isset( $custom_css ) ) {
      $settings['custom_css'] = $custom_css;
    }

    // Update Custom JS
    if ( isset( $custom_js ) && current_user_can('unfiltered_html' ) ) {
      $settings['custom_js'] = $custom_js;
    }

    // If either are just the default message, ignore that code.
    if ( $settings['custom_css'] == $this->defaultCSS ) {
      $settings['custom_css'] = '';
    }

    if ( $settings['custom_js'] == $this->defaultJS ) {
      $settings['custom_js'] = '';
    }

    // Minify JS
    if ( $settings['custom_js'] != '' ) {
      require(CS()->path('includes/utility/jsqueeze.php'));
      $jz = new JSqueeze;
      $minified = $jz->squeeze($custom_js);
      if ($minified == ';') {
        $minified = '';
      }

      $settings['custom_js_mini'] = $minified;
    }



    update_post_meta( $post->ID, '_cornerstone_settings', $settings );

    if ( !empty( $update ) ) {

      $update['ID'] = $post->ID;
      wp_update_post($update);

    }
  }

}