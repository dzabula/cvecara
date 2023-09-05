// MY JS CODE

window.addEventListener('DOMContentLoaded',function() {

    $("#search-text").on("keyup",function () {
        $("#search-text-2").val($(this).val());
    })
    $("#search-text-2").on("keyup",function () {
        $("#search-text").val($(this).val());

    })

    let globalArr = globalUrl.split("/")
    let currentArr = window.location.href.split("/")

    if(globalArr[globalArr.length-1] == currentArr[currentArr.length -2]) {

        $(".add-to-cart").click(function (e) {
            e.preventDefault();
            let id = $(this).attr("data-product-id");
            let id_price = $(this).attr("data-price-id");
            AddProductToCart(id);

        })

    }
    $("main").click(function(){
        $("#nav-account-info").attr("style","display: none !important")
        $("#cart-info").attr("style","display: none !important")
        displayCartFields = false;
        displayAccountFields = false;

    })
    $("#nav-account").click(function (){

            $("#nav-account").attr("style","display: block !important;");
            $("#nav-account-info").attr("style","display: block !important ; margin-right:50px;")

    })

    $("#cart-icon").click(function (){
            $("#cart-icon").attr("style","display: block !important");
            $("#cart-info").attr("style","display: block !important")


    })

})



function Search(text){

}

function WriteIdCartInForm(){
   return;
}
function RemoveItemInLocalStorage(id){
    var items = JSON.parse(localStorage.getItem("cart"));

    var res = items.filter(e => e.id != id);
    localStorage.setItem("cart",JSON.stringify(res));

   // WriteProductsToChart(res);
}

function RemoveItemInDataBase(id){

    $.ajax({
        url:urlToDeleteCart,
        method:"DELETE",
        dataType:"JSON",
        data:{
            "_token":csrf,
            "id":id
        },
        success:function(data){
          // alert(data)

        },
        error:function (xhr){
          //  alert("Doslo je do greske prilikom komunikacije sa bazom podataka. Pokusajte kasnije. (Problem #18563)")
        }
    })
}
function AddProductToCart(id){

    $.ajax({
        method:"POST",
        url:urlToAddCart,
        dataType: "JSON",
        data:{
            "_token":csrf,
            "id":id,
        },
        success:function (data,isSuccess,xhr){
            if(xhr.status  == 201){

                AddItemToLocaclStorage(data)
                SuccessAddingInCart();
                WriteProductsToChart(JSON.parse(localStorage.getItem("cart")));
            }else{
                SuccessAddingInCart();

                WriteProductsToChart(data);

            }
        },
        error:function(xhr){
          //  alert("Doslo je do greske prilikom komunikacije sa bazom podataka. Pokusajte kasnije. (Problem #18564)")

        }

    })
}

function AddItemToLocaclStorage(product){
    var item = product[0];
    try {
        item.quantity = 1
        var items = [];
        var isExist = false;

        if(localStorage.getItem("cart") == null) {
            items.push(item);
            localStorage.setItem("cart", JSON.stringify(items));
        }else{
            var old = JSON.parse(localStorage.getItem("cart"));
            let isFound = false;

            old.forEach(e => {
                if(e.id == item.id){
                    isFound = true;
                }
            })



            if (isFound) {
                old.map(x => {

                    if (x.id == item.id) {
                        isExist = true;
                        x.quantity += 1;
                        return x;
                    } else {
                        return x
                    }
                })

            } else {
                old.push(item);
            }

            localStorage.setItem("cart", JSON.stringify(old));
        }


    }catch (e){
        alert("Dosloje je do greske pokusajte kasnije.")

    }
}

