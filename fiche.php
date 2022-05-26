<?php

include("inc/sql.php");

$sql_cat = mysql_query("SELECT * FROM categories WHERE id_categorie IN (SELECT id_categorie FROM annonceurs WHERE actif = 1 AND france_ann = 1) ORDER BY nom_categorie");
$sql_ann = mysql_query("SELECT * FROM annonceurs WHERE actif = 1 ORDER BY nom_ann");

$sql_cat_isr = mysql_query("SELECT * FROM categories WHERE id_categorie IN (SELECT id_categorie FROM annonceurs WHERE actif = 1 AND israel_ann = 1) ORDER BY nom_categorie");
$sql_ann_isr = mysql_query("SELECT * FROM annonceurs WHERE actif = 1 AND israel_ann = 1 ORDER BY nom_ann");

if (isset($_GET['id_cat'])) {
	$id_categorie = $_GET['id_cat'];
	$sql_url_cat = mysql_query("SELECT * FROM categories WHERE id_categorie=".$id_categorie."");
}
if (isset($_POST['categorie'])) {
	$id_categorie = $_POST['categorie'];
	$sql_url_cat = mysql_query("SELECT * FROM categories WHERE id_categorie=".$id_categorie."");
}

$id_annonceur = $_GET['ann'];
$sql_annonceur = mysql_query("SELECT * FROM annonceurs WHERE id_ann = ".$id_annonceur."");

if (mysql_result($sql_annonceur, 0, "actif")==0) {
	header("location:../404.php");
}

