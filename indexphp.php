<?php
$GLOBALS['_ta_campaign_key'] = 'CAMPAIGN_KEY';
$GLOBALS['_ta_debug_mode'] = false; //To enable debug mode, set to true or load this script with a '?debug_key=9cffdaf69f3ab98ab959bf623951134c' parameter

require 'bootloader.php';
/*require 'detectbot.php';

if(isBot()) {
    http_response_code(403);
    die('Forbidden');
}*/

$campaign_id = 'CAMPAIGN_ID';

$ta = new TALoader($campaign_id);


if ($ta->suppress_response()) {//Do not send any output when hybrid mode is enabled and a visitor is being filtered (after hybrid page was generated)
    exit;
}

$response = $ta->get_response();
$visitor = $ta->get_visitor();

/*
 * Advanced users: uncomment lines below during development to expose variables you may want to use in your custom code:
 */
//print_r($response);
//print_r($visitor);
//exit;
/*
 * Don't forget to re-comment the lines above before sending live traffic
 */

/*
Note: when using hybrid mode, please use one of our built-in functions as your final step when routing your visitors:
    print header_redirect("http://url.com"); //performs a 302 header redirect (or a window.location=xxx in JS)
    print load_fullscreen_iframe("http://url.com"); //Loads a fullscreen iframe of the specified URL
    print paste_html("http://url.com"); //Downloads HTML in specified URL and outputs it to the screen (uses JS to insert the HTML in hybrid mode)
(These functions will automatically output either regular HTML or JS code depending on what the visitor's browser is expecting)
*/

