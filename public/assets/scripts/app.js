jQuery(function ($) {
  // Login form
  $('#login-form-title').click(function () {
    $('#login-form').delay(100).fadeIn(100)
    $('#register-form').fadeOut(100)
    $('#login-form-title').addClass('active')
    $('#register-form-title').removeClass('active')
  })

  // Select2 for select boxes
  $('.js-example-basic-single').select2()

  // Change select2 background color on click
  $('.select2').click(function () {
    // $('.select2-container').css('background-color', '#fff !important')
    console.log($(this))
  })

  // Insert custom icon inside select2
  $('.select2-selection__arrow').append(
    '<img src="../assets/images/icons/arrow-right.svg">'
  )

  $('#register-form-title, #register-form-link').click(function () {
    $('#register-form').delay(100).fadeIn(100)
    $('#login-form').fadeOut(100)
    $('#register-form-title').addClass('active')
    $('#login-form-title').removeClass('active')
  })

  // DOM handlers
  // 1. Featured job bookmark handler
  /* $('.featured-jobs__job-bookmark').click(function () {
    $(this).html(
      $(this).html() === '<i class="far fa-bookmark"></i>'
        ? '<i class="fas fa-bookmark"></i>'
        : '<i class="far fa-bookmark"></i>'
    )
  }) */

  // 2. Bookmark a job handler (Jobs page)
  $('.jobs__item-details-meta-item .bookmark').click(function () {
    $(this).html(
      $(this).html() === '<i class="far fa-star"></i>'
        ? '<i class="fas fa-star"></i>'
        : '<i class="far fa-star"></i>'
    )
  })

  // 3. Show/hide password handler
  $('input.show-hide-password + .input-group-append').on('click', function () {
    if ($('input.show-hide-password').attr('type') == 'text') {
      $('input.show-hide-password').attr('type', 'password')
      $('input.show-hide-password + .input-group-append i').addClass(
        'fa-eye-slash'
      )
      $('input.show-hide-password + .input-group-append i').removeClass(
        'fa-eye'
      )
    } else if ($('input.show-hide-password').attr('type') == 'password') {
      $('input.show-hide-password').attr('type', 'text')
      $('input.show-hide-password + .input-group-append i').removeClass(
        'fa-eye-slash'
      )
      $('input.show-hide-password + .input-group-append i').addClass('fa-eye')
    }
  })

  // 4. Profile logo image preview handler
  $('.profile__details-image-upload').change(function () {
    $('.profile__details-logo-text').fadeOut()
    let file = $(this)[0].files[0]
    let reader = new FileReader()
    reader.onload = function (e) {
      document
        .querySelector('.profile__details-logo')
        .insertAdjacentHTML(
          'beforeend',
          `<img src="${e.target.result}" class="profile__details-logo-image" />`
        )
    }
    reader.readAsDataURL(file)
  })

  // 5. Profile logo image remover handler
  $('.profile__details-logo-image-remover').click(function (event) {
    event.preventDefault()
    $('#modalDeleteThis .btn').click(function () {
      $('.profile__details-logo-image').remove()
      $('.profile__details-logo-text').fadeIn(100)
      $('.profile__details-image-upload').val('')
    })
  })

  // Main slider - owl carousel
  $('.slider .owl-carousel').owlCarousel({
    loop: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 4500,
    autoplayHoverPause: true,
    smartSpeed: 1750,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  })

  // Partners slider - owl carousel
  $('.partners .owl-carousel').owlCarousel({
    loop: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 1500,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      767: {
        items: 3,
      },
      992: {
        items: 4,
      },
      1200: {
        items: 5,
      },
    },
  })
})
