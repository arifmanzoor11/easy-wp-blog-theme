<?php get_header(); ?>

<style>
    .custom-404 {
        text-align: center;
        padding: 30px 20px;
        color: #333;
        font-family: 'Segoe UI', sans-serif;
    }
    .custom-404 h1 {
        font-size: 100px;
        margin: 0;
        color: #e74c3c;
    }
    .custom-404 h2 {
        font-size: 28px;
        margin-bottom: 20px;
    }
    .custom-404 p {
        font-size: 18px;
        margin-bottom: 30px;
    }
    .custom-404 a.button {
        display: inline-block;
        padding: 12px 24px;
        background: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        transition: background 0.3s ease;
    }
    .custom-404 a.button:hover {
        background: #2980b9;
    }
    .custom-404 img {
        max-width: 300px;
        margin-bottom: 0px;
    }
</style>

<div class="custom-404">
    <img src="<?php echo get_template_directory_uri(); ?>/images/404.svg" alt="404 Image" />
    <h1>404</h1>
    <h2>Oops! Page Not Found</h2>
    <p>The page you're looking for doesn't exist or has been moved.</p>
    <a class="btn btn-main btn-sm" href="<?php echo home_url(); ?>">Go to Homepage</a>
</div>

<?php get_footer(); ?>