switch ($response['action']) {
    case 'header_redirect':
        print header_redirect($response['url']); //Uses <script>window.location='xxx'</script> when in hybrid mode (required behaviour)
        exit;
    case 'iframe':
        print load_fullscreen_iframe($response['url']);
        exit;
    case 'paste_html':
        $html = $response['output_html'];
        $html = preg_replace("/<!--BASE--/", "<!--BASE-->", $html);
        print paste_html($html);
        exit;
    case 'reverse_proxy':
        print reverse_proxy($response['url'], "tarp_99a1b19d758265ec165d4f277854cc2f/");
        exit;        
    /* Please be VERY CAREFUL if modifying this block: */
    case 'load_hybrid_page':
        $ta->load_hybrid_page();
        break;
    /* ...it is needed for hybrid mode to function correctly */
    default:
        print other_methods($response['url']);
        break;    
}
/*
 * Note: if using the "Remain on Fail URL" action for Filtered Visitors, append your Fail URL's HTML/PHP code after the closing PHP tag below:
 */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <meta content="Lahome" property="og:title" />
    <meta content="Lahome" property="og:description" />
    <meta content="https://anchorwellnessaw.com/images/1731872226654009.1tqwGxAHqL._AC_SL1500_.jpg" property="og:image" />
    <meta content="https://anchorwellnessaw.com/" property="og:url" />
    <meta content="1000" property="og:image:width" />
    <meta content="1000" property="og:image:height" />
    <meta name="description" content="Description.">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="css/style2.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Document</title>
  </head>

  <body>
    <!-- header section  -->
    <section class="header_container">
      <div class="topside_header">
        <div class="center_container_top_header">
          <div class="left_side_top_hd">
            Freshen up your looks |
            <a href="" class="shop_new">Shop New Arrivals</a>
          </div>
          <div class="right_side_top_hd">
            HELP | <span href="" class="shop_new">FIND STORES</span>
          </div>
        </div>
      </div>
      <div class="bottom_side_header">
        <div class="navigation_bar">
          <a href="" class="nav_links">MEN</a>
          <a href=""  class="nav_links">WOMEN</a>
          <a href=""  class="nav_links">EXPLORE</a>
          <a href=""  class="nav_links">LAST CALL</a>
        </div>
        <div class="img_logo">
          <!-- <svg
            class="absolute logo_svg"
            fill="black"
            height="30px"
            viewBox="0 0 180 26"
            width="200px;"
          >
            <title>Tecovas</title>
            <g fill="currentColor">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                stroke-linejoin="round"
                d="M95.6802 0H86.2647C83.8479 0 81.7295 2.04321 81.7295 4.37136V20.7673C81.7295 23.1788 83.7637 25.1397 86.2647 25.1397H95.6813C96.8927 25.1397 98.0307 24.6851 98.8878 23.8591C99.7437 23.0332 100.215 21.9353 100.215 20.7679L100.216 4.37136C100.216 2.04269 98.0965 0 95.6802 0ZM95.7552 18.4722C95.7552 20.1132 94.9634 20.8773 93.2634 20.8773H88.6825C87.8298 20.8773 87.2152 20.6835 86.8027 20.285C86.3907 19.8869 86.1902 19.294 86.1902 18.4722V6.66756C86.1902 5.04912 87.0065 4.2619 88.6847 4.2619H93.2607C94.9623 4.2619 95.7552 5.02607 95.7552 6.66756V18.4722Z"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                stroke-linejoin="round"
                d="M21.4008 4.62424L20.3959 0.26502C20.3599 0.110512 20.2214 0.000523756 20.0618 0.000523756L1.34245 0C1.18227 0 1.04324 0.109465 1.00782 0.263973L0.00445064 4.62371C-0.027268 4.76251 0.116523 4.87616 0.246041 4.81436C1.00623 4.45297 1.84361 4.26337 2.68891 4.26337H8.53413L8.53308 22.2842C8.5336 23.1872 8.30629 24.0875 7.88179 24.8899C7.82152 25.0036 7.90346 25.1397 8.03298 25.1397H13.3802C13.5097 25.1397 13.5911 25.0036 13.5309 24.8894C13.1027 24.0839 12.8732 23.1788 12.8732 22.2706V4.26232H18.7095C19.5569 4.26232 20.3964 4.45245 21.1598 4.81489C21.2893 4.87669 21.4331 4.76303 21.4008 4.62424Z"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                stroke-linejoin="round"
                d="M47.673 20.5403C47.6969 20.4062 47.5546 20.2999 47.4259 20.357C46.6615 20.6959 45.825 20.8766 44.982 20.8766H35.3611V14.8285L42.8745 14.83C43.0408 14.83 43.1847 14.7185 43.2202 14.5624L44.0915 10.7234C44.1401 10.5119 43.9716 10.3113 43.7458 10.3113H35.3638L35.3611 4.26267H44.8604C45.7388 4.26267 46.5949 4.45017 47.3774 4.80997C47.5072 4.86968 47.6528 4.76231 47.6272 4.62614L46.8005 0.278626C46.77 0.117316 46.6233 0 46.4521 0H30.3396C30.2032 0 30.1171 0.142979 30.1869 0.255582C30.6406 0.984096 30.8843 1.82155 30.8843 2.68675V22.6164C30.8843 23.413 30.6727 24.196 30.2763 24.8899C30.2125 25.0025 30.2987 25.1397 30.4323 25.1397H46.5617C46.7345 25.1397 46.8818 25.0203 46.9107 24.8569L47.673 20.5403Z"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                stroke-linejoin="round"
                d="M73.0918 24.8616L73.9395 20.4626C73.9662 20.3233 73.8137 20.2154 73.6826 20.2814C73.2251 20.5118 72.326 20.8779 71.2373 20.8779L64.4 20.8769C63.5397 20.8769 62.9216 20.6831 62.5068 20.2851C62.0919 19.8865 61.8897 19.2936 61.8897 18.4718V6.66741C61.8897 5.04953 62.7101 4.26285 64.3973 4.26285L71.2269 4.26232C72.3058 4.26232 73.2207 4.64414 73.6853 4.8814C73.8165 4.94792 73.9695 4.84003 73.9427 4.70018L73.0918 0.278638C73.0606 0.117321 72.9141 0 72.7431 0H61.9662C59.5357 0 57.4053 2.04265 57.4053 4.37126V20.7674C57.4053 23.1374 59.4931 25.1397 61.9646 25.1397H72.7431C72.9141 25.1397 73.0606 25.0224 73.0918 24.8616Z"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                stroke-linejoin="round"
                d="M123.06 0C122.94 0 122.855 0.116793 122.897 0.226777C123.145 0.87673 123.193 1.59215 123.025 2.27143L118.701 19.8113L114.382 2.30338C114.214 1.62043 114.273 0.883539 114.52 0.2273C114.562 0.117316 114.476 0.000523734 114.356 0.000523734H109.147C108.999 0.000523734 108.919 0.168642 109.014 0.27915C109.367 0.692376 109.62 1.18154 109.749 1.71209L114.867 22.5787C115.06 23.3611 114.965 24.1818 114.617 24.8978C114.563 25.0099 114.646 25.1397 114.774 25.1397H122.634C122.762 25.1397 122.846 25.0099 122.79 24.8967C122.441 24.1818 122.343 23.3549 122.536 22.5661L127.648 1.71889C127.779 1.18469 128.035 0.6929 128.391 0.279674C128.486 0.169166 128.406 0.000523734 128.258 0.000523734L123.06 0Z"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                stroke-linejoin="round"
                d="M149.226 22.8764C149.411 23.5523 149.373 24.2643 149.129 24.9136C149.088 25.023 149.174 25.1392 149.295 25.1392L154.528 25.1397C154.679 25.1397 154.758 24.9685 154.659 24.8581C154.31 24.4691 154.052 24.0041 153.913 23.4989L148.169 2.61785C147.951 1.82464 148.034 0.98379 148.387 0.248697C148.441 0.136653 148.356 0.00837874 148.228 0.00837874L140.748 1.61719e-06C140.62 -0.000521953 140.535 0.126182 140.587 0.23875C140.928 0.972795 141.018 1.83354 140.804 2.61471L135.062 23.4874C134.923 23.9952 134.665 24.4643 134.314 24.8581C134.216 24.9685 134.296 25.1392 134.446 25.1392L139.794 25.1397C139.916 25.1397 140.002 25.023 139.959 24.913C139.715 24.2748 139.671 23.5413 139.859 22.8413L140.907 18.9548L148.666 20.8271L149.226 22.8764ZM141.912 15.2233L144.501 5.61215L147.5 16.5731L141.912 15.2233Z"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                stroke-linejoin="round"
                d="M175.547 25.1387C178.003 25.1387 180 23.1778 180 20.7666V14.6824C180 12.3538 177.919 10.3107 175.547 10.3107H168.345C166.673 10.3107 165.894 9.54662 165.894 7.90629L165.895 6.66661C165.895 5.02627 166.673 4.26215 168.345 4.26215H177.335C178.198 4.26215 178.957 4.61462 179.37 4.85187C179.498 4.92467 179.654 4.81626 179.627 4.6738L178.801 0.277579C178.771 0.116793 178.627 0 178.46 0L165.97 0.000523734C163.595 0.000523734 161.514 2.04256 161.514 4.37161V10.5281C161.514 12.2198 163.427 14.8295 165.97 14.8295L173.17 14.828C174.842 14.828 175.621 15.5921 175.621 17.2329V18.4716C175.621 20.0894 174.82 20.876 173.173 20.8766H164.229C163.379 20.8766 162.613 20.522 162.196 20.2853C162.069 20.213 161.912 20.3198 161.939 20.4623L162.753 24.8606C162.783 25.0219 162.926 25.1397 163.094 25.1397L175.547 25.1387Z"
              ></path>
            </g>
          </svg> -->
          <a href="/" class="logoRedirection"><img src="images/logo.png" width="200px" alt="" class="img_logo"></a> 

        </div>
        <div class="right_side_header">
          <i class="fa fa-search"></i>
          <a href=""  class="login_link">LOG IN</a>
          <i class="fa fa-shopping-cart"></i>
        </div>
      </div>
    </section>



    <section class="carousel_container">
      <div class="sub_container_cars">
        <div class="left_side_images">
            <!-- <div class="double_img_container">
                <img src="images/1_chocolate.webp" alt="" class="first_img_ll imagerVar">
                <img src="images/2_chocolate.webp" alt="" class="first_img_ll imagerVar">
            </div>
            <div class="double_img_container">
                <img src="images/3_chocolate.webp" alt="" class="first_img_ll imagerVar">
                <img src="images/4_chocolate.webp" alt="" class="first_img_ll imagerVar">
            </div> -->
            <!-- <div class="double_img_container">
                <img src="images/7.webp" alt="" class="second_img_ll">
            </div> -->
            <!-- <div class="double_img_container">
                <img src="images/5_chocolate.webp" alt="" class="first_img_ll imagerVar">
                <img src="images/6_chocolate.webp" alt="" class="first_img_ll imagerVar">
            </div>  
 -->

      <div id="productCarousel" class="carousel_ slide_ carousel-fade_ col-xl-6_">
        <div class="carousel-indicators-wrapper">
          <div class="up_btn" style="text-align: center;"><i class="fa fa-angle-up"></i></div>
          <ol class="carousel-indicators list-inline">
            <li class="list-inline-item active">
	                            <a id="carousel-selector-0" data-slide-to="0" data-target="#productCarousel">
					<img alt="b1" src="images/1731872226654009.1tqwGxAHqL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-1" data-slide-to="1" data-target="#productCarousel">
					<img alt="b2" src="images/1731872226111124.1RJQMEyR9L._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-2" data-slide-to="2" data-target="#productCarousel">
					<img alt="b3" src="images/1731872226325014.1+CsIKFTHL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-3" data-slide-to="3" data-target="#productCarousel">
					<img alt="b4" src="images/1731872226551812.1XlX5YOJyL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-4" data-slide-to="4" data-target="#productCarousel">
					<img alt="b5" src="images/17318722269334.10Efx5K2IL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-5" data-slide-to="5" data-target="#productCarousel">
					<img alt="b6" src="images/1731872226706731.1MfoaOB01L._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-6" data-slide-to="6" data-target="#productCarousel">
					<img alt="b7" src="images/1731872226892750.1c42npTRQL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
          </ol>
          <div class="down_btn" style="text-align: center;"><i class="fa fa-angle-down"></i></div>
        </div>
        <div class="carousel-inner"><div class="carousel-item active"><img height="480" alt="b1" src="images/1731872226654009.1tqwGxAHqL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b2" src="images/1731872226111124.1RJQMEyR9L._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b3" src="images/1731872226325014.1+CsIKFTHL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b4" src="images/1731872226551812.1XlX5YOJyL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b5" src="images/17318722269334.10Efx5K2IL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b6" src="images/1731872226706731.1MfoaOB01L._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b7" src="images/1731872226892750.1c42npTRQL._AC_SL1500_.jpg"></div></div>
      </div>

        </div>

        <!-- carousel to use in mobile -->
