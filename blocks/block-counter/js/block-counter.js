/**
 * jQuery NumScroller Plugin (modernized + customizable separator)
 *
 * - Ajout : data-separator (permet de choisir le séparateur ou le style)
 * - Exemple : <div class="numscroller" data-min="0" data-max="1000" data-delay="2" data-increment="10" data-separator="dot"></div>
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
	  const winHeight = $(window).outerHeight();
	  const scrollTop = $("#scrollzipPoint").offset().top;
	  const elementTop = $el.offset().top;
	  const elementHeight = $el.outerHeight();

	  if (
		$.isFunction(settings.showFunction) &&
		!$el.hasClass("isShown") &&
		winHeight + scrollTop - settings.showShift > elementTop + (settings.wholeVisible ? elementHeight : 0) &&
		scrollTop + (settings.wholeVisible ? elementHeight : 0) < elementHeight + elementTop - settings.showShift
	  ) {
		$el.addClass("isShown");
		settings.showFunction.call(this);
	  }

	  if (
		$.isFunction(settings.hideFunction) &&
		$el.hasClass("isShown") &&
		(winHeight + scrollTop - settings.hideShift < elementTop + (settings.wholeVisible ? elementHeight : 0) ||
		  scrollTop + (settings.wholeVisible ? elementHeight : 0) > elementHeight + elementTop - settings.hideShift)
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
	const separator = $el.attr("data-separator") || "space"; // par défaut : espace stylable

	const diff = max - min;
	const timeout = (delay * 1000) / diff;

	numberRoll(slno, min, max, increment, timeout, separator);
  }

  function numberRoll(slno, current, max, increment, timeout, separator) {
	const $el = $(".roller-title-number-" + slno);

	if (current <= max) {
	  $el.html(formatNumber(current, separator));
	  setTimeout(() => {
		numberRoll(slno, current + increment, max, increment, timeout, separator);
	  }, timeout);
	} else {
	  $el.html(formatNumber(max, separator));
	}
  }

  // Formatage stylable avec choix du séparateur
  function formatNumber(num, separator) {
	let sepHTML = "";

	switch (separator) {
	  case "dot":
		sepHTML = '<span class="thousand-sep dot">.</span>';
		break;
	  case "comma":
		sepHTML = '<span class="thousand-sep comma">,</span>';
		break;
	  case "thinspace":
		sepHTML = '<span class="thousand-sep thinspace">&thinsp;</span>';
		break;
	  case "span":
      sepHTML = '<span class="thousand-sep"></span>';
	  break;
	  case "space":
	  	sepHTML = ' '; // espace par défaut
	  default:
		return String(num); // pas de séparation
	}

	return String(num).replace(/(\d)(?=(\d{3})+(?!\d))/g, `$1${sepHTML}`);
  }
})(jQuery);
