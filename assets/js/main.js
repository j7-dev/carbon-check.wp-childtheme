(function ($) {
  $(document).ready(function () {
    $("#menu-dropdown").click(function () {
      $(".dropdown-items").slideToggle();
    });

    // 調整最小高度

    const pageH = $(".min-h-100vh").height();
    const windowH = $(window).height();
    const headerH = $("body > .elementor-location-header").height();
    const footerH = $("body > .elementor-location-footer").height();
    if (pageH + headerH + footerH < windowH) {
      const diff = windowH - pageH - headerH - footerH;
      $(".min-h-100vh").css("min-height", pageH + diff);
    }
  });
})(jQuery);
