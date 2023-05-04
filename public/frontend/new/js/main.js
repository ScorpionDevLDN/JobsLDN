$(function() {
  const cookies = $("#cookies");
  const allowCookies = $("#allow-cookies");
  const declineCookies = $("#decline-cookies");
  const cookieButton = $("#cookies .button");
  const navLink = $("header .nav-link");
  const menuIcon = $(".navbar-toggler");
  const togglePassword = $(".toggle-password");
  const select2Select = $(".select-2-select");
  const salaryRange = $("#salary-slider-range");
  const filterButton = $("#filter-button");
  const searchFilter = $("#search-filter");
  const backFilter = $("#back-filter");
  const headeProfileInfo = $(".header-profile-info");
  const horizontalBar = $(".horizontal-bar");
  const navbar = $(".navbar");
  const linkBox = $(".link-box");
  const jobBox = $(".featured-jobs .job-box");
  const favoriteBox = $(".favorite-box");
  const signUp = $(".sign-up");

  let didScroll;
  let lastScrollTop = 0;
  let delta = 5;
  let navbarHeight = $("header").outerHeight();
  cookieButton.on("click", () => {
    cookies.addClass("animate animate__fadeOut");
    setTimeout(() => {
      cookies.remove();
    }, 800);
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

  const hasScrolled = () => {
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
  };

  // Show Horizontal bar when you hover on three dots
  headeProfileInfo.on("mouseover", () => {
    horizontalBar.addClass("show");
    navbar.addClass("gray");
  });
  $("header:not(.horizontal-page)").on("mouseleave", () => {
    horizontalBar.removeClass("show");
    navbar.removeClass("gray");
  });

  // Prevent Scroll when you click on menu Icon on mobile
  if (window.innerWidth <= 991) {
    menuIcon.on("click", () => {
      setTimeout(() => {
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
  if (window.innerWidth <= 991) {
    // Close Sidebar menu when you click on a link
    navLink.on("click", () => {
      menuIcon.click();
    });
  }

  // Set More Details button width to job box width
  jobBox.on("mouseenter", function() {
    $(this).find("a").css("width", `${$(this).width()}px`);
  });

  // Select 2
  if (select2Select.length > 0) {
    // Make sure to add "select-2-select" class to any select box
    select2Select.select2();

    $(".select-2-select.modal-select").select2({
      dropdownParent: $("#post-job.modal .modal-body")
    });

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
      '<img src="https://jobsldn.co.uk/test/public/frontend/new/images/icons/arrow-right.svg" class="arrow" alt="Arrow Right">'
    );
    $(".search-filter .select2-selection__arrow").append(
      '<img src="https://jobsldn.co.uk/test/public/frontend/new/images/icons/arrow-right-gray.svg" class="arrow filter" alt="Arrow Right">'
    );
  }
  // Salary Range
  if (salaryRange.length > 0) {
    salaryRange.slider({
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
  filterButton.on("click", () => searchFilter.addClass("show"));
  backFilter.on("click", () => searchFilter.removeClass("show"));

  // DatePicker
  if ($("#datepicker").length > 0) {
    $("#datepicker").datepicker({ minDate: 0, maxDate: "+1M +10D" });
  }

  // Floating label for textarea
  $(".is-floating-label textarea, .is-floating-label input")
    .on("focus blur", function(e) {
      $(this)
        .parents(".is-floating-label")
        .toggleClass("is-focused", e.type === "focus" || this.value.length > 0);
    })
    .trigger("blur");

  // Text Counter
  if ($(".max-length").length > 0) {
    $(function() {
      $(".max-length").simpleTxtCounter({
        maxLength: 6500
      });
    });
  }

  // Show and Hide Password
  togglePassword.click(function() {
    const input = $(this).parent().find("input");

    $(this).attr("name") === "eye-outline"
      ? $(this).attr("name", "eye-off-outline")
      : $(this).attr("name", "eye-outline");

    input.attr("type") == "password"
      ? input.attr("type", "text")
      : input.attr("type", "password");
  });

  // Toggle Favorite Box
  favoriteBox.on("click", function() {
    $(this).toggleClass("active");
  });

  // Go To Sign Up Tab
  signUp.on("click", () => $("#nav-register-tab").click());

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
      centerInsufficientSlides: true,
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
  // Copy Job link
  linkBox.on("click", () => {
    /* Get the text field */
    const jobLink = $("#job-link");
    const linkCopied = $("#link-copied");

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(jobLink.text());

    // Show Link Copied Alert
    linkCopied.fadeIn().delay(2000).fadeOut();
  });
});

/******KeyWord Function******/
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
  const filterKeyWords = $("#filter_keywords");
  if (word === undefined || word === "") {
    return;
  }

  allKeywords.push(word);
  filterKeyWords.after(
    `<span class="keyword">${word}
       <a class="delete" onclick="deleteWord(this)">
         <ion-icon name="close-outline"></ion-icon>
        </a>
      </span>`
  );
  filterKeyWords.val("").focus();
};

//On focus out, add word
const addWordFromTextBox = () => {
  const val = $("#filter_keywords").val();
  if (val !== undefined && val !== "") {
    addWord(val);
  }
};

//On key press, check for , or ;
const checkLetter = () => {
  const val = $("#filter_keywords").val();
  if (val.length > 0) {
    let letter = val.slice(-1);
    if (letter === "," || letter === ";") {
      let word = val.slice(0, -1);
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

// WOW JS
if ($(".wow").length > 0) {
  wow = new WOW({
    mobile: false
  });
  wow.init();
}

const logoImage = $(".company-details-logo img.logo");
const readURL = (input) => {
  if (input.files && input.files[0]) {
    let reader = new FileReader();

    reader.onload = function(e) {
      logoImage.attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
};
const delIcon = $("#del-icon");
delIcon.on("click", function() {
  let img;
  $(".company-details-logo").hasClass("jobseeker-logo")
    ? (img = "https://jobsldn.co.uk/test/public/frontend/new/images/account-img.svg")
    : (img = "https://jobsldn.co.uk/test/public/frontend/new/images/company-logo.svg");
  $(".company-details-logo").find("img.logo").attr("src", img);
});


function saveCookies(accept , url) {
  $.ajax({
    url : url,
    method : 'get',
    complete: function(json){
      console.log(json);
    }
  });
  document.getElementsByClassName('cookies-card')[0].style.visibility='hidden';
}
