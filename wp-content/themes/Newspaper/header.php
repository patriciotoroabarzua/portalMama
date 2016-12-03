<!doctype html >
<!--[if IE 8]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta charset="<?php bloginfo( 'charset' );?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php
    wp_head(); /** we hook up in wp_booster @see td_wp_booster_functions::hook_wp_head */
    ?>

<!--Tag Google @digitalsupport-->
<script type='text/javascript'>
  (function() {
    var useSSL = 'https:' == document.location.protocol;
    var src = (useSSL ? 'https:' : 'http:') +
        '//www.googletagservices.com/tag/js/gpt.js';
    document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
  })();
</script>

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/139219268/d.portalmama.728x90.1', [728, 90], 'div-gpt-ad-1467313676173-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/d.portalmama.990x90.1', [990, 90], 'div-gpt-ad-1467415111468-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/d.portalmama.728x90.2', [728, 90], 'div-gpt-ad-1467415535493-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/d.portalmama.990x90.2', [990, 90], 'div-gpt-ad-1467415821469-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/d.portalmama.300x250.1', [300, 250], 'div-gpt-ad-1467321241361-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/m.portalmama.300.1', [300, 250], 'div-gpt-ad-1467346738782-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/d.portalmama.300x250.2', [300, 250], 'div-gpt-ad-1467416949324-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/d.portalmama.990x90.3', [990, 90], 'div-gpt-ad-1467417114009-0').addService(googletag.pubads());
googletag.defineSlot('/139219268/d.portalmama.300x250.3', [300, 250], 'div-gpt-ad-1467417241158-0').addService(googletag.pubads());
googletag.pubads().set("page_url", "http://www.portalmama.com/");
    googletag.pubads().enableSyncRendering();
    googletag.pubads().enableSingleRequest();
    googletag.pubads().collapseEmptyDivs();
    googletag.enableServices();

  });
</script>

<!--Tag Google @digitalsupport-->


</head>

<body <?php body_class() ?> itemscope="itemscope" itemtype="<?php echo td_global::$http_or_https?>://schema.org/WebPage">

    <?php /* scroll to top */?>
    <div class="td-scroll-up"><i class="td-icon-menu-up"></i></div>
    
    <?php locate_template('parts/menu-mobile.php', true);?>
    <?php locate_template('parts/search.php', true);?>
    
    
    <div id="td-outer-wrap">
    <?php //this is closing in the footer.php file ?>

        <?php
        /*
         * loads the header template set in Theme Panel -> Header area
         * the template files are located in ../parts/header
         */
        td_api_header_style::_helper_show_header();

        do_action('td_wp_booster_after_header'); //used by unique articles