$(function() {
  const navLink = $("header .nav-link");
  const menuIcon = $(".navbar-toggler");
  let didScroll;
  let lastScrollTop = 0;
  let delta = 5;
  let navbarHeight = $("header").outerHeight();
  // Show and Hide Password
  $(".toggle-password").click(function() {
    if ($(this).attr("name") === "eye-outline") {
      $(this).attr("name", "eye-off-outline");
    } else {
      $(this).attr("name", "eye-outline");
    }
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  // Hide Header on scroll down
  $(window).scroll(() => {
    didScroll = true;
  });
  setInterval(() => {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    let st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta) return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight) {
      // Scroll Down
      $("header").removeClass("nav-down").addClass("nav-up");
    } else {
      // Scroll Up
      if (st + $(window).height() < $(document).height()) {
        $("header").removeClass("nav-up").addClass("nav-down");
      }
    }

    lastScrollTop = st;
  }

  // Close Sidebar menu when you click on a link
  navLink.on("click", () => {
    menuIcon.click();
  });

  if ($(".select-2-select").length > 0) {
    // Select 2
    // Make sure to add "select-2-select" class to any select box
    $(".select-2-select").select2();
    // Add Placeholder  to search field
    $(".select2-container").on("click", () =>
      $(".select2-search__field").attr("placeholder", "Search")
    );

    // Change search filter color after select
    $(".filter-input").on("change", function() {
      $(this).parent().addClass("filter-changed");
    });

    // Change icon for the select box
    $(".select2-selection__arrow").append(
      '<img src="jobs/images/icons/arrow-right.svg" class="arrow" alt="Arrow Right">'
    );
    $(".search-filter .select2-selection__arrow").append(
      '<img src="jobs/images/icons/arrow-right-gray.svg" class="arrow filter" alt="Arrow Right">'
    );
  }
  if ($("#salary-slider-range").length > 0) {
    $("#salary-slider-range").slider({
      range: true,
      min: 0,
      max: 10000,
      values: [ 75, 3500 ],
      slide: function(event, ui) {
        $("#amount").val("£" + ui.values[0] + " - £" + ui.values[1]);
      }
    });
    $("#amount").val(
      "£" +
        $("#salary-slider-range").slider("values", 0) +
        " - £" +
        $("#salary-slider-range").slider("values", 1)
    );
  }

  // Toggle filter sidebar in mobile

  $("#filter-button").on("click", () => $("#search-filter").addClass("show"));
  $("#back-filter").on("click", () => $("#search-filter").removeClass("show"));
  // WOW JS
  if ($(".wow").length > 0) {
    wow = new WOW({
      mobile: false
    });
    wow.init();
  }

  // Show Horizontal bar when you click on three dots

  $(".header-profile-info ").on("mouseover", () => {
    $(".horizontal-bar").addClass("show");
    $(".navbar").addClass("gray");
  });
  $("header:not(.horizontal-page)").on("mouseleave", () => {
    $(".horizontal-bar").removeClass("show");
    $(".navbar").removeClass("gray");
  });
  if (window.innerWidth >= 1200) {
    $(".options-dots").on("click", () => {
      setTimeout(() => {
        if ($(".horizontal-bar")[0].classList.contains("show")) {
          $("body").css({
            height: "100vh",
            overflowY: "hidden"
          });
        } else {
          $("body").css({
            height: "auto",
            overflowY: "scroll"
          });
        }
      }, 500);
    });
  }

  if (window.innerWidth <= 991) {
    $(".navbar-toggler").on("click", () => {
      setTimeout(() => {
        console.log($(".navbar-collapse")[0].classList.contains("show"));
        if ($(".navbar-collapse")[0].classList.contains("show")) {
          $("body").css({
            height: "100vh",
            overflowY: "hidden"
          });
        } else {
          $("body").css({
            height: "auto",
            overflowY: "scroll"
          });
        }
      }, 500);
    });
  }

  // Floating label for textarea
  $(" .is-floating-label textarea, .is-floating-label input")
    .on("focus blur", function(e) {
      $(this)
        .parents(".is-floating-label")
        .toggleClass("is-focused", e.type === "focus" || this.value.length > 0);
    })
    .trigger("blur");

  if ($(".max-length").length > 0) {
    $(function() {
      $(".max-length").simpleTxtCounter({
        maxLength: 400
      });
    });
  }
  // Swiper Js Settings

  if ($(".swiper-slide").length > 0) {
    const heroSwiper = new Swiper(".heroSwiper", {
      disableOnInteraction: true,
      loop: true,
      speed: 1000,
      autoplay: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      }
    });
    const partner = new Swiper(".partnersSwiper", {
      slidesPerView: 2,
      spaceBetween: 30,
      breakpoints: {
        400: {
          slidesPerView: 2
        },

        767: {
          slidesPerView: 3
        },
        992: {
          slidesPerView: 3
        },
        1200: {
          slidesPerView: 5
        }
      }
    });
  }

  $(".link-box").on("click", () => {
    /* Get the text field */
    const jobLink = $("#job-link");
    const linkCopied = $("#link-copied");

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(jobLink.text());

    // Show Link Copied Alert
    linkCopied.fadeIn().delay(2000).fadeOut();
  });
});

//The entered keywords
const allKeywords = [];

//Delete a keyword
const deleteWord = (el) => {
  const index = allKeywords.indexOf($(el).parent(".keyword").text());
  if (index !== -1) {
    allKeywords.splice(index, 1);
  }
  $(el).parent(".keyword").remove();
};

//Add a keyword
const addWord = (word) => {
  if (word === undefined || word === "") {
    return;
  }

  allKeywords.push(word);

  $("#filter_keywords").after(`
<span class="keyword">${word}
  <a class="delete" onclick="deleteWord(this)">
  <ion-icon name="close-outline"></ion-icon>
  </a>
</span>
`);
  $("#filter_keywords").val("").focus();
};

//On focus out, add word
const addWordFromTextBox = () => {
  var val = $("#filter_keywords").val();
  if (val !== undefined && val !== "") {
    addWord(val);
  }
};

//On key press, check for , or ;
const checkLetter = () => {
  var val = $("#filter_keywords").val();
  if (val.length > 0) {
    var letter = val.slice(-1);
    if (letter === "," || letter === ";") {
      var word = val.slice(0, -1);
      if (word.length > 0) {
        addWord(word);
      }
    }
  }
};

$("#filter_keywords").blur(addWordFromTextBox);
$("#filter_keywords").keyup(checkLetter);
$("#filter_keywords").click(function() {
  $("#filter_keywords").focus();
});
// Show uploaded file name
const customUpload = $(".custom-upload.file");
if (customUpload.length > 0) {
  customUpload.on("change", function() {
    const fileName = $(this).find(".custom-upload__input").val();
    const customUploadButton = $(this).find(".custom-upload__button");
    fileName === ""
      ? "Upload attachment"
      : customUploadButton.text(fileName.replace("C:\\fakepath\\", ""));
  });
}
