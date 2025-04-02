var swiper = new Swiper(".carousel", {
	slidesPerView: 1.2,
	watchOverflow: true,
	loop: false,
	watchSlidesProgress: true,
	spaceBetween: 12,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	navigation: {
		nextEl: ".next_cars",
		prevEl: ".prev_cars",
	},
	breakpoints: {
    // when window width is >= 320px
    768: {
      slidesPerView: 3.1,
    },
	}
});
var swiper = new Swiper(".product_carousel", {
	slidesPerView: 1.2,
	watchOverflow: true,
	loop: false,
	watchSlidesProgress: true,
	spaceBetween: 12,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	navigation: {
		nextEl: ".next_product",
		prevEl: ".prev_product",
	},
	breakpoints: {
    // when window width is >= 320px
    768: {
      slidesPerView: 3.1,
    },
	}
});
var swiper = new Swiper(".testimonials", {
	slidesPerView: 1.2,
	watchOverflow: true,
	loop: false,
	watchSlidesProgress: true,
	spaceBetween: 12,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	navigation: {
		nextEl: ".next_testi",
		prevEl: ".prev_testi",
	},
	breakpoints: {
    // when window width is >= 320px
    768: {
      slidesPerView: 3.1,
			spaceBetween: 30,
    },
	}
});
var swiper = new Swiper(".services", {
	slidesPerView: 1.2,
	watchOverflow: true,
	loop: false,
	watchSlidesProgress: true,
	spaceBetween: 12,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	navigation: {
		nextEl: ".next_service",
		prevEl: ".prev_service",
	},
	breakpoints: {
    // when window width is >= 320px
    768: {
      slidesPerView: 3.1,
			spaceBetween: 30,
    },
	}
});
// faq
$('.faq_item p').hide();

$(".faq_item").click(function() {
	$(this).find("p").not(this).slideUp().prev().removeClass("active");
	$(this).find("p").not(":visible").slideDown().prev().addClass("active");
});
// MENU
$('.menu_button').click(function(){
	$(this).toggleClass('active')
	$('body').toggleClass('lock')
	$('aside').toggleClass('active')
	$('header').toggleClass('toggled')
})

var toggle = $('.menu_toggle');
toggle.next().hide();

$(toggle).click(function(){
	$(this).toggleClass('active')
	$(this).next().slideUp()
	$(this).next().not(":visible").slideDown();
})

$('#product').click(function(e){
	e.preventDefault();
	alert('Позиция добавлена. Сейчас вы будете перенаправлены в корзину ')
	window.location = './cart.php';
})