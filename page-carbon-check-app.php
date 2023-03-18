<?php
get_header();

if (!is_user_logged_in()) :
?>
  <style>
    body #footer.fixed {
      position: relative !important;
    }
  </style>
  <div class="mt-16 mb-32 min-h-100vh">
    <div class="mb-4 text-center rounded-lg bg-slate-100 py-5 px-6 text-base text-slate-800" role="alert">
      <i class="fas fa-info-circle mr-2"></i>請先登入
    </div>
    <div class="px-8">
      <?= do_shortcode('[ultimatemember form_id="421"]'); ?>
    </div>
  </div>
<?php else : ?>
  <div style="padding:2rem;">
    <div id="carbon-check-app"></div>
  </div>
<?php endif; ?>

<?php
get_footer();