<!-- 
        <div class="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="images/1_chocolate.webp" alt="Image 1" class="imagerVar_mb">
              </div>
              <div class="carousel-item">
                  <img src="images/2_chocolate.webp" alt="Image 2" class="imagerVar_mb ">
              </div>
              <div class="carousel-item">
                  <img src="images/3_chocolate.webp" alt="Image 3" class="imagerVar_mb">
              </div>
          </div>
          <a class="carousel-control-prev" href="#" role="button">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#" role="button">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
          </a>
      </div> -->

        <div class="right_side_carousel">
          <div class="navigation_links">
            <a href=""  class="link_navigation__"> SHOP </a> >
            <a href=""  class="link_navigation__"> MEN </a> >
            <a href=""  class="link_navigation__"> RANCH BOOT </a>
          </div>
          <div class="title_priceTag">
            <div class="left_sd_container_title">
              <div class="title_container___">
                <span class="title_prdt__">Lahome Checkered Easy</span>
                <div class="right_side_container_title">$13.82</div>
              </div>
              <div class="reviewStars_container">
                <span class="numberTitle"> 4.68 </span>
                <div class="stars_container___">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </div>
                <a href=""  class="number_start_cc">60</a>
              </div>
            </div>
          </div>
          <div class="color_material">
            <span class="color__"
              >COLOR:
              <span class="ligh_details">WHITE</span>
            </span>
            <span class="color__"
              >MATERIAL:
              <span class="ligh_details"> BISON</span>
            </span>
          </div>
          <div class="color_chooser">
            <div class="sub_cont_img_color"><img  alt="" class="chooser_img1" /></div>
            <div class="sub_cont_img_color"><img  alt="" class="chooser_img2" /></div>
          </div>
          <div class="size_container__">
            <div class="title_size">SIZE:</div>
            <div class="lower_talk_size">*RUNS BIG; ORDER HALF SIZE DOWN</div>
            <div class="lower_lower_talk_sz">
              <span class="left_side_talk_size">
                Size sold out? Select size to get notified.
              </span>
              <a
                href="" 
                class="fitGuide__"
                >FIT GUIDE</a
              >
            </div>
          </div>
          <div class="size_chooser_">
            <div class="square__size_el">XXS</div>
            <div class="square__size_el">XS</div>
            <div class="square__size_el">S</div>
            <div class="square__size_el">M</div>
            <div class="square__size_el">L</div>
            <div class="square__size_el">XL</div>
            <div class="square__size_el">XXL</div>
            
          </div>
          <div class="width_d_average">
            <div class="width_title__">WIDTH :</div>
            <div class="container_btns__">
              <button class="choser_width__">AVERAGE</button>
              <button class="choser_width__">WIDE</button>
            </div>
          </div>
          <div class="free_shipping__">
            <svg
              aria-hidden="true"
              fill="none"
              height="30px"
              role="presentation"
              viewBox="0 0 24 24"
              width="30px"
            >
              <title>Boots with Wings</title>
              <g
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  d="M15.537 13.13c0 .23-.034.443-.023.628.017.257.096.459.135.605.011.044.006.05.017.095.061.212.128.414.173.61.05.218.04.437.067.633.034.223.096.43.112.62.017.242.017.454.017.634 0 .397.04.319-.078.615-.118.297-.095.286-.23.555l-.269.537c-.134.269-.112.28-.246.549-.134.268-.29.515-.29.515s-.354.05-.718.05-.363-.067-.727-.067h-.728c-.364 0-.722.022-.722.022s.016-.358.028-.727.145-.387.033-.74c-.252 0-.492.017-.694.057a2.851 2.851 0 0 0-.65.218c-.218.1-.425.207-.598.336-.19.14-.347.302-.532.43-.185.13-.37.253-.594.331-.196.067-.414.067-.671.067-.219 0-.46.023-.711.012-.23-.006-.465-.023-.706-.04s-.47-.05-.705-.067-.476 0-.711-.022-.476-.05-.706-.073c-.246-.022-.481-.017-.71-.04-.252-.022-.482-.083-.706-.106-.263-.028-.504-.028-.705-.05-.437-.05-.695-.05-.689-.073.078-.352.095-.347.185-.694.078-.302.045-.263.308-.532.123-.123.274-.28.504-.375.168-.073.38-.073.615-.112.185-.028.387-.061.622-.056.218 0 .425-.061.632-.095s.437-.022.639-.09c.201-.067.397-.173.587-.263s.37-.224.55-.33.38-.207.548-.336.324-.285.487-.425c.168-.146.313-.308.459-.454.162-.162.325-.302.453-.453a5.5 5.5 0 0 0 .392-.504c.073-.1.107-.32.135-.633.016-.19.016-.408.022-.66 0-.207.073-.426.067-.661 0-.213-.033-.431-.039-.66-.006-.213.011-.437 0-.667-.011-.23-.017-.436-.028-.66-.011-.224-.05-.443-.062-.661-.01-.218-.056-.442-.067-.66-.011-.219-.017-.448-.028-.661-.011-.213.017-.454.006-.666-.011-.23-.028-.454-.034-.661-.005-.24-.039-.46-.039-.66 0-.258.1-.465.18-.656.089-.23.173-.442.33-.593.167-.162.391-.235.598-.325.219-.1.437-.184.639-.224.38-.078.336-.078.671-.072M13.51 4.733c.33 0 .286 0 .65.079.196.045.414.106.621.207.19.095.37.224.526.386.14.151.258.33.336.56.068.185.107.398.107.644s-.011.52-.023.817"
                ></path>
                <path
                  d="M12.34 7.426v-.011a.928.928 0 0 1-.375-.062 1.02 1.02 0 0 1-.313-.218 1.004 1.004 0 0 1-.213-.313.928.928 0 0 1-.062-.376c0-.207-.005-.207-.005-.42s-.006-.212-.006-.42c0-.206.006-.212.006-.42s-.017-.212-.017-.425c0-.212.017-.212.017-.425 0-.18.14-.33.319-.33.218 0 .218.01.437.01s.218-.01.436-.01c.219 0 .219-.006.437-.006.179 0 .325.162.325.341v.42c0 .213.016.213.016.42s-.005.213-.005.42-.017.213-.017.426.022.212.022.425a.954.954 0 0 1-.095.375c-.05.118-.134.218-.224.308s-.179.185-.302.235a.971.971 0 0 1-.38.062zM12.346 9.475c.297-.162.526-.285.823-.448s.285-.19.582-.352.297-.163.593-.33c.297-.169.314-.14.61-.303.297-.162.292-.18.589-.341.296-.163.302-.152.599-.32s.28-.19.576-.358c.297-.168.308-.151.605-.313.297-.163.297-.163.593-.33l.594-.337c.297-.168.307-.145.604-.313s.297-.162.6-.33c.302-.168.302-.163.598-.325s.588-.347.588-.347.19.29.185.705c0 .213-.062.448-.202.706-.1.184-.252.37-.47.56a3.76 3.76 0 0 1-.605.425c-.173.095-.38.19-.599.313-.184.101-.37.236-.576.353-.19.106-.398.202-.6.314-.195.106-.38.235-.582.347-.201.112-.397.212-.593.324-.196.112-.409.202-.605.308-.196.107-.391.23-.587.336-.196.107-.409.202-.605.308-.207.112-.414.202-.605.308-.212.118-.391.257-.576.358-.224.123-.431.224-.6.314-.369.201-.296.157-.593.319M19.92 7.14s.19.292.185.706c0 .213-.061.448-.201.705-.101.185-.252.37-.47.56a3.76 3.76 0 0 1-.605.426c-.174.095-.381.19-.6.313-.184.101-.369.235-.576.353-.19.106-.397.202-.599.313-.196.107-.38.236-.582.347-.202.112-.398.213-.594.325-.195.112-.408.202-.604.308-.196.106-.392.23-.588.336-.196.106-.409.202-.605.308-.207.112-.414.201-.604.308-.213.117-.392.257-.577.358"
                ></path>
                <path
                  d="M18.6 9.654s.19.291.184.706c0 .212-.062.448-.202.705-.1.185-.252.37-.47.56-.162.14-.358.285-.605.425-.173.096-.38.19-.599.314-.184.1-.369.235-.576.353-.19.106-.398.201-.6.313-.195.106-.38.235-.581.347-.202.112-.398.213-.594.325s-.409.201-.604.308c-.196.106-.392.23-.588.336M17.91 17.346h1.926M18.308 15.37c.308 0 .308-.005.616-.005h.616c.308 0 .308.01.61.01h1.847c.308 0 .308-.01.616-.01M18.683 13.54h.678c.335 0 .341-.012.677-.012h.677"
                ></path>
              </g>
            </svg>
            Free Shipping On Orders $1.54
          </div>
          <a href="checkout.html" class="add_to_cart__">
            <!-- <i class="fa fa-shopping-bag"></i> -->
            <i class="fa fa-shopping-cart"></i> Add To Cart
          </a>
          <!-- <div class="right_side_img_low">
            <img src="images/rightsideimg.png" alt="" class="thecods_img" />
          </div> -->
          <div class="giddy_talk__">
            <span class="title__giddy__">
              Giddy Up - These Squares are Ready to Ride
            </span>
            <p class="giddy_par">
              Made from water-resistant bison or roughout with a bovine shaft,
              The Cody is a trusty riding partner from sunup to sundown.
              Featuring our original broad square toe, weatherproofed seams, a
              slip-resistant Vibram sole, and a removable insole  theyre built
              to keep your feet comfy while slipped through your stirrups. They
              also make taking them on and off one less chore with reinforced
              pull holes. Standing tall with a 13  shaft, theyll keep you
              going at a gallop  whatever crosses your path.
            </p>
          </div>

          <div class="top_side_mdd md " style="color:#314838">
            DETAILS
            <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
                <ul>
                    <li class="tlt">- Water-resistant bison or roughout</li>
                    <li class="tlt">- Reinforced pull holes</li>
                    <li class="tlt">- Slip-resistant Vibram sole</li>
                    <li class="tlt">- 2" pitched riding heel with spur ledge</li>
                    <li class="tlt">
                        - Removable polyurethane insole for all-day comfort
                    </li>
                </ul>
            </div>
          <div class="top_side_mdd md " style="color:#314838;margin-top:15px">
            MATERIAL
            <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
                <ul>
                    <li class="tlt">- Water-resistant bison or roughout</li>
                    <li class="tlt">- Reinforced pull holes</li>
                    <li class="tlt">- Slip-resistant Vibram sole</li>
                    <li class="tlt">- 2" pitched riding heel with spur ledge</li>
                    <li class="tlt">
                        - Removable polyurethane insole for all-day comfort
                    </li>
                </ul>
            </div>
          <div class="top_side_mdd md " style="color:#314838;margin-top:15px">
            CARE INSTRUCTIONS
            <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
                <ul>
                    <li class="tlt">- Water-resistant bison or roughout</li>
                    <li class="tlt">- Reinforced pull holes</li>
                    <li class="tlt">- Slip-resistant Vibram sole</li>
                    <li class="tlt">- 2" pitched riding heel with spur ledge</li>
                    <li class="tlt">
                        - Removable polyurethane insole for all-day comfort
                    </li>
                </ul>
            </div>
          <div class="top_side_mdd md " style="color:#314838;margin:15px 0px">
            SHIPPING & RETURNS
            <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
                <ul>
                    <li class="tlt">- Water-resistant bison or roughout</li>
                    <li class="tlt">- Reinforced pull holes</li>
                    <li class="tlt">- Slip-resistant Vibram sole</li>
                    <li class="tlt">- 2" pitched riding heel with spur ledge</li>
                    <li class="tlt">
                        - Removable polyurethane insole for all-day comfort
                    </li>
                </ul>
            </div>
        </div>
      </div>

      
      
    </section>

    <section class="empty_sec"></section>

    <section class="review_section_container">
      <div class="sub_container_rv_sec">
        <div class="title_review_take_">
          TAKE IT FROM THE LOCALS
        </div>
        
        <div class="container_review_stars_nmb_overall">
          <div class="review_container">
            <div class="number_container_stars">
              <span class="number_total_">
                4.68
              </span>
              <div class="stars_container_">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
              </div>
            </div>
            <div class="overall_rating_">
              OVERALL RATING BASED ON 98 REVIEWS
            </div>


            <div class="all_lines_review">
              <div class="lines_review__">
                <span class="number_line_">
                  5
                </span>
                <div class="line_container__">
                    <div class="percentage_color"></div>
                </div>
              </div>
              <div class="lines_review__">
                <span class="number_line_">
                  4
                </span>
                <div class="line_container__">
                    <div class="percentage_color" style="width:20%"></div>
                </div>
              </div>
              <div class="lines_review__">
                <span class="number_line_">
                  3
                </span>
                <div class="line_container__">
                    <div class="percentage_color" style="width:40%"></div>
                </div>
              </div>
              <div class="lines_review__">
                <span class="number_line_">
                  2
                </span>
                <div class="line_container__">
                    <div class="percentage_color" style="width:0%"></div>
                </div>
              </div>
              <div class="lines_review__">
                <span class="number_line_">
                  1
                </span>
                <div class="line_container__">
                    <div class="percentage_color" style="width:10%"></div>
                </div>
              </div>
            </div>
            
          </div>

          <div class="overall_fit__">
            <span class="overall_title__">
              OVERALL FIT
            </span>

            <div class="container_overall___">
              <div class="title__runs_small">
                <div class="row_title_run_small"></div>
                <span class="runs_sml">
                  RUNS SMALL
                </span>
              </div>
              <div class="title__runs_small">
                <div class="cont__true_size">
                    <div class="row_title_run_small">
                      <svg fill="black" class="lolplpl" height="14" viewBox="0 0 12 14" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m0 2c0-1.10457.895431-2 2-2h8c1.1046 0 2 .895431 2 2v4.35907c0 .41685-.1302.82327-.3725 1.16248l-4.04626 5.66475c-.36476.5106-.95368.8137-1.58124.8137s-1.21648-.3031-1.58124-.8137l-4.046227-5.66475c-.242287-.33921-.372533-.74563-.372533-1.16248z" fill="var(--junipPrimaryColor)"></path></svg>
                    </div>
                    <div class="row_title_run_small">            
                    </div>
                </div>
                <span class="runs_sml gggr">
                  TRUE SIZE
                </span>
              </div>
              <div class="title__runs_small">
                <div class="row_title_run_small"></div>
                <span class="runs_sml">
                  RUNS BIG
                </span>
              </div>
            </div>  
          </div>
        </div> 
        
        <div class="sort_filter_inp">
          <div class="sort_title">
            SORT & FILTER <i class="fa fa-angle-up"></i>
          </div>
          <div class="inp_sort_by">

            <select name="" id="" class="input_slct__sort">
              <option value="">FEATURED</option>
            </select>
            <select name="" id="" class="input_slct__sort">
              <option value="">ALL </option>
            </select>
            <input type="checkbox" class="with_media">
            <span class="nmd__">WITH MEDIA</span>         
          </div>
        </div>


        <div class="buyers_comments__">
          <div class="left_side_comment">
            
            <span class="name_the_buyer__">
              Levi <svg height="8" viewBox="0 0 10 8" width="10" xmlns="http://www.w3.org/2000/svg" role="img"><title>Verified checkmark</title><path fill="#2A4234" d="m9.7232.237409c.3475.33708.371.908431.0524 1.276151l-5.36584 6.19354c-.15733.1816-.37795.2873-.61073.2927-.23278.0053-.45753-.0901-.62217-.2643l-2.926832-3.0968c-.3333705-.3528-.3333705-.92464 0-1.27737.33337-.35274.873882-.35274 1.207262 0l2.29638 2.42967 4.76343-5.498101c.3185-.3677198.8585-.3925598 1.2061-.05549z"></path></svg> 
              <span class="verified_buyer">VERIFIED BUYER</span>
            </span>
            <span class="recommend___vr">
              <svg height="8" viewBox="0 0 10 8" width="10" xmlns="http://www.w3.org/2000/svg" role="img"><title>Verified checkmark</title><path fill="#2A4234" d="m9.7232.237409c.3475.33708.371.908431.0524 1.276151l-5.36584 6.19354c-.15733.1816-.37795.2873-.61073.2927-.23278.0053-.45753-.0901-.62217-.2643l-2.926832-3.0968c-.3333705-.3528-.3333705-.92464 0-1.27737.33337-.35274.873882-.35274 1.207262 0l2.29638 2.42967 4.76343-5.498101c.3185-.3677198.8585-.3925598 1.2061-.05549z"></path></svg>
              I RECOMMEND THIS PRODUCT
            </span>
          </div>
          <div class="right_side_comment__">
            <div class="stars_container_">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <div class="slightyly___">
              I would definitely repurchase this product; it works wonders!

            </div>
            <div class="talk_lower_rv">
              I wasnt sure if it would live up to the high expectations I had set for it
            </div>
            <div class="overall_fit__">
              <span class="overall_title__">
                OVERALL FIT
              </span>
  
              <div class="container_overall___">
                <div class="title__runs_small">
                  <div class="row_title_run_small"></div>
                  <span class="runs_sml">
                    RUNS SMALL
                  </span>
                </div>
                <div class="title__runs_small">
                  <div class="cont__true_size">
                      <div class="row_title_run_small">
                        <svg fill="black" class="lolplpl" height="14" viewBox="0 0 12 14" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m0 2c0-1.10457.895431-2 2-2h8c1.1046 0 2 .895431 2 2v4.35907c0 .41685-.1302.82327-.3725 1.16248l-4.04626 5.66475c-.36476.5106-.95368.8137-1.58124.8137s-1.21648-.3031-1.58124-.8137l-4.046227-5.66475c-.242287-.33921-.372533-.74563-.372533-1.16248z" fill="var(--junipPrimaryColor)"></path></svg>
                      </div>
                      <div class="row_title_run_small">            
                      </div>
                  </div>
                  <span class="runs_sml gggr">
                    TRUE SIZE
                  </span>
                </div>
                <div class="title__runs_small">
                  <div class="row_title_run_small"></div>
                  <span class="runs_sml">
                    RUNS BIG
                  </span>
                </div>
              </div>  
            </div>

            <div class="review_left_on">
              Review left on: anchorwellnessaw.com 
            </div>
            <div class="thumbs_container">
              <span class="thumbs_up">
                <i class="fa fa-thumbs-up"></i> 24
              </span>
              <span class="thumbs_up">
                <i class="fa fa-thumbs-down"></i> 0
              </span>

            </div>
          </div>
        </div>  
        <div class="buyers_comments__">
          <div class="left_side_comment">
            
            <span class="name_the_buyer__">
              Isaac <svg height="8" viewBox="0 0 10 8" width="10" xmlns="http://www.w3.org/2000/svg" role="img"><title>Verified checkmark</title><path fill="#2A4234" d="m9.7232.237409c.3475.33708.371.908431.0524 1.276151l-5.36584 6.19354c-.15733.1816-.37795.2873-.61073.2927-.23278.0053-.45753-.0901-.62217-.2643l-2.926832-3.0968c-.3333705-.3528-.3333705-.92464 0-1.27737.33337-.35274.873882-.35274 1.207262 0l2.29638 2.42967 4.76343-5.498101c.3185-.3677198.8585-.3925598 1.2061-.05549z"></path></svg> 
              <span class="verified_buyer">VERIFIED BUYER</span>
            </span>
            <span class="recommend___vr">
              <svg height="8" viewBox="0 0 10 8" width="10" xmlns="http://www.w3.org/2000/svg" role="img"><title>Verified checkmark</title><path fill="#2A4234" d="m9.7232.237409c.3475.33708.371.908431.0524 1.276151l-5.36584 6.19354c-.15733.1816-.37795.2873-.61073.2927-.23278.0053-.45753-.0901-.62217-.2643l-2.926832-3.0968c-.3333705-.3528-.3333705-.92464 0-1.27737.33337-.35274.873882-.35274 1.207262 0l2.29638 2.42967 4.76343-5.498101c.3185-.3677198.8585-.3925598 1.2061-.05549z"></path></svg>
              I RECOMMEND THIS PRODUCT
            </span>
          </div>
          <div class="right_side_comment__">
            <div class="stars_container_">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <div class="slightyly___">
              Im really impressed with this product; it has exceeded all my expectations!
            </div>
            <div class="talk_lower_rv">
              I absolutely love this product! 
            </div>
            <div class="overall_fit__">
              <span class="overall_title__">
                OVERALL FIT
              </span>
  
              <div class="container_overall___">
                <div class="title__runs_small">
                  <div class="row_title_run_small"></div>
                  <span class="runs_sml">
                    RUNS SMALL
                  </span>
                </div>
                <div class="title__runs_small">
                  <div class="cont__true_size">
                      <div class="row_title_run_small">
                        <svg fill="black" class="lolplpl" height="14" viewBox="0 0 12 14" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m0 2c0-1.10457.895431-2 2-2h8c1.1046 0 2 .895431 2 2v4.35907c0 .41685-.1302.82327-.3725 1.16248l-4.04626 5.66475c-.36476.5106-.95368.8137-1.58124.8137s-1.21648-.3031-1.58124-.8137l-4.046227-5.66475c-.242287-.33921-.372533-.74563-.372533-1.16248z" fill="var(--junipPrimaryColor)"></path></svg>
                      </div>
                      <div class="row_title_run_small">            
                      </div>
                  </div>
                  <span class="runs_sml gggr">
                    TRUE SIZE
                  </span>
                </div>
                <div class="title__runs_small">
                  <div class="row_title_run_small"></div>
                  <span class="runs_sml">
                    RUNS BIG
                  </span>
                </div>
              </div>  
            </div>

            <div class="review_left_on">
              Review left on: anchorwellnessaw.com
            </div>
            <div class="thumbs_container">
              <span class="thumbs_up">
                <i class="fa fa-thumbs-up"></i> 24
              </span>
              <span class="thumbs_up">
                <i class="fa fa-thumbs-down"></i> 0
              </span>

            </div>
          </div>
        </div>  
        <div class="buyers_comments__">
          <div class="left_side_comment">
            
            <span class="name_the_buyer__">
              Ethan <svg height="8" viewBox="0 0 10 8" width="10" xmlns="http://www.w3.org/2000/svg" role="img"><title>Verified checkmark</title><path fill="#2A4234" d="m9.7232.237409c.3475.33708.371.908431.0524 1.276151l-5.36584 6.19354c-.15733.1816-.37795.2873-.61073.2927-.23278.0053-.45753-.0901-.62217-.2643l-2.926832-3.0968c-.3333705-.3528-.3333705-.92464 0-1.27737.33337-.35274.873882-.35274 1.207262 0l2.29638 2.42967 4.76343-5.498101c.3185-.3677198.8585-.3925598 1.2061-.05549z"></path></svg> 
              <span class="verified_buyer">VERIFIED BUYER</span>
            </span>
            <span class="recommend___vr">
              <svg height="8" viewBox="0 0 10 8" width="10" xmlns="http://www.w3.org/2000/svg" role="img"><title>Verified checkmark</title><path fill="#2A4234" d="m9.7232.237409c.3475.33708.371.908431.0524 1.276151l-5.36584 6.19354c-.15733.1816-.37795.2873-.61073.2927-.23278.0053-.45753-.0901-.62217-.2643l-2.926832-3.0968c-.3333705-.3528-.3333705-.92464 0-1.27737.33337-.35274.873882-.35274 1.207262 0l2.29638 2.42967 4.76343-5.498101c.3185-.3677198.8585-.3925598 1.2061-.05549z"></path></svg>
              I RECOMMEND THIS PRODUCT
            </span>
          </div>
          <div class="right_side_comment__">
            <div class="stars_container_">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <div class="slightyly___">
              I cant get enough of this product; its simply the best!

            </div>
            <div class="talk_lower_rv">
              The design is amazing.            </div>
            <div class="overall_fit__">
              <span class="overall_title__">
                OVERALL FIT
              </span>
  
              <div class="container_overall___">
                <div class="title__runs_small">
                  <div class="row_title_run_small"></div>
                  <span class="runs_sml">
                    RUNS SMALL
                  </span>
                </div>
                <div class="title__runs_small">
                  <div class="cont__true_size">
                      <div class="row_title_run_small">
                        <svg fill="black" class="lolplpl" height="14" viewBox="0 0 12 14" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m0 2c0-1.10457.895431-2 2-2h8c1.1046 0 2 .895431 2 2v4.35907c0 .41685-.1302.82327-.3725 1.16248l-4.04626 5.66475c-.36476.5106-.95368.8137-1.58124.8137s-1.21648-.3031-1.58124-.8137l-4.046227-5.66475c-.242287-.33921-.372533-.74563-.372533-1.16248z" fill="var(--junipPrimaryColor)"></path></svg>
                      </div>
                      <div class="row_title_run_small">            
                      </div>
                  </div>
                  <span class="runs_sml gggr">
                    TRUE SIZE
                  </span>
                </div>
                <div class="title__runs_small">
                  <div class="row_title_run_small"></div>
                  <span class="runs_sml">
                    RUNS BIG
                  </span>
                </div>
              </div>  
            </div>

            <div class="review_left_on">
              Review left on: anchorwellnessaw.com
            </div>
            <div class="thumbs_container">
              <span class="thumbs_up">
                <i class="fa fa-thumbs-up"></i> 24
              </span>
              <span class="thumbs_up">
                <i class="fa fa-thumbs-down"></i> 0
              </span>

            </div>
          </div>
        </div>  
     



      </div>


    </section> 
    
    <!-- footer section  -->
    <section class="footer_section_container">
      <div class="newsletter_container">
        <div class="left_side_container_ft">
          <div class="title_newsletter">JOIN OUR NEWSLETTER</div>
          <div class="inputAreaContainer">
            <label for="" class="email_add">EMAIL ADDRESS:</label>
            <div class="inp_container_">
              <input
                type="text"
                class="address_inp"
                placeholder="ADD YOUR EMAIL ADDRESS"
              />
              <input type="submit" class="submit_subscribe" value="SUBSCRIBE" />
            </div>
          </div>
          <div class="socials_container">
            <div class="icon_container">
              <i class="fa fa-instagram"></i>
              <!-- <i class="fa fa-facebook"></i>
                        <i class="fa fa-pinterest"></i>
                        <i class="fa fa-youtube-play"></i> -->
            </div>
            <div class="icon_container">
              <!-- <i class="fa fa-instagram"></i> -->
              <!-- <i class="fa fa-facebook"></i> -->
              <!-- <i class="fa fa-pinterest"></i> -->
              <i class="fa fa-youtube-play"></i>
            </div>
            <div class="icon_container">
              <!-- <i class="fa fa-instagram"></i> -->
              <i class="fa fa-facebook"></i>
              <!-- <i class="fa fa-pinterest"></i> -->
              <!-- <i class="fa fa-youtube-play"></i>  -->
            </div>
            <div class="icon_container">
              <!-- <i class="fa fa-instagram"></i> -->
              <!-- <i class="fa fa-facebook"></i> -->
              <i class="fa fa-pinterest"></i>
              <!-- <i class="fa fa-youtube-play"></i>  -->
            </div>
          </div>
        </div>
        <div class="right_side_container_ft">
          <div class="shop_nav">
            <div class="title_shop_ft">SHOP</div>
            <a href=""  class="title_men_ft"> MEN </a>
            <div class="ft_items">
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href=""  class="title_item_shp"> BOOTS </a>
              </li>
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href=""  class="title_item_shp"> APPAREL </a>
              </li>
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href=""  class="title_item_shp"> ACCESSORIES </a>
              </li>
            </div>
            <a href=""  class="title_men_ft"> WOMEN </a>
            <div class="ft_items">
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href="" class="title_item_shp"> BOOTS </a>
              </li>
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href="" class="title_item_shp"> APPAREL </a>
              </li>
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href="" class="title_item_shp"> ACCESSORIES </a>
              </li>
            </div>
            <a href="" class="title_men_ft"> GIFT CARDS </a>
          </div>

          <div class="about_us_ft">
            <div class="title_shop_ft">ABOUT US</div>
            <a href="" class="title_men_ft"> OUR STORIES </a>
            <a href="" class="title_men_ft"> CAREERS </a>
            <a href="" class="title_men_ft"> HOW WE MAKE'EM </a>
          </div>
          <div class="about_us_ft">
            <div class="title_shop_ft">ABOUT US</div>
            <a href=""  class="title_men_ft"> MY ACCOUNT </a>
            <a href=""  class="title_men_ft"> FIND MY STORE </a>
            <a href=""  class="title_men_ft"> EVENTS </a>
            <a href=""  class="title_men_ft"> REFER A FRIEND </a>
            <a href=""  class="title_men_ft"> CORPORATE GIFTS </a>
            <a href=""  class="title_men_ft"> AFFILIATE PROGRAM </a>
            <a href=""  class="title_men_ft"> REVIEWS </a>
          </div>
          <div class="about_us_ft">
            <div class="title_shop_ft">HELP</div>
            <a href=""class="title_men_ft"> FAQ </a>
            <a href="" class="title_men_ft"> FIT GUIDE </a>
            <a href="" class="title_men_ft"> PRODUCT CARE </a>
            <a href="" class="title_men_ft"> RETURNS & EXCHANGES POLICY </a>
            <a href=""href="" class="title_men_ft"> START A RETURN </a>
            <a href="" class="title_men_ft"> BOOT RESTORATION </a>
          </div>
        </div>
        <div class="right_side_cont_md">
          <div class="title_shop_ft">
            <div class="top_side_mdd md">
              SHOP
              <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href=""  class="title_item_shp"> BOOTS </a>
              </li>
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href=""  class="title_item_shp"> APPAREL </a>
              </li>
              <li>
                <svg
                  aria-hidden="true"
                  fill="none"
                  height="100%"
                  role="presentation"
                  viewBox="0 0 40 20"
                  width="100%"
                >
                  <title>Decorative Arrow Short Right</title>
                  <g
                    stroke="currentColor"
                    stroke-width="1.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                    ></path>
                    <path
                      d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                    ></path>
                    <path
                      d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                    ></path>
                    <path
                      d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                    ></path>
                  </g>
                </svg>
                <a href=""  class="title_item_shp"> ACCESSORIES </a>
              </li>
              <a href=""  class="title_men_ft"> WOMEN </a>
              <div class="ft_items">
                <li>
                  <svg
                    aria-hidden="true"
                    fill="none"
                    height="100%"
                    role="presentation"
                    viewBox="0 0 40 20"
                    width="100%"
                  >
                    <title>Decorative Arrow Short Right</title>
                    <g
                      stroke="currentColor"
                      stroke-width="1.4"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path
                        d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                      ></path>
                      <path
                        d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                      ></path>
                      <path
                        d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                      ></path>
                      <path
                        d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                      ></path>
                    </g>
                  </svg>
                  <a href=""  class="title_item_shp"> BOOTS </a>
                </li>
                <li>
                  <svg
                    aria-hidden="true"
                    fill="none"
                    height="100%"
                    role="presentation"
                    viewBox="0 0 40 20"
                    width="100%"
                  >
                    <title>Decorative Arrow Short Right</title>
                    <g
                      stroke="currentColor"
                      stroke-width="1.4"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path
                        d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                      ></path>
                      <path
                        d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                      ></path>
                      <path
                        d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                      ></path>
                      <path
                        d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                      ></path>
                    </g>
                  </svg>
                  <a href="" class="title_item_shp"> APPAREL </a>
                </li>
                <li>
                  <svg
                    aria-hidden="true"
                    fill="none"
                    height="100%"
                    role="presentation"
                    viewBox="0 0 40 20"
                    width="100%"
                  >
                    <title>Decorative Arrow Short Right</title>
                    <g
                      stroke="currentColor"
                      stroke-width="1.4"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path
                        d="M30.5 6C33.5261 7.99733 36.5 9.99466 36.5 9.99466C36.5 9.99466 33.5261 11.992 30.5104 14"
                      ></path>
                      <path
                        d="M9.5 6C12.982 8.02436 16.5 10.0054 16.5 10.0054C16.5 10.0054 12.982 11.9756 9.5 14"
                      ></path>
                      <path
                        d="M3.5 6C6.46423 8.00536 9.5 10 9.5 10C9.5 10 6.454 11.9839 3.5 14"
                      ></path>
                      <path
                        d="M35.5 10C31.3397 10 30.2489 10 26.0885 10C21.9282 10 23.0063 10 18.8333 10C14.6603 10 13.1603 10 9 10"
                      ></path>
                    </g>
                  </svg>
                  <a href=""  class="title_item_shp"> ACCESSORIES </a>
                </li>
              </div>
              <a href=""  class="title_men_ft"> GIFT CARDS </a>
            </div>
          </div>

          <div class="title_shop_ft">
            <div class="top_side_mdd md">
              ABOUT US
              <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
              <a href=""  class="title_men_ft"> OUR STORIES </a>
              <a href=""  class="title_men_ft"> CAREERS </a>
              <a href=""  class="title_men_ft"> HOW WE MAKE'EM </a>
            </div>
          </div>
          <div class="title_shop_ft">
            <div class="top_side_mdd md">
              CONNECT
              <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
              <a href=""  class="title_men_ft"> MY ACCOUNT </a>
              <a href=""  class="title_men_ft"> FIND MY STORE </a>
              <a href=""  class="title_men_ft"> EVENTS </a>
              <a href=""  class="title_men_ft"> REFER A FRIEND </a>
              <a href=""  class="title_men_ft"> CORPORATE GIFTS </a>
              <a href=""  class="title_men_ft"> AFFILIATE PROGRAM </a>
              <a href=""  class="title_men_ft"> REVIEWS </a>
            </div>
          </div>
          <div class="title_shop_ft">
            <div class="top_side_mdd md">
              HELP
              <span class="symbolMd"> + </span>
            </div>
            <div class="containerContentmd">
              <a href=""  class="title_men_ft"> FAQ </a>
              <a href=""  class="title_men_ft"> FIT GUIDE </a>
              <a href=""  class="title_men_ft"> PRODUCT CARE </a>
              <a href=""  class="title_men_ft"> RETURNS & EXCHANGES POLICY </a>
              <a href=""  class="title_men_ft"> START A RETURN </a>
              <a href=""  class="title_men_ft"> BOOT RESTORATION </a>
            </div>
          </div>
        </div>
      </div>
      <div class="mid_footer_">
        <a href=""  class="mailLink">anchorwellnessaw.com</a>
        <a href=""  class="visitStore">VISIT A STORE</a>
      </div>
      <div class="lower_footer_f">
        <span class="ft__"> 2024 anchorwellnessaw.com, INC. ALL RIGHTS RESERVED </span>
        <span class="ft__tr">
          <a href="terms.html"  class="terms_"> TERMS  </a>
          <a href="privacy.html"  class="terms_"> PRIVACY POLICY  </a>
          <a href="contact.html"  class="terms_"> CONTACT US  </a>
          <a href="about.html"  class="terms_"> ACCESSIBILITY  </a>
          <a href=""  class="terms_">
            DO NOT SELL OR SHARE MY PERSONAL INFORMATION
          </a>
        </span>
      </div>
    </section>


    

      <script src="js/app.js"></script>
      <script src="js/carousel.js"></script>

  </body>
</html>
