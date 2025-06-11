


<?php if (is_active_sidebar("prefooter")) : ?>
    <div class="prefooter bg-light py-4">
        <div class="container">
            <?php dynamic_sidebar("prefooter"); ?>
        </div>
    </div>
<?php endif; ?>

<footer class="footer-widgets container py-5">
    <div class="row">
        <?php for ($i = 1; $i <= 4; $i++) : ?>
            <div class="col-md-3">
                <?php if (is_active_sidebar("footer-$i")) : ?>
                    <?php dynamic_sidebar("footer-$i"); ?>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</footer>

<div class="bg-dark footer-bottom text-white py-4">
    <div class="container text-center">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const dropdowns = document.querySelectorAll(".menu-item-has-children");

  dropdowns.forEach((el) => {
    el.classList.add("nav-item", "dropdown");
    const link = el.querySelector("a");
    link.classList.add("nav-link", "dropdown-toggle");
    link.setAttribute("data-bs-toggle", "dropdown");
    link.setAttribute("aria-expanded", "false");

    const submenu = el.querySelector("ul");
    if (submenu) {
      submenu.classList.add("dropdown-menu");
      submenu.querySelectorAll("a").forEach(a => a.classList.add("dropdown-item"));
    }
  });

  // Add nav-link class to normal menu items
  document.querySelectorAll(".menu-item:not(.menu-item-has-children) > a").forEach(link => {
    link.classList.add("nav-link");
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>