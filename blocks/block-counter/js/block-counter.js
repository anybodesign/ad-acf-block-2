/**
 * jQuery NumScroller Plugin (modernized)
 * 
 * http://www.tinywall.net/
 * Developers: Arun David, Boobalan
 * Copyright (c) 2014 
 * 
 * - Espaces entre milliers 
 * - Compatible jQuery 3+
 */

(function ($) {
  $(window).on("load", function () {
	$(document).scrollzipInit();
	$(document).rollerInit();
  });

  $(window).on("load scroll resize", function () {
	$(".numscroller").scrollzip({
	  showFunction: function () {
		numberRoller($(this).attr("data-slno"));
	  },
	  wholeVisible: false,
	});
  });

  $.fn.scrollzipInit = function () {
	if (!$("#scrollzipPoint").length) {
	  $("body").prepend('<div id="scrollzipPoint" style="position:fixed;top:0;left:0;width:0;height:0;"></div>');
	}
  };

  $.fn.rollerInit = function () {
	$(".numscroller").each(function (i) {
	  const index = i + 1;
	  $(this).attr("data-slno", index);
	  $(this).addClass("roller-title-number-" + index);
	});
  };

  $.fn.scrollzip = function (options) {
	const settings = $.extend(
	  {
		showFunction: null,
		hideFunction: null,
		showShift: 0,
		wholeVisible: false,
		hideShift: 0,
	  },
	  options
	);

	return this.each(function () {
	  const $el = $(this);
	  $el.addClass("scrollzip");

	  const winHeight = $(window).outerHeight();
	  const scrollTop = $("#scrollzipPoint").offset().top;

	  const elementTop = $el.offset().top;
	  const elementHeight = $el.outerHeight();

	  // Check show
	  if (
		$.isFunction(settings.showFunction) &&
		!$el.hasClass("isShown") &&
		(winHeight + scrollTop - settings.showShift) > (elementTop + (settings.wholeVisible ? elementHeight : 0)) &&
		(scrollTop + (settings.wholeVisible ? elementHeight : 0)) < (elementHeight + elementTop - settings.showShift)
	  ) {
		$el.addClass("isShown");
		settings.showFunction.call(this);
	  }

	  // Check hide
	  if (
		$.isFunction(settings.hideFunction) &&
		$el.hasClass("isShown") &&
		((winHeight + scrollTop - settings.hideShift) < (elementTop + (settings.wholeVisible ? elementHeight : 0)) ||
		  (scrollTop + (settings.wholeVisible ? elementHeight : 0)) > (elementHeight + elementTop - settings.hideShift))
	  ) {
		$el.removeClass("isShown");
		settings.hideFunction.call(this);
	  }
	});
  };

  function numberRoller(slno) {
	const $el = $(".roller-title-number-" + slno);
	const min = parseInt($el.attr("data-min"), 10);
	const max = parseInt($el.attr("data-max"), 10);
	const delay = parseFloat($el.attr("data-delay"));
	const increment = parseInt($el.attr("data-increment"), 10);

	const diff = max - min;
	const timeout = (delay * 1000) / diff;

	numberRoll(slno, min, max, increment, timeout);
  }

  function numberRoll(slno, current, max, increment, timeout) {
	const $el = $(".roller-title-number-" + slno);

	if (current <= max) {
	  $el.html(formatNumberWithSpans(current));
	  setTimeout(() => {
		numberRoll(slno, current + increment, max, increment, timeout);
	  }, timeout);
	} else {
	  $el.html(formatNumberWithSpans(max));
	}
  }

  // Formate un nombre avec des espaces entre les milliers
  function formatNumberWithSpans(num) {
	return String(num).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ');
  }

})(jQuery);