$date = time(); 
$sql_vue = mysql_query("INSERT INTO vues (`idAnnonceur`, `dateVue`) VALUES (".$id_annonceur.", ".$date.") ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta property="og:image" content="https://guide-jourj.com/images/galerie/<?php echo mysql_result($sql_annonceur, 0, "pub_ann");?>" alt="<?php echo mysql_result($sql_annonceur, 0, "nom_ann");?>" />
<base href="https://guide-jourj.com/" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Guide Jour J" />
<title>Guide Jour J - <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?> - <?php echo mysql_result($sql_url_cat, 0, "nom_categorie");?> - Mariage Juif</title>
<meta name="description" content="Guide du mariage juif - Retrouvez <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?> dans la catégorie <?php echo mysql_result($sql_url_cat, 0, "nom_categorie");?> pour organiser vos réceptions juives, réceptions cachères, mariages, réceptions privées ...">
<meta name="keywords" content="Mariage juif, jourj, jour j, guide jour j, Bar mitsva, juif, judaisme, hébreu, juive, guide du mariage juif, henné, photographe, orchestre réception juive, salon de réception, coiffeur, maquillage, réception cacher, mariage juif, photographe mariage, traiteur mariage, réception israel, synagogue, annuaire prestataires juifs, annauire mariage juif, <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?>">

    <!-- Stylesheets
    ============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <link rel="stylesheet" href="css/colors.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
    	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>

    <!-- Document Title
    ============================================= -->

</head>

<script type="text/javascript">
    var opticoCountryCode = 33;
    var opticoPhoneColor = ''; // optional: #3e3e3e
    var opticoClickColor = ''; // optional: #ff5500
    var opticoOptions = { // optional
        // checks to activate tracking or not
        // checks query parameters and its values (can use wildcard "*")
        trackingRestrictionParameters: {},
        // operator between the parameters check
        trackingRestrictionOperator: 'OR',

        // track only this kind of original phone numbers
        phoneMatching: {
            ignoreDefaultPattern: false,
            pattern: null,
            length: null,
            minLength: null,
            maxLength: null
        },

        // for multiple number types: array of prefixes to number types
        // (use id's from tracking api doc) e.g.: {'01': 6, '02': 7, 'default': 6}
        trackingTypeAssociation: {}
    };

    var opticoDirectDisplay = false;
    
    var opticoCookieEnabled = true; // optional; if value is set to true then cookies will be enabled otherwise you need to enable the creation of cookies with the second script (2) after the visitor gave the his consent to activate cookies

    var opticoScript = document.createElement('script');
    opticoScript.type = 'text/javascript';
    opticoScript.async = true;
    opticoScript.src = '//www.optico.fr/client.js';
    var opticoS = document.getElementsByTagName('script')[0];
    opticoS.parentNode.insertBefore(opticoScript, opticoS);
</script>

<!-- <script>
                jQuery(document).ready(function($){
                    var swiperSlider = new Swiper('.swiper-parent',{
                        paginationClickable: false,
                        slidesPerView: 1,
                        grabCursor: true,
                        autoplay: 4000,
                        loop: true,
                        onSwiperCreated: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 750; } else { toAnimateDelayTime = 750; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeStart: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeEnd: function(swiper){
                            $('#slider').find('.swiper-slide').each(function(){
                                if($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
                                if($(this).find('.yt-bg-player').length > 0) { $(this).find('.yt-bg-player').pauseYTP(); }
                            });
                            $('#slider').find('.swiper-slide:not(".swiper-slide-active")').each(function(){
                                if($(this).find('video').length > 0) {
                                    if($(this).find('video').get(0).currentTime != 0 ) $(this).find('video').get(0).currentTime = 0;
                                }
                                if($(this).find('.yt-bg-player').length > 0) {
                                    $(this).find('.yt-bg-player').getPlayer().seekTo( $(this).find('.yt-bg-player').attr('data-start') );
                                }
                            });
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('video').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('video').get(0).play(); }
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').playYTP(); }

                            $('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 300; } else { toAnimateDelayTime = 300; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                        }
                    });

                    $('#slider-arrow-left').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipePrev();
                    });

                    $('#slider-arrow-right').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipeNext();
                    });
                });
            </script> -->

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="transparent-header semi-transparent" data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="mariage-juif.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Jour J - Mariage Juif"></a>
                        <a href="mariage-juif.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Jour J - réception juive"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="style-3">

                        <ul>
                            <li><a href="mariage-juif.html"><div>Accueil</div></a></li>
                            <!----Annuaire-->
                            <li class="current"><a href="annuaire-mariage-bar-mitzvah.html"><div>Annuaire France</div></a>
                            <div class="mega-menu-content col-2 clearfix">
                                    <ul>
                                        <?php
								for ($i=0; $i<mysql_num_rows($sql_cat)/2; $i++) { 
								?>
                                    <li><a href="<?php echo mysql_result($sql_cat, $i, "id_categorie");?>-<?php echo mysql_result($sql_cat, $i, "url_categorie");?>.html"><div><?php echo mysql_result($sql_cat, $i, "nom_categorie");?></div></a></li>
                                <?php } ?>
                                    </ul>
                                    <ul>
                                        <?php
								for ($i=mysql_num_rows($sql_cat)/2; $i<mysql_num_rows($sql_cat); $i++) { 
								?>
                                    <li><a href="<?php echo mysql_result($sql_cat, $i, "id_categorie");?>-<?php echo mysql_result($sql_cat, $i, "url_categorie");?>.html"><div><?php echo mysql_result($sql_cat, $i, "nom_categorie");?></div></a></li>
                                <?php } ?>
                                    </ul>
                            </div>
                            </li>
                            <!--------End Annuaire--------->
                            <!----Annuaire-->
                            <li><a href="annuaire-mariage-bar-mitzvah-israel.html"><div>Annuaire Israël</div></a>
