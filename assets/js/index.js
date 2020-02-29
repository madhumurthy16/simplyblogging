/* Modal Menu for Mobile Navigation */

var $j = jQuery.noConflict();

class MobileMenu {
  constructor() {
    this.menu = $j(".site-header__menu");
    this.openButton = $j(".site-header__menu-trigger");
    this.events();
  }

  events() {
    this.openButton.on("click", this.openMenu.bind(this));
  }

  openMenu() {
    this.openButton.toggleClass("fa-bars fa-window-close");
    this.menu.toggleClass("site-header__menu--active");
  }
}

var mobileMenu = new MobileMenu();
