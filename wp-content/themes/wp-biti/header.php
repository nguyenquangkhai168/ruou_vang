<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title( '' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap"
    rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php do_action( 'wp_after_body_open' ); ?>
  <?php
	wp_body_open();
	$items_count = WC()->cart->get_cart_contents_count();
	?>
  <div id="wrapper">
    <header id="header" class="header">
      <div class="header-topbar d-none d-lg-block">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <div class="header-topbar__left">
                <div class="header-topbar__phone d-flex align-items-center">
                  <div class="icon-box me-3">
                    <svg width="19" height="21" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M13.2182 10.4426C13.2804 10.4426 13.3412 10.4455 13.4019 10.45L13.2004 10.9256L13.1293 11.1226L13.1175 11.1596C13.0404 11.4085 13.0004 11.6663 12.996 11.9241H2.84733C2.65087 11.9241 2.46245 12.0022 2.32352 12.1411C2.1846 12.28 2.10655 12.4684 2.10655 12.6649V13.4057C2.10655 15.5362 4.22814 17.8503 8.03277 17.8503C8.49057 17.8503 8.92319 17.8163 9.3321 17.754C9.11036 18.2296 9.02668 18.7578 9.0906 19.2786C8.73915 19.3146 8.38607 19.3324 8.03277 19.3319C3.38069 19.3319 0.625 16.3258 0.625 13.4057V12.6649C0.625 12.0755 0.859138 11.5102 1.27591 11.0935C1.69267 10.6767 2.25793 10.4426 2.84733 10.4426H13.2182Z"
                        fill="white" />
                      <path
                        d="M12.7725 16.7303L13.8688 17.0948L14.0481 17.154C14.5578 16.7688 14.9815 16.2844 15.3223 15.7006C15.6141 15.1999 15.8038 14.6917 15.8941 14.1761L15.9312 13.9183L14.8689 12.9109C14.6969 12.7439 14.5746 12.5326 14.5155 12.3004C14.4564 12.0681 14.4628 11.8241 14.5341 11.5952L14.5785 11.4693L15.0615 10.333C15.1609 10.0812 15.3452 9.87202 15.5824 9.74163C15.8196 9.61125 16.095 9.56782 16.3608 9.61885L16.4749 9.64848L17.0779 9.84108C17.6764 10.0337 18.1357 10.5463 18.2839 11.1893C18.635 12.7212 18.2128 14.585 17.0172 16.7807C15.823 18.9734 14.5133 20.2935 13.0896 20.7364C12.8179 20.8209 12.5293 20.8353 12.2506 20.7783C11.9719 20.7213 11.7121 20.5948 11.4954 20.4105L11.3769 20.3009L10.9191 19.8416C10.726 19.6429 10.6012 19.3879 10.5629 19.1135C10.5245 18.8391 10.5745 18.5596 10.7057 18.3156L10.7739 18.2059L11.4658 17.1896C11.5793 17.02 11.7355 16.8833 11.9185 16.793C12.1016 16.7028 12.3051 16.6623 12.5088 16.6755C12.5566 16.6794 12.6041 16.6863 12.651 16.6962L12.7725 16.7303V16.7303Z"
                        fill="white" />
                      <path
                        d="M8.03277 0.8125C9.11334 0.8125 10.1496 1.24175 10.9137 2.00583C11.6778 2.7699 12.107 3.80621 12.107 4.88678C12.107 5.96734 11.6778 7.00365 10.9137 7.76772C10.1496 8.5318 9.11334 8.96105 8.03277 8.96105C6.95221 8.96105 5.9159 8.5318 5.15182 7.76772C4.38775 7.00365 3.9585 5.96734 3.9585 4.88678C3.9585 3.80621 4.38775 2.7699 5.15182 2.00583C5.9159 1.24175 6.95221 0.8125 8.03277 0.8125V0.8125ZM8.03277 2.29405C7.34514 2.29405 6.68567 2.56722 6.19944 3.05345C5.71321 3.53967 5.44005 4.19914 5.44005 4.88678C5.44005 5.57441 5.71321 6.23388 6.19944 6.72011C6.68567 7.20634 7.34514 7.4795 8.03277 7.4795C8.7204 7.4795 9.37987 7.20634 9.8661 6.72011C10.3523 6.23388 10.6255 5.57441 10.6255 4.88678C10.6255 4.19914 10.3523 3.53967 9.8661 3.05345C9.37987 2.56722 8.7204 2.29405 8.03277 2.29405Z"
                        fill="white" />
                    </svg>
                  </div>
                  Hotline: <a class="ms-2 text-white" href="tel:0777 333 969">0777 333 969</a>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="header-topbar__right">
                <ul class="header-topbar__social d-flex justify-content-end list-unstyled mb-0">
                  <li class="me-2">
                    <a href="#">
                      <div class="icon-box"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 10.0558C0 15.0275 3.61083 19.1617 8.33333 20V12.7775H5.83333V10H8.33333V7.7775C8.33333 5.2775 9.94417 3.88917 12.2225 3.88917C12.9442 3.88917 13.7225 4 14.4442 4.11083V6.66667H13.1667C11.9442 6.66667 11.6667 7.2775 11.6667 8.05583V10H14.3333L13.8892 12.7775H11.6667V20C16.3892 19.1617 20 15.0283 20 10.0558C20 4.525 15.5 0 10 0C4.5 0 0 4.525 0 10.0558Z"
                            fill="white" />
                        </svg></div>
                    </a>
                  </li>
                  <li class="me-2">
                    <a href="#">
                      <div class="icon-box"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M19.9356 5.90309C19.9244 5.06334 19.7669 4.23193 19.4702 3.44606C19.213 2.78318 18.82 2.18117 18.3165 1.67849C17.813 1.17581 17.21 0.783514 16.546 0.526666C15.7689 0.235455 14.948 0.0779923 14.1182 0.0609825C13.0498 0.0133053 12.711 0 9.99889 0C7.28676 0 6.93914 7.43489e-08 5.8785 0.0609825C5.04904 0.0781174 4.22851 0.235578 3.4518 0.526666C2.78771 0.783335 2.18461 1.17557 1.68107 1.67827C1.17753 2.18097 0.784639 2.78308 0.527543 3.44606C0.235263 4.22124 0.07788 5.04059 0.0621946 5.86872C0.014438 6.93647 0 7.27464 0 9.98226C0 12.6899 -8.27475e-09 13.0358 0.0621946 14.0958C0.0788538 14.9252 0.235451 15.7434 0.527543 16.5207C0.785071 17.1835 1.17825 17.7853 1.68196 18.2878C2.18567 18.7903 2.78883 19.1824 3.45291 19.439C4.22749 19.7419 5.04817 19.9106 5.87961 19.9379C6.94913 19.9856 7.28787 20 10 20C12.7121 20 13.0598 20 14.1204 19.9379C14.9502 19.9216 15.7712 19.7645 16.5482 19.4733C17.212 19.2162 17.8149 18.8238 18.3183 18.3211C18.8218 17.8185 19.2149 17.2166 19.4725 16.5539C19.7646 15.7778 19.9211 14.9595 19.9378 14.1291C19.9856 13.0624 20 12.7243 20 10.0155C19.9978 7.30791 19.9978 6.96419 19.9356 5.90309V5.90309ZM9.99223 15.1026C7.15571 15.1026 4.85784 12.8085 4.85784 9.97672C4.85784 7.14492 7.15571 4.85087 9.99223 4.85087C11.354 4.85087 12.6599 5.39091 13.6228 6.3522C14.5857 7.31348 15.1266 8.61726 15.1266 9.97672C15.1266 11.3362 14.5857 12.64 13.6228 13.6012C12.6599 14.5625 11.354 15.1026 9.99223 15.1026V15.1026ZM15.331 5.85653C15.1737 5.85667 15.0179 5.82586 14.8726 5.76584C14.7273 5.70582 14.5953 5.61779 14.4841 5.50677C14.3729 5.39575 14.2847 5.26393 14.2246 5.11885C14.1644 4.97377 14.1336 4.81828 14.1337 4.66127C14.1337 4.50438 14.1647 4.34903 14.2248 4.20408C14.285 4.05913 14.3731 3.92743 14.4842 3.81649C14.5953 3.70555 14.7273 3.61755 14.8725 3.55751C15.0176 3.49747 15.1733 3.46657 15.3304 3.46657C15.4876 3.46657 15.6432 3.49747 15.7884 3.55751C15.9336 3.61755 16.0655 3.70555 16.1766 3.81649C16.2877 3.92743 16.3759 4.05913 16.436 4.20408C16.4961 4.34903 16.5271 4.50438 16.5271 4.66127C16.5271 5.3221 15.9918 5.85653 15.331 5.85653Z"
                            fill="white" />
                          <path
                            d="M10 13.3334C11.8409 13.3334 13.3333 11.841 13.3333 10C13.3333 8.15907 11.8409 6.66669 10 6.66669C8.15905 6.66669 6.66666 8.15907 6.66666 10C6.66666 11.841 8.15905 13.3334 10 13.3334Z"
                            fill="white" />
                        </svg></div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="icon-box"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M11.6698 9.82604L9.33021 8.73437C9.12604 8.63958 8.95833 8.74583 8.95833 8.97187V11.0281C8.95833 11.2542 9.12604 11.3604 9.33021 11.2656L11.6687 10.174C11.874 10.0781 11.874 9.92188 11.6698 9.82604ZM10 0C4.47708 0 0 4.47708 0 10C0 15.5229 4.47708 20 10 20C15.5229 20 20 15.5229 20 10C20 4.47708 15.5229 0 10 0ZM10 14.0625C4.88125 14.0625 4.79167 13.601 4.79167 10C4.79167 6.39896 4.88125 5.9375 10 5.9375C15.1187 5.9375 15.2083 6.39896 15.2083 10C15.2083 13.601 15.1187 14.0625 10 14.0625Z"
                            fill="white" />
                        </svg></div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-main d-none d-lg-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-lg-6">
              <a class="logo d-inline-block" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img class="logo-img" src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo.png" alt="Logo">
              </a>
            </div>
            <div class="col-12 col-lg-6">
              <div class="header-main__right d-flex align-items-center justify-content-end">
                <form class="header-main__form d-flex align-items-center position-relative"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" accept-charset="utf-8">
                  <input class="border border-white" type="text" id="s" name="s"
                    value="<?php echo get_search_query(); ?>" placeholder="Nhập gì đó để tìm kiếm...">
                  <button class="position-absolute border border-white bg-white" type="submit"><i
                      class="fal fa-search"></i></button>
                </form>
                <ul class="header-main__actions list-unstyled mb-0 d-flex">
                  <li class="header-main__actions--account me-3">
                    <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>">
                      <svg width="27" height="30" viewBox="0 0 27 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M13.4441 13.4444C11.7938 13.4444 10.2112 12.7889 9.0443 11.622C7.87741 10.4551 7.22186 8.87243 7.22186 7.2222C7.22186 5.57197 7.87741 3.98933 9.0443 2.82244C10.2112 1.65555 11.7938 1 13.4441 1C15.0943 1 16.6769 1.65555 17.8438 2.82244C19.0107 3.98933 19.6663 5.57197 19.6663 7.2222C19.6663 8.87243 19.0107 10.4551 17.8438 11.622C16.6769 12.7889 15.0943 13.4444 13.4441 13.4444Z"
                          stroke="white" stroke-width="2" stroke-linecap="round" />
                        <path
                          d="M1 29.0001V27.4445C1 24.9692 1.98333 22.5952 3.73366 20.8449C5.484 19.0945 7.85796 18.1112 10.3333 18.1112H16.5555C19.0309 18.1112 21.4048 19.0945 23.1551 20.8449C24.9055 22.5952 25.8888 24.9692 25.8888 27.4445V29.0001"
                          stroke="white" stroke-width="2" stroke-linecap="round" />
                      </svg>
                    </a>
                  </li>
                  <li class="header-main__actions--cart position-relative">
                    <a href="<?php echo wc_get_cart_url(); ?>">
                      <div class="icon-box"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M15 1.875C16.2432 1.875 17.4355 2.36886 18.3146 3.24794C19.1936 4.12701 19.6875 5.3193 19.6875 6.5625V7.5H10.3125V6.5625C10.3125 5.3193 10.8064 4.12701 11.6854 3.24794C12.5645 2.36886 13.7568 1.875 15 1.875V1.875ZM21.5625 7.5V6.5625C21.5625 4.82202 20.8711 3.15282 19.6404 1.92211C18.4097 0.691404 16.7405 0 15 0C13.2595 0 11.5903 0.691404 10.3596 1.92211C9.1289 3.15282 8.4375 4.82202 8.4375 6.5625V7.5H1.875V26.25C1.875 27.2446 2.27009 28.1984 2.97335 28.9016C3.67661 29.6049 4.63044 30 5.625 30H24.375C25.3696 30 26.3234 29.6049 27.0266 28.9016C27.7299 28.1984 28.125 27.2446 28.125 26.25V7.5H21.5625ZM3.75 9.375H26.25V26.25C26.25 26.7473 26.0525 27.2242 25.7008 27.5758C25.3492 27.9275 24.8723 28.125 24.375 28.125H5.625C5.12772 28.125 4.65081 27.9275 4.29917 27.5758C3.94754 27.2242 3.75 26.7473 3.75 26.25V9.375Z"
                            fill="white" />
                        </svg></div>
                      <span
                        class="quantity d-inline-flex align-items-center justify-content-center rounded-circle text-dark position-absolute">
                        <?php echo $items_count ? $items_count : '0'; ?>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-navbar d-none d-lg-block w-100" id="header-navbar">
        <div class="container">
          <div class="header-navbar__wrapper d-flex align-items-center justify-content-between">
            <?php
						wp_nav_menu( array(
							'theme_location'  => 'primary',
							'depth'           => 2,
							'container'       => 'div',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'header-navbar__container d-flex list-unstyled mb-0',
							'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
							'walker'          => new wp_bootstrap_navwalker(),
						) );
						?>
            <div class="cart-box position-relative">
              <a href="<?php echo wc_get_cart_url(); ?>">
                <div class="icon-box d-inline-block"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M15 1.875C16.2432 1.875 17.4355 2.36886 18.3146 3.24794C19.1936 4.12701 19.6875 5.3193 19.6875 6.5625V7.5H10.3125V6.5625C10.3125 5.3193 10.8064 4.12701 11.6854 3.24794C12.5645 2.36886 13.7568 1.875 15 1.875V1.875ZM21.5625 7.5V6.5625C21.5625 4.82202 20.8711 3.15282 19.6404 1.92211C18.4097 0.691404 16.7405 0 15 0C13.2595 0 11.5903 0.691404 10.3596 1.92211C9.1289 3.15282 8.4375 4.82202 8.4375 6.5625V7.5H1.875V26.25C1.875 27.2446 2.27009 28.1984 2.97335 28.9016C3.67661 29.6049 4.63044 30 5.625 30H24.375C25.3696 30 26.3234 29.6049 27.0266 28.9016C27.7299 28.1984 28.125 27.2446 28.125 26.25V7.5H21.5625ZM3.75 9.375H26.25V26.25C26.25 26.7473 26.0525 27.2242 25.7008 27.5758C25.3492 27.9275 24.8723 28.125 24.375 28.125H5.625C5.12772 28.125 4.65081 27.9275 4.29917 27.5758C3.94754 27.2242 3.75 26.7473 3.75 26.25V9.375Z"
                      fill="white" />
                  </svg></div>
                <span
                  class="quantity d-inline-flex align-items-center justify-content-center rounded-circle text-dark position-absolute">
                  <?php echo $items_count ? $items_count : '0'; ?>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="header-mobile position-fixed w-100 py-3 d-block d-lg-none">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-3">
              <div class="header-mobile__cart">
                <a class="position-relative d-block" href="<?php echo wc_get_cart_url(); ?>">
                  <div class="icon-box"><svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M9.34774 2.04075C10.1977 2.04075 11.0129 2.37841 11.614 2.97944C12.215 3.58048 12.5526 4.39566 12.5526 5.24565V5.88663H6.14284V5.24565C6.14284 4.39566 6.4805 3.58048 7.08154 2.97944C7.68257 2.37841 8.49775 2.04075 9.34774 2.04075ZM13.8346 5.88663V5.24565C13.8346 4.05566 13.3619 2.91441 12.5204 2.07296C11.679 1.23151 10.5377 0.758789 9.34774 0.758789C8.15776 0.758789 7.01651 1.23151 6.17506 2.07296C5.33361 2.91441 4.86088 4.05566 4.86088 5.24565V5.88663H0.374023V18.7062C0.374023 19.3862 0.64415 20.0384 1.12498 20.5192C1.60581 21 2.25795 21.2702 2.93794 21.2702H15.7575C16.4375 21.2702 17.0897 21 17.5705 20.5192C18.0513 20.0384 18.3215 19.3862 18.3215 18.7062V5.88663H13.8346ZM1.65598 7.16859H17.0395V18.7062C17.0395 19.0462 16.9044 19.3723 16.664 19.6127C16.4236 19.8531 16.0975 19.9882 15.7575 19.9882H2.93794C2.59795 19.9882 2.27188 19.8531 2.03146 19.6127C1.79105 19.3723 1.65598 19.0462 1.65598 18.7062V7.16859Z"
                        fill="white" />
                    </svg></div>
                  <span
                    class="quantity d-inline-flex align-items-center justify-content-center rounded-circle text-dark position-absolute">
                    <?php echo $items_count ? $items_count : '0'; ?>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-6">
              <div class="header-mobile__logo">
                <a class="d-block" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <img src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo.png" alt="Logo">
                </a>
              </div>
            </div>
            <div class="col-3">
              <div class="header-mobile__hamburger d-flex justify-content-end">
                <a id="hamburger-nav" class="d-inline-block text-center text-white" href="javascript:;"><i
                    class="fal fa-bars"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="hamburger-menu" class="header-mbnavbar position-fixed w-100 d-block d-lg-none">
        <div class="container d-flex flex-column h-100">
          <form
            class="header-mbnavbar__form d-flex justify-content-center align-items-center mb-5 w-100 position-relative"
            action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" accept-charset="utf-8">
            <input class="border border-white w-100" type="text" id="s" name="s"
              value="<?php echo get_search_query(); ?>" placeholder="Nhập gì đó để tìm kiếm...">
            <button class="position-absolute border border-white bg-white" type="submit"><i
                class="fal fa-search"></i></button>
          </form>
          <?php
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'div',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'header-mbnavbar__main d-flex flex-column align-items-center justify-content-center list-unstyled mb-0',
						'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
						'walker'          => new wp_bootstrap_navwalker(),
					) );
					?>
          <div
            class="header-mbnavbar__footer pt-3 border-top border-white d-flex justify-content-between align-items-center">
            <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>"
              class="header-mbnavbar__footer--account d-flex align-items-center text-white">
              <div class="icon-box me-2"><svg width="24" height="26" viewBox="0 0 24 26" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.6668 11.6666C10.2523 11.6666 8.89577 11.1047 7.89558 10.1045C6.89539 9.10431 6.3335 7.74777 6.3335 6.33329C6.3335 4.91882 6.89539 3.56227 7.89558 2.56209C8.89577 1.5619 10.2523 1 11.6668 1C13.0813 1 14.4378 1.5619 15.438 2.56209C16.4382 3.56227 17.0001 4.91882 17.0001 6.33329C17.0001 7.74777 16.4382 9.10431 15.438 10.1045C14.4378 11.1047 13.0813 11.6666 11.6668 11.6666Z"
                    stroke="white" stroke-width="2" stroke-linecap="round" />
                  <path
                    d="M1 25.0003V23.6669C1 21.5452 1.84285 19.5104 3.34313 18.0101C4.84341 16.5098 6.87822 15.667 8.99994 15.667H14.3332C16.4549 15.667 18.4898 16.5098 19.99 18.0101C21.4903 19.5104 22.3332 21.5452 22.3332 23.6669V25.0003"
                    stroke="white" stroke-width="2" stroke-linecap="round" />
                </svg></div>
              <?php if ( is_user_logged_in() ) { ?>
              Tài khoản
              <?php } else { ?>
              Đăng nhập
              <?php } ?>
            </a>
            <ul class="header-mbnavbar__footer--social d-flex justify-content-end list-unstyled mb-0">
              <li class="me-3">
                <a href="#">
                  <div class="icon-box"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 10.0558C0 15.0275 3.61083 19.1617 8.33333 20V12.7775H5.83333V10H8.33333V7.7775C8.33333 5.2775 9.94417 3.88917 12.2225 3.88917C12.9442 3.88917 13.7225 4 14.4442 4.11083V6.66667H13.1667C11.9442 6.66667 11.6667 7.2775 11.6667 8.05583V10H14.3333L13.8892 12.7775H11.6667V20C16.3892 19.1617 20 15.0283 20 10.0558C20 4.525 15.5 0 10 0C4.5 0 0 4.525 0 10.0558Z"
                        fill="white" />
                    </svg></div>
                </a>
              </li>
              <li class="me-3">
                <a href="#">
                  <div class="icon-box"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M19.9356 5.90309C19.9244 5.06334 19.7669 4.23193 19.4702 3.44606C19.213 2.78318 18.82 2.18117 18.3165 1.67849C17.813 1.17581 17.21 0.783514 16.546 0.526666C15.7689 0.235455 14.948 0.0779923 14.1182 0.0609825C13.0498 0.0133053 12.711 0 9.99889 0C7.28676 0 6.93914 7.43489e-08 5.8785 0.0609825C5.04904 0.0781174 4.22851 0.235578 3.4518 0.526666C2.78771 0.783335 2.18461 1.17557 1.68107 1.67827C1.17753 2.18097 0.784639 2.78308 0.527543 3.44606C0.235263 4.22124 0.07788 5.04059 0.0621946 5.86872C0.014438 6.93647 0 7.27464 0 9.98226C0 12.6899 -8.27475e-09 13.0358 0.0621946 14.0958C0.0788538 14.9252 0.235451 15.7434 0.527543 16.5207C0.785071 17.1835 1.17825 17.7853 1.68196 18.2878C2.18567 18.7903 2.78883 19.1824 3.45291 19.439C4.22749 19.7419 5.04817 19.9106 5.87961 19.9379C6.94913 19.9856 7.28787 20 10 20C12.7121 20 13.0598 20 14.1204 19.9379C14.9502 19.9216 15.7712 19.7645 16.5482 19.4733C17.212 19.2162 17.8149 18.8238 18.3183 18.3211C18.8218 17.8185 19.2149 17.2166 19.4725 16.5539C19.7646 15.7778 19.9211 14.9595 19.9378 14.1291C19.9856 13.0624 20 12.7243 20 10.0155C19.9978 7.30791 19.9978 6.96419 19.9356 5.90309V5.90309ZM9.99223 15.1026C7.15571 15.1026 4.85784 12.8085 4.85784 9.97672C4.85784 7.14492 7.15571 4.85087 9.99223 4.85087C11.354 4.85087 12.6599 5.39091 13.6228 6.3522C14.5857 7.31348 15.1266 8.61726 15.1266 9.97672C15.1266 11.3362 14.5857 12.64 13.6228 13.6012C12.6599 14.5625 11.354 15.1026 9.99223 15.1026V15.1026ZM15.331 5.85653C15.1737 5.85667 15.0179 5.82586 14.8726 5.76584C14.7273 5.70582 14.5953 5.61779 14.4841 5.50677C14.3729 5.39575 14.2847 5.26393 14.2246 5.11885C14.1644 4.97377 14.1336 4.81828 14.1337 4.66127C14.1337 4.50438 14.1647 4.34903 14.2248 4.20408C14.285 4.05913 14.3731 3.92743 14.4842 3.81649C14.5953 3.70555 14.7273 3.61755 14.8725 3.55751C15.0176 3.49747 15.1733 3.46657 15.3304 3.46657C15.4876 3.46657 15.6432 3.49747 15.7884 3.55751C15.9336 3.61755 16.0655 3.70555 16.1766 3.81649C16.2877 3.92743 16.3759 4.05913 16.436 4.20408C16.4961 4.34903 16.5271 4.50438 16.5271 4.66127C16.5271 5.3221 15.9918 5.85653 15.331 5.85653Z"
                        fill="white" />
                      <path
                        d="M10 13.3334C11.8409 13.3334 13.3333 11.841 13.3333 10C13.3333 8.15907 11.8409 6.66669 10 6.66669C8.15905 6.66669 6.66666 8.15907 6.66666 10C6.66666 11.841 8.15905 13.3334 10 13.3334Z"
                        fill="white" />
                    </svg></div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="icon-box"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M11.6698 9.82604L9.33021 8.73437C9.12604 8.63958 8.95833 8.74583 8.95833 8.97187V11.0281C8.95833 11.2542 9.12604 11.3604 9.33021 11.2656L11.6687 10.174C11.874 10.0781 11.874 9.92188 11.6698 9.82604ZM10 0C4.47708 0 0 4.47708 0 10C0 15.5229 4.47708 20 10 20C15.5229 20 20 15.5229 20 10C20 4.47708 15.5229 0 10 0ZM10 14.0625C4.88125 14.0625 4.79167 13.601 4.79167 10C4.79167 6.39896 4.88125 5.9375 10 5.9375C15.1187 5.9375 15.2083 6.39896 15.2083 10C15.2083 13.601 15.1187 14.0625 10 14.0625Z"
                        fill="white" />
                    </svg></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>