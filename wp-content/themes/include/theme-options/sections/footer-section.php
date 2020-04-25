<table class="form-table">
  <div class="tbody">
    <!-- Logo do footer -->
    <tr>
      <th scope="row">
        <label for="footer_logo_id">Logo</label>
      </th>
      <td>
        <input class="footer_logo" type="text" name="footer_logo" id="footer_logo_id" size="60" value="<?php echo get_option('footer_logo'); ?>">
        <a href="#" class="footer_logo_upload button button-primary">Upload</a>
        <?php if (!empty('footer_logo')) : ?>
          <h4><label for="footer_logo_min">Visualização</label></h4>
          <img src="<?php echo get_option('footer_logo'); ?>" class="logo-thumb" id="footer_logo_min" alt="Visualização da logo">
        <?php endif; ?>
      </td>
    </tr>
    <!-- Números e email de contato -->
    <tr>
      <th scope="row">
        <label for="tel_footer_id">Contato</label>
      </th>
      <td>
        <h4>Telefone 01</h4>
        <input type="text" class="regular-text tel_footer" name="tel_footer_1" id="tel_footer_id" value="<?php echo get_option('tel_footer_1'); ?>">
        <h4>Telefone 02</h4>
        <input type="text" class="regular-text tel_footer" name="tel_footer_2" value="<?php echo get_option('tel_footer_2'); ?>">
        <h4>Email</h4>
        <input type="email" class="regular-text" name="email_footer" id="email_footer_id" value="<?php echo get_option('email_footer'); ?>">
      </td>
    </tr>
    <!-- Endereço -->
    <tr>
      <th scope="row">
        <label for="tel_footer_id">Endereço</label>
      </th>
      <td>
        <input type="text" name="endereco_footer" id="endereco_footer_id" class="regular-text" value="<?php echo get_option('endereco_footer'); ?>">
      </td>
    </tr>
    <!-- Rodapé -->
    <tr>
      <th scope="row">
        <label for="text_footer_id">Texto de Rodapé</label>
      </th>
      <td>
        <input type="text" name="text_footer" id="text_footer_id" class="regular-text" value="<?php echo get_option('text_footer'); ?>">
      </td>
    </tr>
  </div>
</table>