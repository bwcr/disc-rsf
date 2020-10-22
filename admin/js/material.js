(function($) {
  "use strict";
  $(function() {

    $("[data-toggle='expansionPanel']").on("click", function() {
      $("#" + $(this).attr("target-panel")).toggleClass("expanded");
    });

    /* Dropdown */
    $("[data-toggle='dropdown']").on("click", function() {
      var menuEl = document.querySelector("#" + $(this).attr("toggle-dropdown"));
      var menu = new mdc.menu.MDCSimpleMenu(menuEl);
      menu.open = !menu.open;
    });

    mdc.autoInit();

    /* Select menu */
    });
})(jQuery);