<table class="form-table">
  <tbody>
    <!-- Logos -->
    <tr>
      <th scope="row">
        <label for="header_logo_id">Logos</label>
      </th>
      <td>
        <!-- Desktop -->
        <h4><label for="header_logo_id">Desktop</label></h4>
        <input type="text" class="header_logo" name="header_logo" id="header_logo_id" size="60" value="<?php echo get_option('header_logo'); ?>">
        <a href="#" class="header_logo_upload button button-primary">Upload</a>
        <?php if (!empty(get_option('header_logo'))) : ?>
          <h4>Visualização</h4>
          <img src="<?php echo get_option('header_logo'); ?>" class="logo-thumb" alt="Visualização da logo">
        <?php endif; ?>
        <!-- Mobile -->
        <h4><label for="header_logo_mb_id">Mobile</label></h4>
        <input type="text" class="header_logo_mb" name="header_logo_mb" id="header_logo_mb_id" size="60"value="<?php echo get_option('header_logo_mb'); ?>">
        <a href="#" class="header_logo_mb_upload button button-primary">Upload</a>
        <?php if (!empty(get_option('header_logo_mb'))) : ?>
          <h4>Visualização</h4>
          <img src="<?php echo get_option('header_logo_mb'); ?>" class="logo-thumb" alt="Visualização da logo">
        <?php endif; ?>
      </td>
    </tr>
    <!-- Social (Facebook, Instagram, etc) -->
    <tr>
      <th scope="row">
        <label for="">Social</label>
      </th>
      <td>
        <!-- Facebook -->
        <h4><label for="social_fb_id">Facebook</label></h4>
        <input type="text" name="social_fb" id="social_fb_id" class="regular-text" value="<?php echo get_option('social_fb'); ?>">
        <!-- Instagram -->
        <h4><label for="social_insta_id">Instagram</label></h4>
        <input type="text" name="social_insta" id="social_insta_id" class="regular-text" value="<?php echo get_option('social_insta'); ?>">
        <!-- YouTube -->
        <h4><label for="social_yt_id">YouTube</label></h4>
        <input type="text" name="social_yt" id="social_yt_id" class="regular-text" value="<?php echo get_option('social_yt'); ?>">
      </td>
    </tr>
  </tbody>
</table>