// JavaScript/jQuery
(function ($) {
  $(document).ready(function () {
    $(".menu-toggle").click(function () {
      $(this).toggleClass("active");
      $(".menu-header-menu-container").slideToggle(function () {
        if ($(this).is(":visible")) {
          $(".hamburger-icon").hide();
          $(".close-icon").show();
        } else {
          $(".hamburger-icon").show();
          $(".close-icon").hide();
        }
      });
    });
  });
})(jQuery);
