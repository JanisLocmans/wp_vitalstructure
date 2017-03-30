(function() {
  "use strict";
  vital_toggle_class('.archive_year_wrapper');
  vital_toggle_class('.c-hamburger--htla', '.main-menu-wrapper');
  function vital_toggle_class(_el_selector, _el_opt_class) {

  var el_selector = document.querySelectorAll(_el_selector);
  var el_opt_class = document.querySelectorAll(_el_opt_class);

    for (var i = el_selector.length - 1; i >= 0; i--){
        var toggle = el_selector[i];
        toggleHandler(toggle);
    };

    function toggleHandler(toggle) {

        toggle.addEventListener( 'click', function(e) {
          (this.classList.contains('is-active') === true) ? this.classList.remove('is-active') : this.classList.add('is-active');
          
          for (var i = el_opt_class.length - 1; i >=0; i--) {

              (el_opt_class[i].classList.contains('is-active') === true) ? el_opt_class[i].classList.remove('is-active') : el_opt_class[i].classList.add('is-active');
          };
        });
    }
  }
})();

