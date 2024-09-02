ScrollReveal({
  mobile: false,
}
)

ScrollReveal().reveal('.header', {
  delay: 500,
  reset: false,
  mobile: false,
});

ScrollReveal().reveal('.showcase-content h1', {
  scale: 2,
  duration: 3000,
  mobile: false,
});

ScrollReveal().reveal('.showcase-content', {

  scale: 2,
  duration: 3000,
  delay: 500,
  mobile: false,
});

ScrollReveal().reveal('.showcase-search', {
  duration: 1500,
  delay: 500,
});

ScrollReveal().reveal('.destinations h2', {
  reset: true,
  duration: 1500,
  delay: 500,
  origin: 'left',
  distance: '50px',
});

ScrollReveal().reveal('.destinations-cards', {
  duration: 1500,
});

ScrollReveal().reveal('.section-title', {
  reset: true,
  duration: 1500,
  delay: 500,
  origin: 'left',
  distance: '50px',
});
ScrollReveal().reveal('.hotel-card , #tours, #activities', {
  duration: 1500,
  origin: 'left',
  distance: '50px',
});

ScrollReveal().reveal('.about-content', {
  reset: true,
  duration: 1500,
  origin: 'left',
  distance: '50px',
});
ScrollReveal().reveal('.about-img', {
  reset: true,
  duration: 1500,
  origin: 'right',
  distance: '50px',
});

const swiper = new Swiper('.swiper1', {
  direction: 'horizontal',
  loop: true,
  speed: 600,
  slidesPerView: 6,
  spaceBetween: 10,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    240: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 10,
    },
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

//ladakh
function ladakh(){
  window.open('ladakh-loader.html');
}

function manali(){
  window.open('holiday/places/manali-loader.html');
}

function shimla(){
  window.open('holiday/places/shimla-loader.html');
}
function darjeeling(){
  window.open('holiday/places/darjeeling-loader.html');
}
function lakshwadeep(){
  window.open('holiday/places/lakshwadeep-loader.html');
}

function jaipur(){
  window.open('holiday/places/jaipur-loader.html');
}

function search(){
  window.open('search-loader.html');
}

// function login(){
//   window.open('testing/login-loader.html');
// }

// function register(){
//   window.open('testing/register-loader.html')
// }
// hotel rxpand collapse fun
const hotelButton = document.querySelector('.hotel-button');
const hotelCard = document.querySelectorAll('.off');
const text = hotelButton.innerText;

hotelButton.addEventListener('click', (e) => {
  e.preventDefault();
  hotelCard.forEach((x) => {
    x.classList.toggle('on');
  });

  if (e.target.innerHTML !== 'less <img src="/Imgs/icons/bleft.png">') {
    e.target.innerHTML = `less <img src="/Imgs/icons/bleft.png" >`;
  } else {
    e.target.innerHTML = `view all <img src="/Imgs/icons/bleft.png" >`;
  }
});



// 
const toogleOn = document.querySelector('.toggleOn');
const toogleClose = document.querySelector('.toggleClose');
const navbar = document.querySelector('.navbar');
const navlists = document.querySelectorAll('.navlist');

toogleOn.addEventListener('click', (e) => {
  e.preventDefault();
  navbar.classList.add('navlistOn');
  toogleClose.classList.add('toggleCloseOn');
  toogleOn.classList.add('toggleOnClose');
});

toogleClose.addEventListener('click', (e) => {
  navbar.classList.remove('navlistOn');
  toogleClose.classList.remove('toggleCloseOn');
  toogleOn.classList.remove('toggleOnClose');
});

console.log('navlists');
navlists.forEach((xy) => {
  xy.addEventListener('click', (x) => {
    navbar.classList.remove('navlistOn');
    toogleClose.classList.remove('toggleCloseOn');
    toogleOn.classList.remove('toggleOnClose');
  });
});

// JavaScript for Showcase Search

// Function to perform the search based on user inputs
function performSearch() {
  // Get the values from the search box, date input, and location dropdown
  const searchBoxValue = document.getElementById('searchBox').value;
  const dateInputValue = document.getElementById('dateInput').value;
  const locationDropdownValue = document.getElementById('locationDropdown').value;

  // Log the values (you can replace this with your actual search functionality)
  console.log('Search Box:', searchBoxValue);
  console.log('Date Input:', dateInputValue);
  console.log('Location:', locationDropdownValue);
}

// Event listener for the Enter key in the search box
document.getElementById('searchBox').addEventListener('keydown', function (event) {
  if (event.key === 'Enter') {
    performSearch();
  }
});


document.getElementById("profile-pic").addEventListener("click", function() {
  var dropdown = document.getElementById("dropdown-menu");
  if (dropdown.style.display === "block") {
      dropdown.style.display = "none";
  } else {
      dropdown.style.display = "block";
  }
});



window.onclick = function(event) {
  if (!event.target.closest('.profile-pic')) {
      var dropdown = document.getElementById("dropdown-menu");
      if (dropdown.style.display === "block") {
          dropdown.style.display = "none";
      }
  }
}


//log out

function toggleLogout() {
  var menu = document.getElementById("logoutMenu");
  if (menu.style.display === "none" || menu.style.display === "") {
    menu.style.display = "block";
  } else {
    menu.style.display = "none";
  }
}
x

window.onclick = function(event) {
  if (!event.target.matches('.profile-pic img')) {
    const logoutMenu = document.getElementById('logoutMenu');
    if (logoutMenu.style.display === 'block') {
      logoutMenu.style.display = 'none';
    }
  }
}
