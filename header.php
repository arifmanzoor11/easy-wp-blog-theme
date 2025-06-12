<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <style> 
/* Base dropdown menu styling */
.dropdown-menu {
    background-color: #343a40; /* dark background */
    border: none;
    padding: 0.5rem 0;
    border-radius: 0.25rem;
    min-width: 10rem;
  }
  
  /* Dropdown items */
  .dropdown-menu .dropdown-item {
    color: #fff;
    padding: 0.5rem 1rem;
    transition: background-color 0.2s ease;
  }
  
  /* Hover effect */
  .dropdown-menu .dropdown-item:hover,
  .dropdown-menu .dropdown-item:focus {
    background-color: #495057;
    color: #fff;
  }
  
  
  /* Show dropdown when open via Bootstrap JS */
  .navbar-nav .dropdown.show .dropdown-menu {
    display: block;
  }
  
  /* Optional: Better mobile dropdown spacing */
  @media (max-width: 991.98px) {
    .dropdown-menu {
      position: static;
      float: none;
      width: 100%;
      margin-top: 0;
    }
  
    .dropdown-menu .dropdown-item {
      padding-left: 2rem;
    }
  }

  </style>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <!-- Header Top -->
    <div style="background:#000" class="py-2">
    <div class="container d-flex justify-content-between align-items-center">
      <!-- Left: Contact Info -->
      <div class="d-flex align-items-center gap-3">
       <small>
       <span class="text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open-fill" viewBox="0 0 16 16">
        <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.314l6.709 3.932L8 8.928l1.291.718L16 5.714V5.4a2 2 0 0 0-1.059-1.765zM16 6.873l-5.693 3.337L16 13.372v-6.5Zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516M0 13.373l5.693-3.163L0 6.873z"/>
      </svg>
          <a href="mailto:support@guitarchordslyrics.com" class="text-decoration-none text-light">support@guitarchordslyrics.com</a>
        </span>
       </small>
        <!-- <span class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
            <path d="M1 2.05a.5.5 0 0 1 .5-.5h2.08a.5.5 0 0 1 .48.36l.7 2.8a.5.5 0 0 1-.12.48l-1.2 1.2a11.2 11.2 0 0 0 5.2 5.2l1.2-1.2a.5.5 0 0 1 .48-.12l2.8.7a.5.5 0 0 1 .36.48v2.08a.5.5 0 0 1-.5.5H13c-6.627 0-12-5.373-12-12V2.05z"/>
          </svg>
          <a href="tel:+1234567890" class="text-decoration-none text-light">+1 234 567 890</a>
        </span> -->
      </div>

      <!-- Right: Social Media -->
      <div class="d-flex gap-3">
        <a href="https://www.facebook.com/GuitarChordslyrics1/" target="_blank" class="text-light" title="Facebook">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M8.94 6.38H7.5V5.3c0-.41.19-.79.8-.79h.6V3.12S8.3 3 7.94 3c-1.2 0-1.94.74-1.94 2.06v1.32H4.5V8.5h1.5V13h1.94V8.5h1.5l.25-2.12z"/>
          </svg>
        </a>
        <a href="https://x.com/guitarchordsly1" target="_blank" class="text-light" title="Twitter">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14-.003-.282-.01-.422A6.68 6.68 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518A3.301 3.301 0 0 0 15.555 2.4a6.574 6.574 0 0 1-2.084.797 3.286 3.286 0 0 0-5.595 2.994A9.325 9.325 0 0 1 1.114 2.1a3.286 3.286 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.104v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115c-.211 0-.417-.02-.616-.058a3.286 3.286 0 0 0 3.067 2.278 6.588 6.588 0 0 1-4.862 1.364A9.29 9.29 0 0 0 5.026 15z"/>
          </svg>
        </a>
        <a href="https://www.instagram.com/guitarchordslyrics/" target="_blank" class="text-light" title="Instagram">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.74 0 5.48.01 4.63.05 3.78.09 3.2.22 2.7.44a4.6 4.6 0 0 0-1.67 1.1A4.6 4.6 0 0 0 .44 3.2c-.22.5-.35 1.08-.39 1.93C.01 5.78 0 6.04 0 8s.01 2.22.05 3.07c.04.85.17 1.43.39 1.93.21.49.51.94.9 1.33.39.39.84.69 1.33.9.5.22 1.08.35 1.93.39.85.04 1.11.05 3.07.05s2.22-.01 3.07-.05c.85-.04 1.43-.17 1.93-.39a4.6 4.6 0 0 0 1.33-.9 4.6 4.6 0 0 0 .9-1.33c.22-.5.35-1.08.39-1.93.04-.85.05-1.11.05-3.07s-.01-2.22-.05-3.07c-.04-.85-.17-1.43-.39-1.93a4.6 4.6 0 0 0-.9-1.33 4.6 4.6 0 0 0-1.33-.9c-.5-.22-1.08-.35-1.93-.39C10.22.01 9.96 0 8 0zm0 1.45c2.12 0 2.37.01 3.21.05.73.03 1.13.16 1.39.26.35.14.6.3.86.56.26.26.42.51.56.86.1.26.23.66.26 1.39.04.84.05 1.09.05 3.21s-.01 2.37-.05 3.21c-.03.73-.16 1.13-.26 1.39a2.9 2.9 0 0 1-.56.86 2.9 2.9 0 0 1-.86.56c-.26.1-.66.23-1.39.26-.84.04-1.09.05-3.21.05s-2.37-.01-3.21-.05c-.73-.03-1.13-.16-1.39-.26a2.9 2.9 0 0 1-.86-.56 2.9 2.9 0 0 1-.56-.86c-.1-.26-.23-.66-.26-1.39C1.46 10.37 1.45 10.12 1.45 8s.01-2.37.05-3.21c.03-.73.16-1.13.26-1.39.14-.35.3-.6.56-.86.26-.26.51-.42.86-.56.26-.1.66-.23 1.39-.26.84-.04 1.09-.05 3.21-.05zM8 3.88a4.12 4.12 0 1 0 0 8.24 4.12 4.12 0 0 0 0-8.24zm0 6.79a2.67 2.67 0 1 1 0-5.34 2.67 2.67 0 0 1 0 5.34zm4.16-6.96a.96.96 0 1 1-1.92 0 .96.96 0 0 1 1.92 0z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-main">
    <div class="container">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <svg width="40" height="40" viewBox="0 0 64 64" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path d="M31.91,2.25c-7.33,0-13.29,5.84-13.29,13.05c0,9.77,9.92,12.47,9.92,23.74c0,3.48-1.68,5.87-4.12,5.87
        c-2.2,0-3.94-1.93-3.94-4.21c0-1.92,1.03-3.49,2.33-3.49c0.5,0,0.98,0.13,1.36,0.35c0.04,0.02,0.09,0.03,0.13,0.03
        c0.2,0,0.4-0.12,0.49-0.31c0.12-0.28,0-0.61-0.28-0.74c-0.7-0.33-1.45-0.49-2.2-0.49c-3.07,0-5.49,2.93-5.49,6.52
        c0,3.52,2.62,6.51,6.05,6.51c3.42,0,6.27-3.18,6.27-7.36c0-10.57-9.92-13.11-9.92-23.52c0-5.16,4.22-9.36,9.4-9.36
        c5.35,0,9.31,4.05,9.31,9.52c0,2.82-1.15,5.34-3.08,7.12c-0.31,0.29-0.33,0.77-0.05,1.07c0.29,0.31,0.77,0.33,1.07,0.05
        c2.41-2.23,3.82-5.46,3.82-9.12C45.22,7.93,39.64,2.25,31.91,2.25z M31.5,50.4c-2.55,0-4.62,2.07-4.62,4.62
        c0,2.55,2.07,4.62,4.62,4.62c2.55,0,4.62-2.07,4.62-4.62C36.12,52.47,34.05,50.4,31.5,50.4z"/>
    </svg>
  
      <?php bloginfo('name'); ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <?php
        wp_nav_menu([
          'theme_location' => 'main-menu',
          'container'      => false,
          'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
          'fallback_cb'    => '__return_false',
          'walker'         => new WP_Bootstrap_Navwalker(),
        ]);
        ?>
      </div>
    </div>
  </nav>
</header>




