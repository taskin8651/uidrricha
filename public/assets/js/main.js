const siteHeader = document.getElementById("siteHeader");
const menuBtn = document.getElementById("menuBtn");
const mainNav = document.getElementById("mainNav");
const navOverlay = document.getElementById("navOverlay");
const mobileCloseBtn = document.getElementById("mobileCloseBtn");

function handleHeaderScroll() {
  if (!siteHeader) return;

  if (window.scrollY > 16) {
    siteHeader.classList.add("scrolled");
  } else {
    siteHeader.classList.remove("scrolled");
  }
}

window.addEventListener("scroll", handleHeaderScroll);
handleHeaderScroll();

function openMenu() {
  if (!menuBtn || !mainNav) return;

  menuBtn.classList.add("active");
  mainNav.classList.add("active");
  menuBtn.setAttribute("aria-expanded", "true");

  if (navOverlay) {
    navOverlay.classList.add("active");
  }

  document.body.style.overflow = "hidden";
}

function closeMenu() {
  if (!menuBtn || !mainNav) return;

  menuBtn.classList.remove("active");
  mainNav.classList.remove("active");
  menuBtn.setAttribute("aria-expanded", "false");

  if (navOverlay) {
    navOverlay.classList.remove("active");
  }

  document.body.style.overflow = "";
}

if (menuBtn) {
  menuBtn.addEventListener("click", function (event) {
    event.stopPropagation();

    if (mainNav && mainNav.classList.contains("active")) {
      closeMenu();
    } else {
      openMenu();
    }
  });
}

if (mobileCloseBtn) {
  mobileCloseBtn.addEventListener("click", closeMenu);
}

if (navOverlay) {
  navOverlay.addEventListener("click", closeMenu);
}

if (mainNav) {
  mainNav.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", closeMenu);
  });
}

window.addEventListener("resize", function () {
  if (window.innerWidth > 991) {
    closeMenu();
  }
});

document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    closeMenu();
  }
});











/* TESTIMONIALS SLIDER START */
const testimonialSlider = document.getElementById("testimonialSlider");

if (testimonialSlider) {
  const track = testimonialSlider.querySelector(".testimonial-track");
  const slides = testimonialSlider.querySelectorAll(".testimonial-slide");
  const dots = document.querySelectorAll(".testimonial-dots button");
  const prevBtn = document.querySelector(".testimonial-prev");
  const nextBtn = document.querySelector(".testimonial-next");

  let currentIndex = 0;
  let autoTimer = null;

  function getSlidesPerView() {
    return window.innerWidth <= 767 ? 1 : 2;
  }

  function getMaxIndex() {
    return Math.max(slides.length - getSlidesPerView(), 0);
  }

  function updateTestimonialSlider(index) {
    const maxIndex = getMaxIndex();

    if (index < 0) {
      currentIndex = maxIndex;
    } else if (index > maxIndex) {
      currentIndex = 0;
    } else {
      currentIndex = index;
    }

    const slideWidth = slides[0].getBoundingClientRect().width;
    track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;

    dots.forEach(function (dot, dotIndex) {
      dot.classList.toggle("active", dotIndex === currentIndex);
    });
  }

  function nextTestimonial() {
    updateTestimonialSlider(currentIndex + 1);
  }

  function prevTestimonial() {
    updateTestimonialSlider(currentIndex - 1);
  }

  function startTestimonialAutoplay() {
    stopTestimonialAutoplay();
    autoTimer = setInterval(nextTestimonial, 4500);
  }

  function stopTestimonialAutoplay() {
    if (autoTimer) {
      clearInterval(autoTimer);
      autoTimer = null;
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", function () {
      nextTestimonial();
      startTestimonialAutoplay();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", function () {
      prevTestimonial();
      startTestimonialAutoplay();
    });
  }

  dots.forEach(function (dot, index) {
    dot.addEventListener("click", function () {
      updateTestimonialSlider(index);
      startTestimonialAutoplay();
    });
  });

  testimonialSlider.addEventListener("mouseenter", stopTestimonialAutoplay);
  testimonialSlider.addEventListener("mouseleave", startTestimonialAutoplay);

  window.addEventListener("resize", function () {
    updateTestimonialSlider(currentIndex);
  });

  updateTestimonialSlider(0);
  startTestimonialAutoplay();
}
/* TESTIMONIALS SLIDER END */