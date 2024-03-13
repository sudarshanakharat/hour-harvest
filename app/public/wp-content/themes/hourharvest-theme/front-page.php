<?php get_header(); ?>

  <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/hour-harvest.jpg') ?>);"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome to Hour Harvest!</h1>
        <h2 class="headline headline--medium">Manage your workday with ease.</h2>
        <h3 class="headline headline--small"> <strong>Discover </strong>  how it works!</h3>
      </div>
    </div>

<div class="container container--narrow page-section">
  <!-- Features -->
    <div class="wp-block-group alignwide">
        <div class="wp-block-column">
            <h3 class="wp-block-heading has-small-font-size" style="color: blue;">Innovative</h3>
            <h2 class="wp-block-heading has-large-font-size">Features</h2>
            </div>        
    </div>

    <div class="wp-block-group alignwide">
    <div class="wp-block-columns justify-center">
        <!-- Box 1 -->
        <div class="wp-block-column box">
            <img src="<?php echo esc_url( get_theme_file_uri( '/images/filters-icon.svg' ) ); ?>" alt="Image 2">
            <h2 class="wp-block-heading has-medium-font-size">Easy To Add Company and Employees</h2>
            <p class="center-align">Hour Harvest offers Simplified time tracking solution for your entire team.</p>
        </div>
        <!-- Box 2 -->
        <div class="wp-block-column box">
            <img src="<?php echo esc_url( get_theme_file_uri( '/images/bulb-lighting-icon.svg' ) ); ?>" alt="Image 3">
            <h2 class="wp-block-heading has-medium-font-size">Time Tracking</h2>
            <p class="center-align">Track your hours effortlessly. Focus on what matters most and get paid accurately.</p>
        </div>
        <!-- Box 3 -->
        <div class="wp-block-column box">
            <img src="<?php echo esc_url( get_theme_file_uri( '/images/color-adjust-icon.svg' ) ); ?>" alt="Image 3">
            <h2 class="wp-block-heading has-medium-font-size">Generate Reports Easily</h2>
            <p class="center-align">Gain valuable insights into your team’s productivity. Drive smarter business decisions.</p>
        </div>
    </div>
</div>
    
</div>

<style>
    .alignfull {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .wp-block-group.alignwide {
        width: 100%;
    }

    .box {
        width: calc(33.33% - 20px); /* Adjust width based on desired spacing */
        margin: 0 10px; /* Add spacing between boxes */
        padding: 20px;
        height: 350px; /* Set the desired height */
        background-color: #f4f4f4;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        animation: highlightBox 3s infinite; /* Add animation */
    }

    /* Hover effect */
    .box:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Image styling */
    .box img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        display: block;
        margin: 0 auto;
    }

    /* Heading styling */
    .wp-block-heading.has-medium-font-size {
        font-size: 1.5rem; /* Adjust size as needed */
    }

    /* Text alignment */
    .center-align {
        text-align: center;
    }

    /* Keyframe animation for highlighting boxes */
@keyframes highlightBox {
    0%, 100% { background-color: #f4f4f4; } /* Initial and final state */
    50% { background-color: #c5e1a5; } /* Highlighted state */
}


    /* Media query for smaller screens */
@media only screen and (max-width: 768px) {
    .box {
        width: 100%; /* Make boxes occupy full width on smaller screens */
    }
}
</style>


    

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/company.png') ?>);">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Company</h2>
                <p class="t-center">Hour Harvest offers Simplified time tracking solution for your entire team.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/employee.png') ?>);">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Employee</h2>
                <p class="t-center">Track your hours effortlessly. Focus on what matters most and get paid accurately.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/report.png') ?>);">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Reports</h2>
                <p class="t-center">Gain valuable insights into your team's productivity. Drive smarter business decisions.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>

    
    <?php get_footer();
?>