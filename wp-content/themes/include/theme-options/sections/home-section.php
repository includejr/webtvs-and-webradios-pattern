<table class="form-table">
  <div class="tbody">
    <!-- Cores das bordas inferiores dos títulos -->
    <tr>
      <th scope="row">
        <label for="sections_colors_id">Cores</label>
        <p class="description">Cores das bordas inferiores dos títulos.</p>
      </th>
      <td>
        <h4><label for="border_color_notices">Útimas Notícias</label></h4>
        <input type="text" class="color-field" name="ult_noticias_border" id="border_color_notices" value="<?php echo get_option('ult_noticias_border'); ?>">
        <h4><label for="border_color_destaques">Destaques</label></h4>
        <input type="text" class="color-field"name="destaques_border" id="border_color_destaques" value="<?php echo get_option('destaques_border'); ?>">
        <h4><label for="border_color_eventos">Eventos</label></h4>
        <input type="text" class="color-field"name="eventos_border" id="border_color_eventos" value="<?php echo get_option('eventos_border'); ?>">
        <h4><label for="border_color_face">Widget do Facebook</label></h4>
        <input type="text" class="color-field"name="fb_widget_border" id="border_color_face" value="<?php echo get_option('fb_widget_border'); ?>">
      </td>
    </tr>
    <!-- Configuração do widget do Facebook -->
    <tr>
      <th scope="row">
        <label for="fb_widget_id">Facebook Widget</label>
        <p class="description">Insira as guias separadas por vírgula, sem ponto final. Exemplo: "timeline, events".<br/><br/>Guias: timeline, events e messages.</p>
      </th>
      <td>
        <h4><label for="fb_widget_id">URL do Widget</label></h4>
        <input type="text" name="fb_widget" id="fb_widget_id" class="regular-text" placeholder="https://www.facebook.com/exemplo/" value="<?php echo get_option('fb_widget'); ?>"><br/>
        <h4><label for="fb_widgets_tabs_id">Guias do Widget</label></h4>                        
        <input type="text" name="fb_widget_tabs" id="fb_widgets_tabs_id" class="regular-text" placeholder="timeline, events" value="<?php echo get_option('fb_widget_tabs'); ?>">
      </td>
    </tr>
  </div>
</table>