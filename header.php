<!DOCTYPE html>
<html>

<head>
	<?php wp_head(); ?>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body <?php body_class(); ?>>    
  <header>
    <div class="header-container">

      <?php the_custom_logo()?>
      <button class="menu-toggle show-for-small-only">
          <span></span>
      </button>
      <div class="menu-content">
      <div class="head show-for-small-only">
          <?php the_custom_logo()?>
<?php
        // Seletor de idioma para menu mobile - duas caixas simples
        if (function_exists('pll_languages_list')) {
            $lang_order = ['pt', 'en'];
            $current_lang = pll_current_language();
            ?>
            <div class="language-selector mobile-language">
                <?php foreach ($lang_order as $slug): ?>
                    <?php if ($slug === $current_lang): ?>
                        <div class="language-box current">
                            <?php echo strtoupper($slug); ?>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo esc_url(pll_home_url($slug)); ?>" class="language-box">
                            <?php echo strtoupper($slug); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php } ?>
      </div>  
        <nav>
            <?php $current_language = pll_current_language();
            $menu_items = wp_get_nav_menu_items($current_language == 'en' ? 16 : 15);
              if ($menu_items) {
      // Reorganiza os itens em uma estrutura de árvore: [parent_id => [itens filhos]]
      $menu_tree = [];
      foreach ($menu_items as $item) {
          $menu_tree[$item->menu_item_parent][] = $item;
      }
  
      // Função recursiva para imprimir o menu com subníveis
      function render_menu_items($parent_id, $menu_tree) {
          if (!isset($menu_tree[$parent_id])) return;
  
          echo '<ul>';
          foreach ($menu_tree[$parent_id] as $item) {
              echo '<li>';
              echo '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
  
              // Chamada recursiva para submenus
              render_menu_items($item->ID, $menu_tree);
  
              echo '</li>';
          }
          echo '</ul>';
      }
  
      // Começa com o topo (pai = 0)
      render_menu_items(0, $menu_tree);
  }
            ?>
        </nav>
        
        <!-- 
        
      </div>
      <?php
      // Seletor de idioma para desktop
      if (function_exists('pll_languages_list')) {
          $lang_order = ['pt', 'en'];
          $current_lang = pll_current_language();
          ?>
          <div class="language-dropdown desktop-language">
              <div class="language-current">
                  <?php foreach ($lang_order as $slug): ?>
                      <?php if ($slug === $current_lang): ?>
                          <strong><?php echo strtoupper($slug); ?></strong>
                      <?php else: ?>
                          <?php echo strtoupper($slug); ?>
                      <?php endif; ?>
                      <?php if ($slug !== end($lang_order)): ?> / <?php endif; ?>
                  <?php endforeach; ?>
                  &nbsp;<sup><small>▼</small></sup>
              </div>
              <ul class="language-options">
                  <?php foreach ($lang_order as $slug): ?>
                      <?php if ($slug !== $current_lang): ?>
                          <li>
                              <a href="<?php echo esc_url(pll_home_url($slug)); ?>">
                                  <?php echo strtoupper($slug); ?>
                              </a>
                          </li>
                      <?php endif; ?>
                  <?php endforeach; ?>
              </ul>
          </div>
      <?php } ?> -->
    </div>

  </header>
  <div id="smooth-wrapper">
  <div id="smooth-content">