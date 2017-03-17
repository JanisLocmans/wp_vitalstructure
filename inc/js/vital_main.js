(function() {
  "use strict";
  toggleHandler(document.getElementById('js_menu_button'));

  function toggleHandler(toggle) {

	var menu_e = document.getElementById('primary-menu');
	console.log(menu_e);

    toggle.addEventListener( "click", function(e) {
    	console.log(this);
      e.preventDefault();
      (this.classList.contains('is-active') === true) ? this.classList.remove('is-active') : this.classList.add('is-active');
      (menu_e.classList.contains('menu-is-active') === true) ? 
      menu_e.classList.remove('menu-is-active') : 
      menu_e.classList.add('menu-is-active');
    });
  }

})();