function SuccessAddingInCart() {
	var x = document.getElementById("snackbar");
 	x.className = "show";
  	setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function WriteProductsToChart(items){

    if(!items || (items != null && items.length == 0)){

        $("#total-drop").css("display","none");
        $("#nothing-in-chart").css("display","block");
        $("#container-items").html("");
        $("#num-product").text(0);
    }
    else {
        if(items){
            $("#num-product").text(items.length);
        }else{
            $("#num-product").text(0);
        }


        $("#total-drop").css("display","block");
        $("#nothing-in-chart").css("display","none");
        var html = "";
        var total = 0;

        items.forEach(item => {
            html += `
                 <li id="${item.id}">
                    <a href="product-detail-1.html">
                        <figure><img src="${globalUrl}/asset/img/${item.src}" data-src="${globalUrl}/asset/img/${item.src}" alt="${item.name}" width="50" height="50" class="lazy"></figure>
                        <strong><span><b id="quantity">${item.quantity}</b> x ${item.name}</span>${item.price_with_offer} rsd</strong>
                    </a>
                    <a href="#0" product-id="${item.id}" delete-item-id="${item.price_with_offer}" class="action delete"><i class="ti-trash"></i></a>
                </li>

            `
            total += parseInt(item.price_with_offer) * item.quantity;
        })

        var totalString = WriteMoney(total); // FROM main.js file

        $("#container-items").html(html);
        $("#total").text(totalString + " RSD");

        addEventDelete();
    }

}

function DeleteItemInChartVisualy(item,id){

      if(item.attr("product-id") == id){
          item.parent().remove();
      };
      if($("#container-items").children().length == 0){
          $("#total-drop").css("display","none");
          $("#nothing-in-chart").css("display","block");

      }

      let num = parseInt($("#num-product").text());

      $("#num-product").text(num-1);


}

function addEventDelete(){
    $(".delete").click(function (e){
        e.preventDefault();

        var id_product = $(this).parent().attr("id");

        if(isLogedIn){
            RemoveItemInDataBase(id_product);
            DeleteItemInChartVisualy($(this),id_product);

        }else{
            DeleteItemInChartVisualy($(this),id_product);
            RemoveItemInLocalStorage(id_product);

        }
    })
}

function WriteMoney(total){
    if(total == 0) return 0;
    total = total.toString();

    total = total.split("");
    total = total.reverse();
    var result = [];
    for(let i =0 ; i<total.length; i++){
        if(i % 3 == 0 && i != 0){
            result.push(".");
        }
        result.push(total[i]);
    }
    totalString = ""
    result.reverse();
    result.forEach(e => totalString += e);


    return totalString;
}
window.onload = () => {
    //addEventDelete()

}



//END MY JS CODE



(function ($) {





	"use strict";

	// Sticky nav
	var $headerStick = $('.Sticky');
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 80) {
			$headerStick.addClass("sticky_element");
		} else {
			$headerStick.removeClass("sticky_element");
		};
	});

	// Menu Categories
	$(window).resize(function () {
		if ($(window).width() >= 768) {
			$('a[href="#"]').on('click', function (e) {
				e.preventDefault();
			});
			$('.categories').addClass('menu');
			$('.menu ul > li').on('mouseover', function (e) {
				$(this).find("ul:first").show();
				$(this).find('> span a').addClass('active');
			}).on('mouseout', function (e) {
				$(this).find("ul:first").hide();
				$(this).find('> span a').removeClass('active');
			});
			$('.menu ul li li').on('mouseover', function (e) {
				if ($(this).has('ul').length) {
					$(this).parent().addClass('expanded');
				}
				$('.menu ul:first', this).parent().find('> span a').addClass('active');
				$('.menu ul:first', this).show();
			}).on('mouseout', function (e) {
				$(this).parent().removeClass('expanded');
				$('.menu ul:first', this).parent().find('> span a').removeClass('active');
				$('.menu ul:first', this).hide();
			});
		} else {
			$('.categories').removeClass('menu');
		}
	}).resize();

	// Mobile Mmenu
	var $menu = $("#menu").mmenu({
		"extensions": ["pagedim-black"],
		counters: true,
		keyboardNavigation: {
			enable: true,
			enhance: true
		},
		navbar: {
			title: 'MENU'
		},
		offCanvas: {
		  pageSelector: "#page"
	   },
		navbars: [{position:'bottom',content: ['<a href="#0">© 2020 Allaia</a>']}]},
		{
		// configuration
		clone: true,
		classNames: {
			fixedElements: {
				fixed: "menu_fixed"
			}
		}
	});

	// Menu
	$('a.open_close').on("click", function () {
		$('.main-menu').toggleClass('show');
		$('.layer').toggleClass('layer-is-visible');
	});
	$('a.show-submenu').on("click", function () {
		$(this).next().toggleClass("show_normal");
	});
	$('a.show-submenu-mega').on("click", function () {
		$(this).next().toggleClass("show_mega");
	});

	$('a.btn_search_mob').on("click", function () {
		$('.search_mob_wp').slideToggle("fast");
	});

	// Carousel product page
	$('.prod_pics').owlCarousel({
		items: 1,
		loop: false,
		margin: 0,
		dots:true,
		lazyLoad:true,
		nav:false
	});

	// Carousel
	$('.products_carousel').owlCarousel({
		center: false,
		items: 2,
		loop: false,
		margin: 10,
		dots:false,
		nav: true,
		lazyLoad: true,
        navText: ["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"],
		responsive: {
			0: {
				nav: false,
				dots:true,
				items: 2
			},
			560: {
				nav: false,
				dots:true,
				items: 3
			},
			768: {
				nav: false,
				dots:true,
				items: 4
			},
			1024: {
				items: 4
			},
			1200: {
				items: 4
			}
		}
	});

	// Carousels
	$('.carousel_centered').owlCarousel({
		center: true,
		items: 2,
		loop: true,
		margin: 10,
		responsive: {
			0: {
				items: 1,
				dots:false
			},
			600: {
				items: 2
			},
			1000: {
				items: 4
			}
		}
	});

	// Carousel brands
	$('#brands').owlCarousel({
		autoplay:true,
		items: 2,
		loop: true,
		margin: 10,
		dots:false,
		nav:false,
		lazyLoad: true,
		autoplayTimeout: 3000,
		responsive: {
			0: {
				items: 3
			},
			767: {
				items: 4
			},
			1000: {
				items: 6
			},
			1300: {
				items: 8
			}
		}
	});

	// Countdown offers
	$('[data-countdown]').each(function() {
	  var $this = $(this), finalDate = $(this).data('countdown');
	  $this.countdown(finalDate, function(event) {
		$this.html(event.strftime('%DD %H:%M:%S'));
	  });
	});

	// Lazy load
	var lazyLoadInstance = new LazyLoad({
	    elements_selector: ".lazy"
	});

	// Jquery select
	$('.custom-select-form select').niceSelect();

    // Product page color select
	$(".color").on('click', function () {
		$(".color").removeClass("active");
		$(this).addClass("active");
	});

	/* Input incrementer*/
	$(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
	$(".button_inc").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
	});

	/* Cart dropdown */
	$('.dropdown-cart, .dropdown-access').hover(function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(300);
	}, function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(300);
	});

	/* Cart Dropdown Hidden From tablet */
	$(window).bind('load resize', function () {
		var width = $(window).width();
		/*if (width <= 768) {
			$('a.cart_bt, a.access_link').removeAttr("data-toggle", "dropdown")
		} else {
			$('a.cart_bt,a.access_link').attr("data-toggle", "dropdown")
		}*/
	});

	// Opacity mask
	$('.opacity-mask').each(function(){
		$(this).css('background-color', $(this).attr('data-opacity-mask'));
	});

	/* Animation on scroll */
	new WOW().init();

	// Forgot Password
	$("#forgot").on("click", function () {
		$("#forgot_pw").fadeToggle("fast");
	});

	// Top panel on click: add to cart, search header
	var $topPnl = $('.top_panel');
	var $pnlMsk = $('.layer');

	$('.btn_add_to_cart a').on('click', function(){
		$topPnl.addClass('show');
		$pnlMsk.addClass('layer-is-visible');
	});
	$('a.search_panel').on('click', function(){
		$topPnl.addClass('show');
		$pnlMsk.addClass('layer-is-visible');
	});
	$('a.btn_close_top_panel').on('click', function(){
		$topPnl.removeClass('show');
		$pnlMsk.removeClass('layer-is-visible');
	});

	//Footer collapse
	var $headingFooter = $('footer h3');
	$(window).resize(function() {
        if($(window).width() <= 768) {
      		$headingFooter.attr("data-toggle","collapse");
        } else {
          $headingFooter.removeAttr("data-toggle","collapse");
        }
    }).resize();
	$headingFooter.on("click", function () {
		$(this).toggleClass('opened');
	});

	/* Footer reveal */
	if ($(window).width() >= 1024) {
		$('footer.revealed').footerReveal({
		shadow: false,
		opacity:0.6,
		zIndex: 1
	});
	};

	// Scroll to top
	var pxShow = 800; // height on which the button will show
	var scrollSpeed = 500; // how slow / fast you want the button to scroll to top.
	$(window).scroll(function(){
	 if($(window).scrollTop() >= pxShow){
		$("#toTop").addClass('visible');
	 } else {
		$("#toTop").removeClass('visible');
	 }
	});
	$('#toTop').on('click', function(){
	 $('html, body').animate({scrollTop:0}, scrollSpeed);
	 return false;
	});

	// Tooltip
	$(window).resize(function() {
        if($(window).width() <= 768) {
      		$('.tooltip-1').tooltip('disable');
        } else {
         $('.tooltip-1').tooltip({html: true});
        }
    }).resize();

    // Modal Sign In
	$('#sign-in').magnificPopup({
		type: 'inline',
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>',
		mainClass: 'my-mfp-zoom-in'
	});

	// Image popups
	$('.magnific-gallery').each(function () {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
            preloader: true,
			gallery: {
				enabled: true
			},
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function () {
					// just a hack that adds mfp-anim class to markup
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			closeOnContentClick: true,
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});
	});

	// Popup up
    setTimeout(function () {
        $('.popup_wrapper').css({
            "opacity": "1",
            "visibility": "visible"
        });
        $('.popup_close').on("click", function () {
            $(".popup_wrapper").fadeOut(300);
        })
    }, 1500);


})(window.jQuery);
