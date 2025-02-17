
function openSearch() {
    document.getElementById("searchOverlay").style.display = "block";
}

function closeSearch() {
    document.getElementById("searchOverlay").style.display = "none";
}

function searchBtn() {
    let search_item = document.querySelector('.search-item .fa-solid');
    search_item.addEventListener('click', function(e){
        e.preventDefault();
        openSearch()
    });

    let close_search_item = document.querySelector('#searchOverlay .closebtn ');
    close_search_item.addEventListener('click', function(e) {
        e.preventDefault();
        closeSearch()
    });

}
searchBtn();


const openMenu = document.querySelector('.toggle-menu .fa-bars');
const closeMenu = document.querySelector('.toggle-menu .fa-xmark');
const secNav = document.querySelector('.secondary-nav');

function openNav() {
    openMenu.addEventListener('click', function(){
        this.parentNode.classList.toggle("hide-item");
        secNav.style.display = "block";
    });
}

function closeNav() {
    closeMenu.addEventListener('click', function(){
        this.parentNode.classList.remove("hide-item");
        secNav.style.display = "none";
    });
}

openNav();
closeNav();

const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    
  
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
        slideChangeTransitionStart: function () {
            // Slide captions
            var swiper = this;
            var slideTitle = $(swiper.slides[swiper.activeIndex]).attr("data-title");
            var slideSecTitle = $(swiper.slides[swiper.activeIndex]).attr("data-second-title");
            var slideSubtitle = $(swiper.slides[swiper.activeIndex]).attr("data-subtitle");
            $(".slide-captions").html(function() {
                return "<h2 class='current-title'>" + slideTitle +   "<span>" + slideSecTitle +"</span>" + "</h2>" + "<h4 class='current-subtitle'>" + slideSubtitle + "</h4>";
            });
        }
        }
    });

    // Slide captions on load
        var sizes1 = $(swiper.slides[swiper.activeIndex]).attr("data-title");
        var sizes1_2 = $(swiper.slides[swiper.activeIndex]).attr("data-second-title");
        var sizes2 = $(swiper.slides[swiper.activeIndex]).attr("data-subtitle");
        $(".slide-captions").html(function() {
        return "<h2 class='current-title'>" + sizes1 +  "<span>" + sizes1_2 +"</span>" + "</h2>" + "<h3 class='current-subtitle'>" + sizes2 + "</h3>";
    });

    
    jQuery(document).ready(function(){
        $('.slider1').bxSlider({
          slideWidth: 400,
          minSlides: 1,
          maxSlides: 3,
          slideMargin: 35
        });
      });
  

    