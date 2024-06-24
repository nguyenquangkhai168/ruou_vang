(function ($) {
	$(document).ready(function () {
		handleMobileMenu();
		handleProductThumb();
		$("#age_verify").popup();
		checkAgeVerifyPopup();
		$(document.body).trigger("wc_fragment_refresh");
	});
	window.addEventListener("resize", function (event) {
		handleProductThumb();
	});

	$(".open-sup").click(function (e) {
		e.preventDefault();
		if ($(this).parent().next().hasClass("shown")) {
			$(this).removeClass("rotate");
			$(this).parent().next().removeClass("shown");
		} else {
			$(this).addClass("rotate");
			$(this).parent().next().addClass("shown");
		}
	});

	function handleMobileMenu() {
		$("#hamburger-nav").click(function () {
			if ($(this).hasClass("close")) {
				$(this).removeClass("close");
				$(this).html('<i class="fal fa-bars"></i>');
				$("#hamburger-menu").removeClass("shown");
			} else {
				$(this).addClass("close");
				$(this).html('<i class="far fa-times"></i>');
				$("#hamburger-menu").addClass("shown");
			}
		});
	}

	if ($(".recent-post__carousel").length) {
		$(".recent-post__carousel").each(function () {
			var recentCarousel = $(".recent-post__carousel");
			$(this).owlCarousel({
				margin: 12,
				responsive: {
					0: {
						items: $(this).data("mobile"),
						margin: 12,
					},
					768: {
						items: $(this).data("tablet"),
						margin: $(this).data("margintb"),
					},
					992: {
						items: $(this).data("desktop-small"),
						margin: $(this).data("margintb"),
					},
					1680: {
						items: $(this).data("desktop"),
						margin: $(this).data("margintb"),
					},
				},
			});
		});
	}

	if ($(".owl-carousel").length) {
		$(".owl-carousel").each(function () {
			var owl = $(".owl-carousel");
			$(this).owlCarousel({
				animateOut: "fadeOut",
				margin: 0,
				autoplayTimeout: $(this).data("autotime"),
				smartSpeed: $(this).data("speed"),
				autoHeight: $(this).data("autoheight"),
				autoplay: $(this).data("autoplay"),
				items: $(this).data("carousel-items"),
				nav: $(this).data("nav"),
				dots: $(this).data("dots"),
				center: $(this).data("center"),
				loop: $(this).data("loop"),
				responsive: {
					0: {
						items: $(this).data("mobile"),
					},
					768: {
						items: $(this).data("tablet"),
						margin: $(this).data("margintb"),
					},
					992: {
						items: $(this).data("desktop-small"),
						margin: $(this).data("margintb"),
					},
					1680: {
						items: $(this).data("desktop"),
						margin: $(this).data("margintb"),
					},
				},
			});
		});
	}

	var offsetDesktopNav = $("#header-navbar").offset().top;
	$(window).scroll(function () {
		var currentScroll = $(window).scrollTop();
		if (currentScroll >= offsetDesktopNav) {
			$("#header-navbar").css({
				position: "fixed",
				top: "0",
				left: "0",
				"z-index": "11",
			});
			$("#header-navbar").addClass("is-fixed");
			$("#wrapper").css("margin-top", $("#header-navbar").outerHeight());
		} else {
			$("#header-navbar").css({
				position: "static",
			});
			$("#header-navbar").removeClass("is-fixed");
			$("#wrapper").css("margin-top", "0");
		}
	});

	function handleProductThumb() {
		var thumbWidth = $(".products .product").outerWidth();
		if (thumbWidth > 300) {
			thumbWidth = 300;
		}
		if ($(window).width() > 575) {
			if ($(".products .product").length > 0) {
				$(".products .product a img").css("height", `${thumbWidth}px`);
				$(".products .product a.product_type_simple").css(
					"top",
					`calc(${thumbWidth}px - 40px)`
				);
			}
		}
	}

	$(window).load(function () {
		if (!sessionStorage.getItem("verifyAge")) {
			$("#age_verify").popup("show");
		} else {
			$("#age_verify").popup("hide");
		}
	});
	function checkAgeVerifyPopup() {
		var clickCount = 0;

		$("#accept_age").click(function () {
			sessionStorage.setItem("verifyAge", true);
			$("#age_verify").popup("hide");
		});
		$("#reject_age").click(function () {
			if (clickCount > 0) {
				sessionStorage.setItem("verifyAge", true);
				$("#age_verify").popup("hide");
			} else {
				$("#age_verify .notif").animate(
					{ opacity: 0 },
					600,
					function () {
						$(this)
							.html(
								"<p>Các sản phẩm của chúng tôi không dành cho người dưới 18 tuổi và phụ nữ đang mang thai.</p><p>Vui lòng thưởng thức có trách nhiệm và không lái xe sau khi uống rượu.</p>"
							)
							.animate({ opacity: 1 }, 600);
					}
				);
				clickCount++;
			}
		});
	}

	//popup producer-item
	$(window).ready(function () {
		$("#pop-up-about").popup({
			scrolllock: true,
			closebutton: true,
		});
		$("*[id^='producer-']").click(function (e) {
			e.preventDefault();
			let bannerUrl, logoUrl, name, desc;
			bannerUrl = $(this).data("banner");
			logoUrl = $(this).data("logo");
			name = $(this).data("name");
			desc = $(this).data("desc");

			$("#pop-up-about").popup("show");
			$("#pop-up-about").css("background-image", `url(${bannerUrl})`);
			$("#producer-img").attr("src", logoUrl);
			$("#producer-name").html(name);
			$("#producer-desc").html(desc);
		});
	});
	var scrollToTopBtn = document.getElementById("scrollToTopBtn");
	var rootElement = document.documentElement;
	function scrollToTop() {
		// Scroll to top logic
		rootElement.scrollTo({
			top: 0,
			behavior: "smooth",
		});
	}
	scrollToTopBtn.addEventListener("click", scrollToTop);
})(jQuery);

jQuery(function ($) {
	if (!String.prototype.getDecimals) {
		String.prototype.getDecimals = function () {
			var num = this,
				match = ("" + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
			if (!match) {
				return 0;
			}
			return Math.max(
				0,
				(match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0)
			);
		};
	}
	// Quantity "plus" and "minus" buttons
	$(document.body).on("click", ".plus, .minus", function () {
		var $qty = $(this).closest(".quantity").find(".qty"),
			currentVal = parseFloat($qty.val()),
			max = parseFloat($qty.attr("max")),
			min = parseFloat($qty.attr("min")),
			step = $qty.attr("step");

		// Format values
		if (!currentVal || currentVal === "" || currentVal === "NaN")
			currentVal = 0;
		if (max === "" || max === "NaN") max = "";
		if (min === "" || min === "NaN") min = 0;
		if (
			step === "any" ||
			step === "" ||
			step === undefined ||
			parseFloat(step) === "NaN"
		)
			step = 1;

		// Change the value
		if ($(this).is(".plus")) {
			if (max && currentVal >= max) {
				$qty.val(max);
			} else {
				$qty.val(
					(currentVal + parseFloat(step)).toFixed(step.getDecimals())
				);
			}
		} else {
			if (min && currentVal <= min) {
				$qty.val(min);
			} else if (currentVal > 0) {
				$qty.val(
					(currentVal - parseFloat(step)).toFixed(step.getDecimals())
				);
			}
		}

		// Trigger change event
		$qty.trigger("change");
	});
});
