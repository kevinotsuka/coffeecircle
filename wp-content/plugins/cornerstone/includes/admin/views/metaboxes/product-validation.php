<tr>
  <th>
    <label for="cornerstone-fields-api_key">
      <strong><?php _e( 'API Key', csl18n() ); ?></strong>
      <span><?php _e( 'Validate your cornerstone by adding your API Key here.', csl18n() ); ?></span>
    </label>
  </th>
  <td>
    <fieldset>
      <?php echo $this->settings->renderField( 'api_key', array( 'type' => 'text' ) ) ?>
    </fieldset>
  </td>
</tr>