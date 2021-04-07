<!doctype html>
<html lang="en">
<head>
  <title>SM Prime</title>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <link rel="shortcut icon" href="<?= get_template_directory_uri().'/assets/images/favicon.ico'; ?>" type="image/vnd.microsoft.icon" />
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119466262-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-119466262-1', {'anonymize_ip': true}); 
  gtag('config', 'UA-119466262-1');
</script>
	
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header class="main-header">
    <div class="smph-container">
      <nav class="navbar navbar-expand-md">
        <h1 class="navbar-brand">
          <?php 
            if(function_exists('the_custom_logo')) {
              the_custom_logo();
            }
          ?>
        </h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
          <?php 
            wp_nav_menu(
              array (
                'menu' => 'main_header',
                'container' => '',
                'theme_location' => 'main_header',
                'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
                'walker' => new custom_sub_walker(),
              )
            );
            get_search_form();
          ?>
        </div>
      </nav>
    </div>
  </header>