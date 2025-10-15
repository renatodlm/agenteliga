<?php
/**
 * Template Name: Home
 */
  get_header();
?>
<section class="section_404">
    <div class="content">
        <h1>OOOOOOOPS...</h1>
        <p>
            Desculpe, a página que você está procurando não existe ou for removida. <br>
            Verifique o endereço digitado ou volte para a <a href="<?php echo get_home_url()?>">página principal</a>
        </p>
        <div>
            <img src="<?php echo get_template_directory_uri()?>/assets/404.svg" alt="404">
        </div>
    </div>
</section>

<?php
  get_footer();
?>