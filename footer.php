<?php if (is_active_sidebar("prefooter")): ?>
  <div class="prefooter bg-light py-4">
    <div class="container">
      <?php dynamic_sidebar("prefooter"); ?>
    </div>
  </div>
<?php endif; ?>

<footer class="footer-widgets py-5">
  <div class="container">
    <div class="row">
      <?php for ($i = 1; $i <= 4; $i++): ?>
        <div class="col-md-3">
          <?php if (is_active_sidebar("footer-$i")): ?>
            <?php dynamic_sidebar("footer-$i"); ?>
          <?php endif; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</footer>

<div class="footer-bottom bg-main text-white py-4">
  <div class="container text-center">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
  </div>
</div>

<?php wp_footer(); ?>
</body>

</html>