
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
    openMenu.addEventListener('click', function(e){
        this.parentNode.classList.toggle("hide-item");
        secNav.style.display = "block";
        e.stopPropagation();
    });
}

function closeNav() {
    closeMenu.addEventListener('click', function(e){
        this.parentNode.classList.remove("hide-item");
        secNav.style.display = "none";
        e.stopPropagation();
    });
}  

openNav();
closeNav(); 

function secondaryNav() {
  const secNavParentItems = document.querySelectorAll('.secondary-nav .menu .menu-item-has-children');

    secNavParentItems.forEach(item => {
      
        let arrow = document.createElement("i");
        arrow.classList.add("fa-solid", "fa-chevron-right", "arrow");
        item.appendChild(arrow);

        item.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event from bubbling to anchor
            item.classList.toggle('active'); // Toggle open class for showing children
        });

        item.addEventListener('click', (e) => {
            const target = e.target;

            // Allow clicking actual child links inside the submenu
            if (target.tagName === 'A' && target.closest('.menu-item-has-children') === item) {
            return; // Let it proceed
            }

          


            // If clicked anywhere else on the parent item, toggle children
            item.classList.toggle('active');
        });
    });
}
 secondaryNav();


function checkedTermAccordian(){
    const bodyClass = document.body.classList;
    const accItems = document.querySelectorAll('.product-content .accordion');
    accItems.forEach((item, index) => {
        const inputs = item.querySelectorAll('input');
        
        inputs.forEach(input => {
            if (bodyClass.contains(input.id)) { 
                console.log(`Matched Input ID: ${input.id}`);
                input.checked = true;
            }
        });
    });
}

checkedTermAccordian();

  document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".mySwiper", {
        loop: true,  
        effect: "fade",
        autoplay: {
        delay: 3000, 
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var swiperServices = new Swiper(".servicesSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
      
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
            slidesPerView: 1,
            spaceBetween: 20,
            },
            768: {
            slidesPerView: 2,
            spaceBetween: 40,
            },
            1024: {
            slidesPerView: 3, 
            spaceBetween: 50,
        },
      }
    });
}); 


function selectedInput() {
   const labels = document.querySelectorAll('label.custom-label');

  labels.forEach(label => {
    const input = label.querySelector('input[type="checkbox"]');

    function updateState() {
      // Toggle .selected class on label
      label.classList.toggle('selected', input.checked);

      // Dynamically update the 'checked' attribute
      if (input.checked) {
        input.setAttribute('checked', 'checked');
      } else {
        input.removeAttribute('checked');
      }
    }

    input.addEventListener('change', updateState);

    // Set correct state on page load (for pre-checked boxes)
    updateState();
  });
}

 selectedInput();

function clearAllCheckedInputs() {
   const resetBtn = document.getElementById('ajax-filter-clear');
   const result =  document.querySelector('.products_filter__result');
    if (!resetBtn) return;

    resetBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const inputs = document.querySelectorAll('input[type="checkbox"]:checked');
        inputs.forEach(input => {
            input.checked = false;
            input.dispatchEvent(new Event('change', { bubbles: true }));
            result.style.display = "none"; // Hide the result section
        });
    });
}

clearAllCheckedInputs();