<div class="mega-menu-content col-2 clearfix">
                                <ul>
                                <?php
								for ($i=0; $i<mysql_num_rows($sql_cat_isr)/2; $i++) { 
								?>
                                    <li><a href="israel-<?php echo mysql_result($sql_cat_isr, $i, "id_categorie");?>-<?php echo mysql_result($sql_cat_isr, $i, "url_categorie");?>-israel.html"><div><?php echo mysql_result($sql_cat_isr, $i, "nom_categorie");?></div></a></li>
                                <?php } ?>
                                    </ul>
                                    <ul>
                                        <?php
								for ($i=mysql_num_rows($sql_cat_isr)/2; $i<mysql_num_rows($sql_cat_isr); $i++) { 
								?>
                                    <li><a href="israel-<?php echo mysql_result($sql_cat_isr, $i, "id_categorie");?>-<?php echo mysql_result($sql_cat_isr, $i, "url_categorie");?>-israel.html"><div><?php echo mysql_result($sql_cat_isr, $i, "nom_categorie");?></div></a></li>
                                <?php } ?>
                                </ul>
                            </div>
                            </li>
                            <!--------End Annuaire--------->
                            <li><a href="salon-mariage-reception-juive.html"><div>Le Salon Jour J</div></a></li>
                            <li class="mega-menu"><a href="#"><div>Guides</div></a>
                                <div class="mega-menu-content style-2 col-5 clearfix">
                                    <ul>
                                        <li class="mega-menu-title"><a href="#"><div>Enfance</div></a>
                                            <ul>
                                                <li><a href="prenoms-juifs-garcon.html"><div>Prénoms de Garçons</div></a></li>
                                                <li><a href="prenoms-juifs-filles.html"><div>Prénoms de Filles</div></a></li>
                                                <li><a href="le-rachat-du-premier-ne.html"><div>Rachat du 1er né</div></a></li>
                                                <li><a href="la-brit-mila.html"><div>La Brith Mila</div></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="mega-menu-title"><a href="#"><div>Majorité religieuse</div></a>
                                            <ul>
                                                <li><a href="la-bar-mitzvah.html"><div>La Bar Mitzvah</div></a></li>
                                                <li><a href="la-bat-mitzvah.html"><div>La Bat Mitzvah</div></a></li>
                                                <li><a href="calcul_date_bar_mitzvah.html"><div>Dates Bar Mitzvaot</div></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="mega-menu-title"><a href="#"><div>Mariage</div></a>
                                            <ul>
                                                <li><a href="stresses-on-vous-aider.html"><div>No Stress !</div></a></li>
                                                <li><a href="le-mariage-civil.html"><div>Le Mariage civil</div></a></li>
                                                <li><a href="la-synagogue.html"><div>La Synagogue</div></a></li>
                                                <li><a href="la-demande-en-mariage.html"><div>Demande en mariage</div></a></li>
                                                <li><a href="topchrono-pour-mariage-reussi.html"><div>Top Chrono</div></a></li>
                                                <li><a href="noces-et-noms.html"><div>Les Noces et leurs noms</div></a></li>
                                                <li><a href="henne.html"><div>Le Henné</div></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="mega-menu-title"><a href="#"><div>Guides pratiques</div></a>
                                            <ul>
                                                <li><a href="le-mikve.html"><div>Le Mikvé</div></a></li>
                                                <li><a href="photo-art.html"><div>La photo, un art</div></a></li>
                                                <li><a href="choisir-sa-robe.html"><div>Choisir sa robe</div></a></li>
                                                <li><a href="la-realisation-dun-bijou-diamant.html"><div>Réalisation d'un bijou</div></a></li>
                                                <li><a href="bien-preparer-sa-peau-mariage.html"><div>Préparer sa peau</div></a></li>
                                                <li><a href="preparer-son-plan-de-table.html"><div>Plan de table</div></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="mega-menu-title"><a href="#"><div>Vie juive</div></a>
                                            <ul>
                                                <li><a href="dates-fetes-jeunes-juif.html"><div>Fêtes &amp; Jeûnes</div></a></li>
                                                <li><a href="liste-mikve-mikvaot.html"><div>Liste des Mikvaot</div></a></li>
                                                <li><a href="liste-synagogues-paris-ile-de-france.html"><div>Liste des synagogues</div></a></li>
                                                <li><a href="benedictions-utiles.html"><div>Bénédictions utiles</div></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="jeu-concours-jourj.html"><div>Jeu Concours</div></a></li>
                            <li><a href="contact-jourj.html"><div>Contact</div></a></li>
                            
                        </ul>

                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="search.php" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Recherche">
                            </form>
                        </div><!-- #top-search end -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
        
        <!---Sous Menu horizontal---->
        <div id="page-menu">

            <div id="page-menu-wrap">
        
                <div class="container clearfix">
        
                     <div class="menu-title">
