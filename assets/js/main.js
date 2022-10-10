(function() {
    setTimeout(function(){
      document.body.classList.add('loaded');
    },200)

    function setDocHeight() {
      document.documentElement.style.setProperty('--vh', `${window.innerHeight/100}px`);
      document.documentElement.style.setProperty('--vw', `${window.innerWidth/100}px`);
    };

    window.addEventListener('resize', function () {
      setDocHeight();
    });
    window.addEventListener('orientationchange', function () {
      setDocHeight();
    });

    setDocHeight();

})();

// menu 
var togglemenu = document.querySelector('#togglemenu');
var isMenuOpen = false;

togglemenu.addEventListener('click', function () {
    isMenuOpen = !isMenuOpen;    
    togglemenu.setAttribute('aria-expanded', isMenuOpen);
});



// var Flickity = require('flickity-hash');
const project = document.querySelector('.project');

if(project){

  var flkty = new Flickity( '.project', {
    cellSelector: '.slide',
    imagesLoaded: true,
    cellAlign: 'left',
    pageDots: false,
    // draggable: false,
    lazyLoad: 2,
    hash: true,
    watchCSS: true
  });

  // load all lazy load images 
  if ( !flkty.isActive ) {
    const slides = project.querySelectorAll('[data-flickity-lazyload-src]');
    for (let i = 0; i < slides.length; i++) {
      const element = slides[i];
      element.setAttribute( 'src', element.getAttribute('data-flickity-lazyload-src') );
      element.setAttribute( 'srcset', element.getAttribute('data-flickity-lazyload-srcset') );
      element.classList.add('flickity-lazyloaded');
      element.removeAttribute('data-flickity-lazyload-src'); 
      element.removeAttribute('data-flickity-lazyload-srcset'); 
    }
  }

  flkty.on('select', function(index){
    project.setAttribute('data-selected', index);
    
    if(index + 1 == flkty.cells.length) {
      project.setAttribute('data-selected-last', true);
    } else {
      project.removeAttribute('data-selected-last');
    }

    const old_btn = document.querySelector('#info');
    if(old_btn) old_btn.parentElement.removeChild(old_btn);

    const figcaption = document.querySelector('figcaption.visible');
    if (figcaption) figcaption.classList.remove('visible');

    const btn = document.createElement('button');
    btn.id = "info";
    btn.textContent="i";
    btn.setAttribute('data-caption', index);
    project.appendChild(btn);

    btn.addEventListener('click', function(){
      flkty.selectedElement.querySelector('figcaption').classList.toggle("visible");
    })
    
  })

  const currentlink = document.querySelector('.current-project');
  if(currentlink) {
    currentlink.addEventListener('click', function(e){
      e.preventDefault();
      flkty.select(0);
    })
  }

  project.querySelectorAll(".flickity-prev-next-button:not(.loaded)").forEach((function(t) {
    var e = document.createElement("span");
    e.style.display = "none"; 
    e.className = "text"; 
    t.appendChild(e);
    t.addEventListener("mousemove", (function(t) {
      var n = t.currentTarget.getBoundingClientRect();
      e.style.display="block";
      e.style.top = t.pageY - n.top - window.scrollY + "px";
      e.style.left = t.pageX - n.left + "px"; 
      t.currentTarget.classList.add("loaded");
    }));
  }));

  // readmore
  var readmore = document.querySelector(".readmore");
  if (readmore){
    readmore.addEventListener('click', function(){
      var meta = document.querySelector('.meta').cloneNode(true);
      meta.id="clone";
      document.querySelector('.page').appendChild(meta);
      meta.classList.add('opened');
      project.classList.add('hidden')
    })
  }


  const page = document.querySelector(".page");
  page.addEventListener('click', function(e){
    if(e.target && e.target.matches('.close')){
      const clone = document.querySelector('#clone');
      clone.parentNode.removeChild(clone);
      project.classList.remove('hidden');
    }
  })


}





filterSelection("all");
function filterSelection(c) {
  var filtrables, i;
  filtrables = document.querySelectorAll(".filtrable");
  if (c == "all") c = "filtrable";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < filtrables.length; i++) {
    var f = filtrables[i];
    filtrableAddClass(f, "hidden");
    if (f.classList.contains(c)) filtrableRemoveClass(f, "hidden");
  }
}

// Show filtered elements
function filtrableAddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function filtrableRemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.querySelector(".subnav");
if(btnContainer){
  var btns = btnContainer.querySelectorAll(".filter");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(e) {
      e.preventDefault();
      var target = this.getAttribute('href').replace('#', '');
      var current = btnContainer.querySelector(".active");

      if (this.classList.contains('active')) {
          filterSelection("all");
          this.classList.remove("active");
      } else {
        filterSelection(target);
        if (current) {
          current.classList.remove("active");
        }
        this.classList.add("active");
      }
    });
  }
}