var $j = jQuery.noConflict();


var hr = $j(".comment-form-separator");
var replyLink = $j(".comment-reply-link");
var cancelLink = $j("#cancel-comment-reply-link")

/* Remove comment form separator (<hr>) when comment reply is clicked */
replyLink.on('click', function() {
    hr.addClass("hide-separator");
  });

/* Add comment form separator (<hr>) when cancel reply is clicked */
cancelLink.on('click', function() {
  hr.removeClass("hide-separator");
});

/* Modal Menu for Mobile Navigation */

class MobileMenu {
  constructor() {
    this.menu = $j(".menu-modal");
    this.openButton = $j(".site-header-menu-trigger");
    this.events();
  }

  events() {
    this.openButton.on("click", this.openMenu.bind(this));
  }

  openMenu() {
    this.openButton.toggleClass("fa-bars fa-window-close");
    this.menu.toggleClass("site-header-menu-active");
  }
}

var mobileMenu = new MobileMenu();