<?php
$gregorianMonth = date("n");
$gregorianDay = date("j");
$gregorianYear = date("Y");

$jdDate = gregoriantojd($gregorianMonth,$gregorianDay,$gregorianYear);

$hebrewMonthName = jdmonthname($jdDate,4);

$hebrewDate = jdtojewish($jdDate);

list($hebrewMonth, $hebrewDay, $hebrewYear) = explode('/',$hebrewDate);

setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
$date = ucfirst(strftime("%A %d %B %Y"))." - $hebrewDay $hebrewMonthName $hebrewYear"; 

?>
<span>DATE</span>&nbsp;<?php echo $date;?>
</div>
        
        
                    <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
        
                </div>
        
            </div>
        
        </div>
        <!---End Sous Menu horizontal---->

        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?php echo mysql_result($sql_annonceur, 0, "nom_ann");?></h1>
            </div>

        </section><!-- #page-title end -->

        <!-- Portfolio Single Gallery
        ============================================= -->
        <?php
		$sql_galerie = mysql_query("SELECT * FROM galerie WHERE id_ann = ".mysql_result($sql_annonceur, 0, "id_ann")." AND actif_galerie = 1 ");
		?>
        <section id="slider" class="slider-parallax swiper_wrapper clearfix" style="height: 600px;" data-autoplay="4000" data-loop="true">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image: url('images/galerie/<?php echo mysql_result($sql_galerie, 0, "rep_galerie");?>/logo.jpg');"></div>
                    <?php if (mysql_result($sql_galerie, 0, "nb_slider") == 0) {} else {
						for ($i=1;$i<mysql_result($sql_galerie, 0, "nb_slider")+1;$i++) {
						?>
                    <div class="swiper-slide" style="background-image: url('images/galerie/<?php echo mysql_result($sql_galerie, 0, "rep_galerie");?>/slider/<?php echo $i;?>.jpg');"></div>
                    <?php } } ?>
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
            </div>

            <!-- <script>
                jQuery(document).ready(function($){
                    var swiperSlider = new Swiper('.swiper-parent',{
                        paginationClickable: false,
                        slidesPerView: 1,
                        grabCursor: true,
                        autoplay: 4000,
                        loop: true,
                        onSwiperCreated: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 750; } else { toAnimateDelayTime = 750; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeStart: function(swiper){
                            $('[data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
                            });
                            SEMICOLON.slider.swiperSliderMenu();
                        },
                        onSlideChangeEnd: function(swiper){
                            $('#slider').find('.swiper-slide').each(function(){
                                if($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
                                if($(this).find('.yt-bg-player').length > 0) { $(this).find('.yt-bg-player').pauseYTP(); }
                            });
                            $('#slider').find('.swiper-slide:not(".swiper-slide-active")').each(function(){
                                if($(this).find('video').length > 0) {
                                    if($(this).find('video').get(0).currentTime != 0 ) $(this).find('video').get(0).currentTime = 0;
                                }
                                if($(this).find('.yt-bg-player').length > 0) {
                                    $(this).find('.yt-bg-player').getPlayer().seekTo( $(this).find('.yt-bg-player').attr('data-start') );
                                }
                            });
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('video').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('video').get(0).play(); }
                            if( $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').playYTP(); }

                            $('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function(){
                                var $toAnimateElement = $(this);
                                var toAnimateDelay = $(this).attr('data-caption-delay');
                                var toAnimateDelayTime = 0;
                                if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 300; } else { toAnimateDelayTime = 300; }
                                if( !$toAnimateElement.hasClass('animated') ) {
                                    $toAnimateElement.addClass('not-animated');
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    setTimeout(function() {
                                        $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                                    }, toAnimateDelayTime);
                                }
                            });
                        }
                    });

                    $('#slider-arrow-left').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipePrev();
                    });

                    $('#slider-arrow-right').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipeNext();
                    });
                });
            </script> -->

        </section><!-- .portfolio-single-image end -->
        
        

        <!-- Content
        ============================================= -->
        <section id="content">
        
        <div class="container topmargin-lg clearfix">

                    <div class="col_one_third">
                        <h4>Coordonnées</h4>
                        <p><?php if (mysql_result($sql_annonceur, 0, "add_ann")!="") { ?>
                        <?php echo mysql_result($sql_annonceur, 0, "add_ann");?><br>
                        <?php } ?>
                        <?php if (mysql_result($sql_annonceur, 0, "tel_ann")!="") { ?>
                        Téléphone : <a href="javascript:;" class="button center" onclick="call();" id="hideTel" data-toggle="tooltip" data-placement="top" title="Appeler de la part de Jour J">APPELEZ</a><br>
                        <?php } ?>
                        
                        <!--<?php if (mysql_result($sql_annonceur, 0, "port_ann")!="") { ?>
                        Mobile : <a href="javascript:;" class="button center" onclick="afficherNum();" id="hideMobile" data-toggle="tooltip" data-placement="top" title="Appeler de la part de Jour J">Voir téléphone</a><br>
                        <?php } ?> -->
                        <?php echo mysql_result($sql_annonceur, 0, "port_ann"); ?>
                        </p>
                        <div class="si-share clearfix">
                            <span>Contacter sur whatsapp :</span>
							<?php
                            $adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
							$nom_ann = mysql_result($sql_annonceur, 0, "nom_ann");
							?>
                            <div>
                                <?php if (mysql_result($sql_annonceur, 0, "whatsapp_ann")!="") {?>
                                <a target="_blank" title="Whatsapp" href="http://wa.me/<?php echo mysql_result($sql_annonceur, 0, "whatsapp_ann");?>" class="social-icon si-borderless si-instagram" >
                                    <img src="images/whatsapp.png" alt="Contacter <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?> sur whatsapp">
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col_one_third">
                        <h4>Site Internet</h4>
                        <?php if (mysql_result($sql_annonceur, 0, "site_ann")!="") { 
                        $site = explode("://", mysql_result($sql_annonceur, 0, "site_ann"));
                        ?>
                        <p><a href="<?php echo mysql_result($sql_annonceur, 0, "site_ann");?>" target="_blank" class="button button-3d nomargin btn-block button-xlarge center" onclick="countSite();" style="height:auto; width:auto; font-size:12px;"><?php echo $site[1];?></a></p>
                        <?php } ?>
                        <div class="si-share clearfix">
                            <span>Réseaux sociaux :</span>
							<?php
                            $adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
							$nom_ann = mysql_result($sql_annonceur, 0, "nom_ann");
							?>
                            <div>
                            <?php if (mysql_result($sql_annonceur, 0, "facebook_ann")!="") {?>
                                <a target="_blank" title="Facebook" href="<?php echo mysql_result($sql_annonceur, 0, "facebook_ann");?>" class="social-icon si-borderless si-facebook" onclick="countRS();">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                             <?php } ?>
                             <?php if (mysql_result($sql_annonceur, 0, "twitter_ann")!="") {?>
                                <a target="_blank" title="Twitter" href="<?php echo mysql_result($sql_annonceur, 0, "twitter_ann");?>" class="social-icon si-borderless si-twitter" onclick="countRS();">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <?php } ?>
                                <?php if (mysql_result($sql_annonceur, 0, "gplus_ann")!="") {?>
                                <a target="_blank" title="Google +" href="<?php echo mysql_result($sql_annonceur, 0, "gplus_ann");?>" class="social-icon si-borderless si-gplus" onclick="countRS();">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>
                                <?php } ?>
                                <?php if (mysql_result($sql_annonceur, 0, "insta_ann")!="") {?>
                                <a target="_blank" title="Instagram" href="<?php echo mysql_result($sql_annonceur, 0, "insta_ann");?>" class="social-icon si-borderless si-instagram" onclick="countRS();">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col_one_third col_last">
                        <h4>Partagez la page de ce prestataire</h4>
                        <p>Prenez du temps et partagez cette page sur vos réseaux sociaux.</p>
                        <div class="si-share clearfix">
                            <span>Partager :</span>
							<?php
                            $adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
							$nom_ann = mysql_result($sql_annonceur, 0, "nom_ann");
							?>
                            <div>
                                <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo $adresse;?>&t=<?php echo $nom_ann;?> - Jour J - L'Indispensable de la réception juive" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;" class="social-icon si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php echo $adresse;?>&text=<?php echo $nom_ann;?> avec Jour J - L'Indispensable de la réception juive" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;" class="social-icon si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php echo $adresse;?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;" class="social-icon si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                
            <div class="content-wrap" style="padding:0;">

                <div class="container clearfix">
<div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>
                        <!-- Modal Contact Form
                        ============================================= -->
                        <a href="#" data-toggle="modal" data-target="#contactFormModal" class="button button-3d nomargin btn-block button-xlarge center" style="height:auto;">Contactez<br><?php echo mysql_result($sql_annonceur, 0, "nom_ann");?></a>
                    <div style="width:100%; text-align:center;"><span class="before-heading color center">Cliquez sur le bouton ci-dessus pour envoyer un email à <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?></span></div>

                        <div class="modal fade" id="contactFormModal" tabindex="-1" role="dialog" aria-labelledby="contactFormModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="contactFormModalLabel">Envoyez un mail à <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">
												<input type="hidden" id="template-contactform-mail-ann" name="template-contactform-mail-ann" value="<?php echo mysql_result($sql_annonceur, 0, "mail_ann");?>" />
                                                <input type="hidden" id="template-contactform-nom-ann" name="template-contactform-nom-ann" value="<?php echo mysql_result($sql_annonceur, 0, "nom_ann");?>" />
                                            <input type="hidden" id="template-contactform-id-ann" name="template-contactform-id-ann" value="<?php echo mysql_result($sql_annonceur, 0, "id_ann");?>" />
                                            <div class="col_half">
                                                <label for="template-contactform-name">Nom <small>*</small></label>
                                                <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                                            </div>

                                            <div class="col_half col_last">
                                                <label for="template-contactform-email">Email <small>*</small></label>
                                                <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                                            </div>

                                            <div class="clear"></div>

                                            <div class="col_half">
                                                <label for="template-contactform-phone">Téléphone</label>
                                                <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                                            </div>

                                            <div class="col_half col_last">
                                                <label for="template-contactform-service">Votre demande</label>
                                                <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                                    <option value="">-- Sélectionnez --</option>
                                                    <option value="Renseignement Jour J - Formulaire de contact">Renseignement</option>
                                                    <option value="Devis Jour J - Formulaire de contact">Devis</option>
                                                </select>
                                            </div>

                                            <div class="clear"></div>

                                            <div class="col_full">
                                                <label for="template-contactform-subject">Objet <small>*</small></label>
                                                <input type="text" id="template-contactform-subject2" name="template-contactform-subject2" value="" class="required sm-form-control" />
                                            </div>

                                            <div class="col_full">
                                                <label for="template-contactform-message">Message <small>*</small></label>
                                                <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                                            </div>

                                            <div class="col_full hidden">
                                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                            </div>

                                            <div class="col_full">
                                                <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Envoyer le message</button>
                                            </div>

                                        </form>

                                        <script type="text/javascript">
                                            $("#template-contactform").validate({
                                                submitHandler: function(form) {
                                                    $('.form-process').fadeIn();
                                                    $(form).ajaxSubmit({
                                                        target: '#contact-form-result',
                                                        success: function() {
                                                            $('.form-process').fadeOut();
                                                            $('#template-contactform').find('.sm-form-control').val('');
                                                            $('#contact-form-result').attr('data-notify-msg', $('#contact-form-result').html()).html('');
                                                            SEMICOLON.widget.notifications($('#contact-form-result'));
                                                        }
                                                    });
                                                }
                                            });
                                        </script>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Modal Contact Form End -->

                    </div>

                </div>

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="col_half">

                        <h3>Présentation</h3>

                        <p><?php echo mysql_result($sql_annonceur, 0, "desc_ann");?></p>

                    </div>

                    <div class="col_half col_last">

                        <h3>&nbsp;</h3>

                        <p><img src="images/galerie/<?php echo mysql_result($sql_annonceur, 0, "pub_ann");?>" alt="<?php echo mysql_result($sql_annonceur, 0, "nom_ann");?>"></p>

                    </div>

                </div>
				
                <?php if (mysql_result($sql_annonceur, 0, "notes")!="") { ?>
                <div class="section nomargin noborder" style="height: auto;">
                    <div class="container clearfix">

                        <?php echo mysql_result($sql_annonceur, 0, "notes");?>
        
                    </div>
                </div>
                <?php } ?>

                <div class="section dark notopmargin nobottommargin noborder" style="padding: 60px 0;background-color: #222;">
                   
                </div>

                <div class="clear"></div>

                <div class="section nomargin">
                    <div class="container clearfix">
                        <div class="heading-block center nomargin">
                            <h3>Galerie photo "<?php echo mysql_result($sql_annonceur, 0, "nom_ann");?>"</h3>
                        </div>
                    </div>
                </div>
<?php
$sql_galerie = mysql_query("SELECT * FROM galerie WHERE id_ann = ".mysql_result($sql_annonceur, 0, "id_ann")." AND actif_galerie = 1 ");
if (mysql_num_rows($sql_galerie)==0){} else {
?>
                <div class="nomargin masonry-thumbs col-4" data-lightbox="gallery">
<?php 
	for ($i=1; $i<mysql_result($sql_galerie, 0, "nb_galerie")+1;$i++) {
	?>
                    <a href="images/galerie/<?php echo mysql_result($sql_galerie, 0, "rep_galerie");?>/<?php echo $i;?>.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/galerie/<?php echo mysql_result($sql_galerie, 0, "rep_galerie");?>/<?php echo $i;?>.jpg" alt="Image <?php echo $i;?> de <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?>"></a>
<?php } ?>

                </div>
<?php } ?>

                <div class="clear"></div>



            </div>

        </section><!-- #content end -->
        
        <div class="clear"></div>

                <a href="annuaire-mariage-bar-mitzvah.html" class="button button-full button-dark center tright bottommargin-lg">
                    <div class="container clearfix">
                        Découvrez tous les prestataires Jour J. <strong>Voir tous les prestataires</strong> <i class="icon-caret-right" style="top:4px;"></i>
                    </div>
                </a>

<div class="container clearfix">


                    <div class="clear"></div>
					<div class="heading-block center">
                        <h2>Les autres <?php echo mysql_result($sql_url_cat, 0, "nom_categorie");?></h2>
                    </div>
                    <!-- Portfolio Items
                    ============================================= -->
                    <div id="portfolio" class="portfolio-ajax clearfix">
					<?php
					$sql_ann = mysql_query("SELECT * FROM annonceurs WHERE id_categorie = ".$id_categorie." AND actif = 1 ORDER by nom_ann");
					for ($i=0; $i<mysql_num_rows($sql_ann); $i++) {
					?>
                        <article id="portfolio-item-<?php echo ($i+1);?>" data-loader="include/ajax/portfolio-ajax-image.php" class="portfolio-item pf-media pf-icons">
                            
                            <div class="portfolio-desc">
                                <h3><a href="<?php echo $id_categorie;?>-<?php echo mysql_result($sql_url_cat, 0, "url_categorie");?>/<?php echo mysql_result($sql_ann, $i, "id_ann");?>-<?php echo mysql_result($sql_ann, $i, "url_ann");?>.html"><?php echo mysql_result($sql_ann, $i, "nom_ann");?></a></h3>
                            </div>
                            
                            <div class="portfolio-image">
                                <a href="<?php echo $id_categorie;?>-<?php echo mysql_result($sql_url_cat, 0, "url_categorie");?>/<?php echo mysql_result($sql_ann, $i, "id_ann");?>-<?php echo mysql_result($sql_ann, $i, "url_ann");?>.html">
                                    <img src="images/galerie/<?php echo mysql_result($sql_ann, $i, "pub_ann");?>" alt="Open Imagination">
                                </a>
                                <div class="portfolio-overlay">
                                    <a href="<?php echo $id_categorie;?>-<?php echo mysql_result($sql_url_cat, 0, "url_categorie");?>/<?php echo mysql_result($sql_ann, $i, "id_ann");?>-<?php echo mysql_result($sql_ann, $i, "url_ann");?>.html"><i class="icon-line-expand"></i></a>
                                </div>
                            </div>
                            
                        </article>
					<?php } ?>
                    </div>
                    <!-- Portfolio Script
                    ============================================= -->
                    <script type="text/javascript">

                        jQuery(window).load(function(){

                            var $container = $('#portfolio');

                            $container.isotope({ transitionDuration: '0.65s' });

                            $('#portfolio-filter a').click(function(){
                                $('#portfolio-filter li').removeClass('activeFilter');
                                $(this).parent('li').addClass('activeFilter');
                                var selector = $(this).attr('data-filter');
                                $container.isotope({ filter: selector });
                                return false;
                            });

                            $('#portfolio-shuffle').click(function(){
                                $container.isotope('updateSortData').isotope({
                                    sortBy: 'random'
                                });
                            });

                            $(window).resize(function() {
                                $container.isotope('layout');
                            });

                        });

                    </script><!-- Portfolio Script End -->

                </div>

<?php require("footer.php");?>

    </div><!-- #wrapper end 'images/footer-bg.jpg'-->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="js/functions.js"></script>
    
    <script type="text/javascript">
    function afficherNum() {
        var mobile= "<?php echo mysql_result($sql_annonceur, 0, "port_ann"); ?>";
        document.getElementById('hideMobile').innerHTML=mobile;
         $.ajax({
           url : 'vueMobile.php?idAnn=<?php echo $id_annonceur;?>',
           type : 'GET',
           dataType : 'html',
        });
    }
        
    function afficherNumtel() {
        var tel= "<?php echo mysql_result($sql_annonceur, 0, "tel_ann"); ?>";
        document.getElementById('hideTel').innerHTML=tel;
         $.ajax({
           url : 'vueMobile.php?idAnn=<?php echo $id_annonceur;?>',
           type : 'GET',
           dataType : 'html',
        });
    }
    
    function countSite() {
         $.ajax({
           url : 'countSite.php?idAnn=<?php echo $id_annonceur;?>',
           type : 'GET',
           dataType : 'html',
        });
    }
        
    function countRS() {
         $.ajax({
           url : 'countRS.php?idAnn=<?php echo $id_annonceur;?>',
           type : 'GET',
           dataType : 'html',
        });
    }
    </script>
<?php if (mysql_result($sql_annonceur, 0, "whatsapp_ann")!="") {?>
    <div style="position: fixed; bottom:30px; left:30px; width:38px; height38px; z-index:10000;">
    <a target="_blank" title="Whatsapp" href="http://wa.me/<?php echo mysql_result($sql_annonceur, 0, "whatsapp_ann");?>?text=%3CDemande%20de%20renseignement%20Guide%20Jour%20J%3E" class="social-icon si-borderless si-instagram" >
        <img src="images/whatsapp.png" alt="Contacter <?php echo mysql_result($sql_annonceur, 0, "nom_ann");?> sur whatsapp">
    </a>
    </div>
<?php } ?>
</body>
</html>