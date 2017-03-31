$(document).ready(function() {

/* Preloader */

$(window).on('load', function() {
  $('.l-preloader').fadeOut(300);
})

/* Navigation top menu */

$('.header-dropdown').mouseenter(function(event) {
  var elem = $(event.target).next();
  $(elem).slideDown(300);
});

$('.header-dropdown').parent().mouseleave(function() {
  $('.header-dropdown-list').slideUp(300);
});

$('.header-search').click(function() {
  $('.header-search, .header-login').addClass('is-hidden');
  $('.header-searchForm').removeClass('is-hidden');
  $('.header-searchForm input').animate({width: '100%'}, 200).focus();
});

$('.header-searchForm input').blur(function() {
  $('.header-searchForm input').animate({width: '51px'}, 200);
  setTimeout(function() {
    $('.header-searchForm').addClass('is-hidden');
    $('.header-search, .header-login').removeClass('is-hidden');
  }, 200);
})

if ( $(window).width() <= 450 ) {
  $('.header-logo').insertAfter('.header-hamburger');
}

$(window).resize(function() {
  if ( $(window).width() <= 450 ) {
    $('.header-logo').insertAfter('.header-hamburger');
  } else {
    $('.header-logo').insertAfter('.header-loginForm-wrap');
  }
})

/* Navigation inner menu */

$('.header-hamburger').click(function() {
  $('body').addClass('is-noscroll');
  $('.header-nav-wrap').removeClass('is-hidden');
  $('.header-nav').show('slide', {
    duration: 400,
    direction: 'left'
  });
});

$('.header-nav-close').click(function() {
  $('.header-nav').hide('slide', {
    duration: 400,
    direction: 'left'
  });
  setTimeout(function() {
    $('body').removeClass('is-noscroll');
    $('.header-nav-wrap').addClass('is-hidden');
  }, 400);
});

$('.header-nav-wrap').click(function() {
  if ( $(event.target).hasClass('header-nav-wrap') ) {
    $('.header-nav').hide('slide', {
      duration: 400,
      direction: 'left'
    });
    setTimeout(function() {
      $('body').removeClass('is-noscroll');
      $('.header-nav-wrap').addClass('is-hidden');
    }, 400);
  }
});

// if ( $(window).width() >= 1024 ) {
//   $('.header-nav-dropdown').mouseenter(function(event) {
//     var elem = $(event.target).next();
//     $(elem).slideDown(300);
//   });
//
//   $('.header-nav-dropdown-list').parent().mouseleave(function() {
//     $('.header-nav-dropdown-list').slideUp(300);
//   });
// } else {
  $('.header-nav-dropdown').click(function() {
    $('.header-nav-dropdown-list').slideToggle(300);
  });
// }

/* Log in form */

$('.header-login').click(function() {
  $('body').addClass('is-noscroll');
  $('.header-loginForm-wrap').removeClass('is-hidden');
  setTimeout(function() {
    $('.header-loginForm').addClass('animated slideInUp');
  }, 10);
  setTimeout(function() {
    $('.header-loginForm').removeClass('animated slideInUp');
  }, 510);
});

$('.header-nav-login, .comments-alert-login, .comments-alert-register').click(function() {
  $('body').addClass('is-noscroll');
  $('.header-nav').css('display', 'none');
  $('.header-nav-wrap').addClass('is-hidden');
  $('.header-loginForm-wrap').removeClass('is-hidden');
  $('.header-loginForm').addClass('animated slideInUp');
  setTimeout(function() {
    $('.header-loginForm').removeClass('animated slideInUp');
  }, 500);
});

$('.header-loginForm').tabs({
  hide: 400,
  show: 400,
  classes: {
    "ui-tabs": "",
    "ui-tabs-nav": "",
    "ui-tabs-tab": "",
    "ui-tabs-panel": ""
  }
});

$('.comments-alert-login').click(function() {
  $('a[href="#login-form"]').click();
});

$('.comments-alert-register').click(function() {
  $('a[href="#register-form"]').click();
});

$('.header-loginForm-close').click(function() {
  $('.header-loginForm').addClass('animated slideOutDown');
  setTimeout(function() {
    $('body').removeClass('is-noscroll');
    $('.header-loginForm').removeClass('animated slideOutDown');
    $('.header-loginForm-wrap').addClass('is-hidden');
  }, 500);
});

$('.header-loginForm-restorePassword').click(function() {
  $('.header-loginForm').fadeOut(400);
  setTimeout(function() {
    $('.header-restorePassword').fadeIn(400);
  }, 400);
});

$('.header-loginForm-restorePassword-back').click(function() {
  $('.header-restorePassword').fadeOut(400);
  setTimeout(function() {
    $('.header-loginForm').fadeIn(400);
  }, 400);
})

/* Pop up */

$('.subscribePopUp-bg').addClass('is-visible');
$('.subscribePopUp-wrap').addClass('animated slideInDown');
setTimeout(function() {
  $('.subscribePopUp-wrap').removeClass('animated slideInDown');
}, 600);

$('.subscribePopUp-close').click(function() {
  $('.subscribePopUp-wrap').addClass('animated slideOutUp');
  setTimeout(function() {
    $('.subscribePopUp-wrap').removeClass('animated slideOutUp');
    $('.subscribePopUp-bg').removeClass('is-visible');
  }, 600);
});

$('.subscribePopUp-bg').click(function(event) {
  if ( $(event.target).hasClass('subscribePopUp-bg') ) {
    $('.subscribePopUp-wrap').addClass('animated slideOutUp');
    setTimeout(function() {
      $('.subscribePopUp-wrap').removeClass('animated slideOutUp');
      $('.subscribePopUp-bg').removeClass('is-visible');
    }, 600);
  }
})

/* Sliders */

$('.banners-slider').owlCarousel({
  items: 1,
  loop: true,
  autoplay: true,
  autoplayTimeout: 10000,
  autoplayHoverPause: true,
  smartSpeed: 500,
  dotsClass: 'slider-dots',
  dotClass: 'slider-dots-one',
  nav: true,
  navText: ['', '<i class="icon-arrow-long"></i>'],
  navClass: ['', 'slider-nav-next']
});

/* Home Photo section */

var photoCarousel;

function showPhotoCarousel() {
  if ( $(window).width() < 640 && $('.l-sectionPhoto').hasClass('l-sectionPhoto') ) {
    var bigPhoto = $('.photo-big img').attr('src').slice(0, -4);
    $('.photo-big img').attr('src', bigPhoto + '-small.png');
    $('.photo-small, .photo-big').unwrap();

    $('.photo-small').parent().addClass('owl-carousel');
    photoCarousel = $('.photo-small').parent().owlCarousel({
      items: 2,
      margin: 10,
      loop: true,
      center: true,
      dots: false
    })
  }
};
showPhotoCarousel();

$(window).resize(function() {
  if ( !$('.l-sectionPhoto').hasClass('l-sectionPhoto') ) return;

  if ( !photoCarousel ) {
    showPhotoCarousel();
  }

  if ( $(window).width() >= 640 && photoCarousel ) {
    photoCarousel.trigger('destroy.owl.carousel');

    var bigPhoto = $('.photo-big img').attr('src').slice(0, -10);
    $('.photo-big img').attr('src', bigPhoto + '.png');
    $('.photo-big').wrap('<div class="column large-6 photo-big-wrap"></div>');
    $('.photo-small:eq(0), .photo-small:eq(1)').wrapAll('<div class="column large-3 photo-small-wrap"></div>');
    $('.photo-small:eq(2), .photo-small:eq(3)').wrapAll('<div class="column large-3 photo-small-wrap"></div>');

    photoCarousel = null;
  }
});

/* Up button */

$(window).scroll(function() {
  if ( $(window).scrollTop() > $(window).height() ) {
    $('.up-button').addClass('is-visible');
  } else {
    $('.up-button').removeClass('is-visible');
  }
})

$('.up-button').click(function() {
  $('html, body').animate({scrollTop: 0}, 700);
});

/* Sort selectmenu */

var sortArticlesPos;

if ( $(window).width() > 450 ) {
  sortArticlesPos = 'right top+15';
} else {
  sortArticlesPos = 'right top+5';
}

$('.sortArticles-select').selectmenu({
  classes: {
    'ui-selectmenu-button': 'sortArticles-select-button',
    'ui-selectmenu-text': 'sortArticles-select-text',
    'ui-selectmenu-menu': 'sortArticles-select-menu'
  },
  position: {
    my: sortArticlesPos,
    at: 'right bottom'
  },
  width: null
});

/* Articles list */

var previewContentBig = $('.articlesList .articlesList-item-text p.text-p');
for (var i = 0; i < previewContentBig.length; i++) {
  if ( $(previewContentBig[i]).html().length > 260 ) {
    $(previewContentBig[i]).html( $(previewContentBig[i]).html().slice(0, 260) + '...' );
  }
}

var previewContentCompact = $('.articlesList-compact .articlesList-item-text .title-4, .articlesList-compact .articlesList-item-text .title-5');
for (var i = 0; i < previewContentCompact.length; i++) {
  if ( $(previewContentCompact[i]).html().length > 80 ) {
    $(previewContentCompact[i]).html( $(previewContentCompact[i]).html().slice(0, 80) + '...' );
  }
}

var previewContentMedium = $('.articlesList-medium p.text-p');
for (var i = 0; i < previewContentMedium.length; i++) {
  if ( $(previewContentMedium[i]).html().length > 150 ) {
    $(previewContentMedium[i]).html( $(previewContentMedium[i]).html().slice(0, 150) + '...' );
  }
}

var previewContentMediumPlus = $('.articlesList-medium-plus p.text-p');
for (var i = 0; i < previewContentMediumPlus.length; i++) {
  if ( $(previewContentMediumPlus[i]).html().length > 200 ) {
    $(previewContentMediumPlus[i]).html( $(previewContentMediumPlus[i]).html().slice(0, 200) + '...' );
  }
}

var previewContentSpecial = $('.aritclesList-special-item p.text-p');
for (var i = 0; i < previewContentSpecial.length; i++) {
  if ( $(previewContentSpecial[i]).html().length > 270 ) {
    $(previewContentSpecial[i]).html( $(previewContentSpecial[i]).html().slice(0, 270) + '...' );
  }
}

/* Calendar */

if ( $('.calendar-content').hasClass('calendar-content') ) {
  Calendar2("event-calendar", new Date().getFullYear(), new Date().getMonth());

  document.querySelector('.calendar-content-buttons-prev').onclick = function() {
    Calendar2("event-calendar", document.querySelector('#event-calendar .calendar-content-title').dataset.year, parseFloat(document.querySelector('#event-calendar .calendar-content-title').dataset.month)-1);
  }

  document.querySelector('.calendar-content-buttons-next').onclick = function() {
    Calendar2("event-calendar", document.querySelector('#event-calendar .calendar-content-title').dataset.year, parseFloat(document.querySelector('#event-calendar .calendar-content-title').dataset.month)+1);
  }
}

$('.calendar-content-table-event').tooltip({
  classes: {
    'ui-tooltip': 'calendar-event-tooltip',
    'ui-tooltip-content': 'calendar-event-tooltip-content'
  },
  position: {
    my: 'left-45 bottom-10',
    at: 'left top'
  }
});

/* Photo Gallary */

var bigPhotoCarousel = $('.article-gallary-slider').owlCarousel({
  items: 1,
  dots: false,
  nav: true,
  navText: ['<i class="icon-arrow-circle-left"></i>','<i class="icon-arrow-circle-right"></i>'],
  navContainerClass: 'article-gallary-nav',
  navClass: ['article-gallary-prev','article-gallary-next'],
  onTranslated: function(event) {
    smallPhotoCarousel.trigger('to.owl.carousel', [event.item.index], [500]);
    $('.article-gallary-previews').find('.article-gallary-previews-one').removeClass('is-current', 200);
    $('.article-gallary-previews').find('.owl-item:eq(' + [event.item.index] + ')').find('.article-gallary-previews-one').addClass('is-current', 200);
  },
});

var smallPhotoCarousel = $('.article-gallary-previews').owlCarousel({
  items: 5,
  dots: false,
  responsive: {
    0: {
      margin: 5
    },
    640: {
      margin: 7
    }
  }
});

$('.article-gallary-previews .owl-item').click(function(event) {
  bigPhotoCarousel.trigger('to.owl.carousel', [$(event.target).closest('.owl-item').index()], [500]);
});

$('.article-gallary-photo').magnificPopup({
  type: 'image',
  closeBtnInside: false,
  tClose: 'Закрыть',
  mainClass: 'article-gallary-photo-big',
  gallery: {
    enabled: true,
    tPrev: 'Назад',
    tNext: 'Вперед',
    tCounter: '%curr% из %total%',
  },
  tLoading: '<div class="spinningCircle"></div>',
  image: {
    tError: 'Невозможно загрузить <a href="%url%">изображение</a>.',
  },
  callbacks: {
    change: function() {
      $(this.content).fadeIn(300);
    },
  },
});

/* Account */

$('.aboutAuthor-person-photo-link.settings').tooltip({
  classes: {
    'ui-tooltip': 'aboutAuthor-person-photo-link-tooltip',
    'ui-tooltip-content': 'aboutAuthor-person-photo-link-tooltip-content'
  },
  position: {
    my: 'left-50% bottom-10',
    at: 'left+50% top'
  }
});

$('.generalForm-select').selectmenu({
  classes: {
    'ui-selectmenu-button': 'generalForm-select-button',
    'ui-selectmenu-button-open': 'generalForm-select-button-open',
    'ui-selectmenu-icon': 'generalForm-select-icon',
    'ui-selectmenu-menu': 'generalForm-select-menu'
  }
});

$('.generalForm-upload input').change(function(event) {
  var uploadFiles = this.files;
  var animatedElem = $(event.target).siblings('.generalForm-upload-button');

  var data = new FormData();
  $.each(uploadFiles, function(key, value) {
    data.append(key, value);
  });

  $(document).ajaxStart(function() {
    animatedElem.addClass('uploadAnimation');
  });

  $.ajax({
    url: '', // Change
    type: 'POST',
    data: data,
    cache: false,
    dataType: 'json',
    processData: false,
    contentType: false,
    success: function(respond, textStatus, jqXHR) {
      if( typeof respond.error === 'undefined' ) {
        animatedElem.removeClass('uploadAnimation').addClass('done');
        animatedElem.children('i').removeClass('icon-image').addClass('icon-check');
      } else {
        animatedElem.removeClass('uploadAnimation').addClass('done');
        animatedElem.children('i').removeClass('icon-image').addClass('icon-close2');
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      animatedElem.removeClass('uploadAnimation').addClass('done');
      animatedElem.children('i').removeClass('icon-image').addClass('icon-close2');
    }
  });
});

$('.changeProfile-form').submit(function() {
  event.preventDefault();
  var th = $(this);
  $.ajax({
    type: "POST",
    url: '', // Change
    data: th.serialize()
  }).done(function() {
    $('.changeProfile-form-complete').animate({opacity: 1}, 200);
    setTimeout(function() {
      $('.changeProfile-form-complete').animate({opacity: 0}, 500);
    }, 10000);
  })
});

});

function Calendar2(id, year, month) {
var Dlast = new Date(year,month+1,0).getDate(),
    D = new Date(year,month,Dlast),
    DNlast = new Date(D.getFullYear(),D.getMonth(),Dlast).getDay(),
    DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
    calendar = '<tr>',
    month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
if (DNfirst != 0) {
  for(var  i = 1; i < DNfirst; i++) calendar += '<td>';
}else{
  for(var  i = 0; i < 6; i++) calendar += '<td>';
}
for(var  i = 1; i <= Dlast; i++) {
  if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
    calendar += '<td class="calendar-content-table-today">' + i;
  }else{
    calendar += '<td>' + i;
  }
  if (new Date(D.getFullYear(),D.getMonth(),i).getDay() == 0) {
    calendar += '<tr>';
  }
}
for(var  i = DNlast; i < 7; i++) calendar += '<td>&nbsp;';
document.querySelector('#'+id+' tbody').innerHTML = calendar;
document.querySelector('#'+id+' .calendar-content-title').innerHTML = month[D.getMonth()] +' '+ D.getFullYear();
document.querySelector('#'+id+' .calendar-content-title').dataset.month = D.getMonth();
document.querySelector('#'+id+' .calendar-content-title').dataset.year = D.getFullYear();
document.querySelector('#'+id+' .calendar-prev-date').innerHTML = month[D.getMonth() - 1] +' '+ D.getFullYear();
document.querySelector('#'+id+' .calendar-next-date').innerHTML = month[D.getMonth() + 1] +' '+ D.getFullYear();
if (document.querySelectorAll('#'+id+' tbody tr').length < 6) {
    document.querySelector('#'+id+' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
}
}
