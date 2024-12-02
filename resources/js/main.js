/**
 * selectImages
 * preloader
 * Scroll process
 * Button Quantity
 * Delete file
 * Go Top
 * color swatch product
 * change value
 * footer accordion
 * close announcement bar
 * sidebar mobile
 * tabs
 * flatAccordion
 * button wishlist
 * button loading
 * variant picker
 * switch layout
 * item checkbox
 * infinite scroll
 * stagger wrap
 * filter
 * modal second
 * header sticky
 * header change background
 * img group
 * contact form
 * subscribe mailchimp
 * auto popup
 * RTL

 */


(function ($) {
  "use strict";

  var isMobile = {
    Android: function () {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
      return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
      return (
        isMobile.Android() ||
        isMobile.BlackBerry() ||
        isMobile.iOS() ||
        isMobile.Opera() ||
        isMobile.Windows()
      );
    },
  };

  /* selectImages
  -------------------------------------------------------------------------------------*/
  var selectImages = function () {
    if ($(".image-select").length > 0) {
      const selectIMG = $(".image-select");
      selectIMG.find("option").each((idx, elem) => {
        const selectOption = $(elem);
        const imgURL = selectOption.attr("data-thumbnail");
        if (imgURL) {
          selectOption.attr(
            "data-content",
            "<img src='%i'/> %s"
              .replace(/%i/, imgURL)
              .replace(/%s/, selectOption.text())
          );
        }
      });
      selectIMG.selectpicker();
    }
  };

  /* preloader
  -------------------------------------------------------------------------------------*/
  const preloader = function () {
    if ($("body").hasClass("preload-wrapper")) {
      setTimeout(function () {
        $(".preload").fadeOut("slow", function () {
          $(this).remove();
        });
      }, 100);
    }
    
  };

  /* Scroll process
  -------------------------------------------------------------------------------------*/
  var scrollProgress = function () {
    $(".scroll-snap").on("scroll", function () {
      var val = $(this).scrollLeft();
      $(".value-process").css("width", `max(30%,${val}%)`);
    });
  };

  /* Button Quantity
  -------------------------------------------------------------------------------------*/
  var btnQuantity = function () {
    $(".minus-btn").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var $input = $this.closest("div").find("input");
      var value = parseInt($input.val());

      if (value > 1) {
        value = value - 1;
      }
      $input.val(value);
    });

    $(".plus-btn").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var $input = $this.closest("div").find("input");
      var value = parseInt($input.val());

      if (value > -1) {
        value = value + 1;
      }
      $input.val(value);
    });
  };

  /* Delete file 
  -------------------------------------------------------------------------------------*/
  var deleteFile = function (e) {
    $(".remove").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      $this.closest(".file-delete").remove();
    });

    $('.tf-compapre-button-clear-all').on("click", function (e) {
      $(".tf-compare-item").remove();
    });
    $(".tf-compare-item .icon").on("click", function (e) {
      var $this = $(this);
      $this.closest(".tf-compare-item").remove();
    });
    

  };

  /* Go Top
  -------------------------------------------------------------------------------------*/
  var goTop = function () {
    if ($("div").hasClass("progress-wrap")) {
      var progressPath = document.querySelector(".progress-wrap path");
      var pathLength = progressPath.getTotalLength();
      progressPath.style.transition = progressPath.style.WebkitTransition =
        "none";
      progressPath.style.strokeDasharray = pathLength + " " + pathLength;
      progressPath.style.strokeDashoffset = pathLength;
      progressPath.getBoundingClientRect();
      progressPath.style.transition = progressPath.style.WebkitTransition =
        "stroke-dashoffset 10ms linear";
      var updateprogress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
      };
      updateprogress();
      $(window).scroll(updateprogress);
      var offset = 200;
      var duration = 0;
      jQuery(window).on("scroll", function () {
        if (jQuery(this).scrollTop() > offset) {
          jQuery(".progress-wrap").addClass("active-progress");
        } else {
          jQuery(".progress-wrap").removeClass("active-progress");
        }
      });
      jQuery(".progress-wrap").on("click", function (event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, duration);
        return false;
      });
    }
  };

  /* color swatch product
  -------------------------------------------------------------------------*/
  var swatchColor = function () {
    if ($(".card-product").length > 0) {
      $(".color-swatch").on("click, mouseover", function () {
        var swatchColor = $(this).find("img").attr("src");
        var imgProduct = $(this).closest(".card-product").find(".img-product");
        imgProduct.attr("src", swatchColor);
        $(this)
          .closest(".card-product")
          .find(".color-swatch.active")
          .removeClass("active");

        $(this).addClass("active");
      });
    }
  };

  /* change value
  ------------------------------------------------------------------------------------- */
  var changeValue = function () {
    if ($(".tf-dropdown-sort").length > 0) {
      $(".select-item").click(function (event) {
        $(this)
          .closest(".tf-dropdown-sort")
          .find(".text-sort-value")
          .text($(this).find(".text-value-item").text());

        $(this)
          .closest(".dropdown-menu")
          .find(".select-item.active")
          .removeClass("active");

        $(this).addClass("active");
      });
    }
  };

  /* footer accordion
  -------------------------------------------------------------------------*/
  var footer = function () {
    var args = { duration: 250 };
    $(".footer-heading-moblie").on("click", function () {
      $(this).parent(".footer-col-block").toggleClass("open");
      if (!$(this).parent(".footer-col-block").is(".open")) {
        $(this).next().slideUp(args);
      } else {
        $(this).next().slideDown(args);
      }
    });
  };

  /* close announcement bar
  -------------------------------------------------------------------------*/
  var closeAnnouncement = function () {
    $(".close-announcement-bar").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var $height = $(".announcement-bar").height() + "px";
      $this.closest(".announcement-bar").css("margin-top", `-${$height}`);

      $(".announcement-bar").fadeOut("slow", function () {
        $this.closest(".announcement-bar").remove();
      });
    });
  };

  /* range
  -------------------------------------------------------------------------*/
  var rangePrice = function(){
    
    $(".range-min, .range-max").on("input change", function () {
      var selectedMinPrice = $(".range-min").val() ? parseFloat($(".range-min").val()) : 500;
      var selectedMaxPrice = $(".range-max").val() ? parseFloat($(".range-max").val()) : 50000;
  
     
      //console.log('selectedMinPrice', selectedMinPrice, 'selectedMaxPrice', selectedMaxPrice);
  
      
      $(".min-price").text(`${selectedMinPrice}`);
      $(".max-price").text(`${selectedMaxPrice}`);
  
      
    });

  }

  /* sidebar mobile
  -------------------------------------------------------------------------*/
  var sidebarMobile = function () {
    if ($(".wrap-sidebar-mobile,.wrap-sidebar-account").length > 0) {
      var sidebar = $(".wrap-sidebar-mobile,.wrap-sidebar-account").html();
      $(".sidebar-mobile-append").append(sidebar);
      // $(".wrap-sidebar-mobile").remove();
    }
  };

  /* tabs
  -------------------------------------------------------------------------*/
  var tabs = function () {
    $(".widget-tabs").each(function () {
      $(this)
        .find(".widget-menu-tab")
        .children(".item-title")
        .on("click", function () {
          var liActive = $(this).index();
          var contentActive = $(this)
            .siblings()
            .removeClass("active")
            .parents(".widget-tabs")
            .find(".widget-content-tab")
            .children()
            .eq(liActive);
          contentActive.addClass("active").fadeIn("slow");
          contentActive.siblings().removeClass("active");
          $(this)
            .addClass("active")
            .parents(".widget-tabs")
            .find(".widget-content-tab")
            .children()
            .eq(liActive);
        });
    });
  };

  /* flatAccordion
  -------------------------------------------------------------------------*/
  var flatAccordion = function (class1, class2) {
    var args = { duration: 200 };

    $(class2 + " .toggle-title.active")
      .siblings(".toggle-content")
      .show();
    $(class1 + " .toggle-title").on("click", function () {
      $(class1 + " " + class2).removeClass("active");
      $(this).closest(class2).toggleClass("active");

      if (!$(this).is(".active")) {
        $(this).toggleClass("active");
        $(this).next().slideToggle(args);
      } else {
        $(class1 + " " + class2).removeClass("active");
        $(this).toggleClass("active");
        $(this).next().slideToggle(args);
      }
    });
  };

  /* button wishlist
  -------------------------------------------------------------------------*/
  var btnWishlist = function () {
    if ($(".btn-icon-action").length) {
      $(".btn-icon-action").on("click", function (e) {
        $(this).toggleClass("active");
      });
    }
  };

  /* button loading
  -------------------------------------------------------------------------*/
  var btnLoading = function () {
    if ($(".tf-btn-loading").length) {
      $(".tf-btn-loading").on("click", function (e) {
        $(this).addClass("loading");
        var $this = $(this);
        setTimeout(function () {
          $this.removeClass("loading");
        }, 600);
      });
    }
  };

  /* variant picker
  -------------------------------------------------------------------------*/
  var variantPicker = function () {
    if ($(".variant-picker-item").length) {
      $(".variant-picker-item label").on("click", function (e) {
        $(this)
          .closest(".variant-picker-item")
          .find(".variant-picker-label-value")
          .text($(this).data("value"));
      });
    }
    if ($(".variant-picker-item").length) {
      $(".select-size").on("click", function (e) {
        $(this)
          .closest(".variant-picker-item")
          .find(".variant-picker-label-value")
          .text($(this).data("value"));
      });
    }
  };

  /* switch layout
  -------------------------------------------------------------------------*/
  var switchLayout = function () {
    if ($(".tf-control-layout").length > 0) {
      $(".tf-view-layout-switch").on("click", function () {
        var value = $(this).data("value-grid");
        $(".grid-layout").attr("data-grid", value);
        $(this)
          .closest(".tf-control-layout")
          .find(".tf-view-layout-switch.active")
          .removeClass("active");

        $(this).addClass("active");
      });
      if (matchMedia("only screen and (max-width: 1150px)").matches) {
        $(".tf-view-layout-switch.active").removeClass("active");
        $(".sw-layout-3").addClass("active");
      }
      if (matchMedia("only screen and (max-width: 768px)").matches) {
        $(".tf-view-layout-switch.active").removeClass("active");
        $(".sw-layout-2").addClass("active");
      }
    }
  };

  /* item checkbox
  -------------------------------------------------------------------------*/
  var itemCheckbox = function () {
    if ($(".item-has-checkox").length) {
      $(".item-has-checkox input:checkbox").on("click", function (e) {
        $(this).closest(".item-has-checkox").toggleClass("check");
      });
    }
  };

  /* infinite scroll
  -------------------------------------------------------------------------*/
  var infiniteScroll = function () {
    $(".fl-item").slice(0, 8).show();
    $(".fl-item2").slice(0, 8).show();
    $(".fl-item3").slice(0, 8).show();

    if ($(".scroll-loadmore").length > 0) {
      $(window).scroll(function () {
        if (
          $(window).scrollTop() >=
          $(document).height() - $(window).height()
        ) {
          setTimeout(() => {
            $(".fl-item:hidden").slice(0, 4).show();
            if ($(".fl-item:hidden").length == 0) {
              $(".view-more-button").hide();
            }
          }, 0);
        }
      });
    }
    if ($(".loadmore-item").length > 0) {
      $(".btn-loadmore").on("click", function () {
        setTimeout(() => {
          $(".fl-item:hidden").slice(0, 4).show();
          if ($(".fl-item:hidden").length == 0) {
            $(".view-more-button").hide();
          }
        }, 600);
      });
    }
    if ($(".loadmore-item2").length > 0) {
      $(".btn-loadmore2").on("click", function () {
        setTimeout(() => {
          $(".fl-item2:hidden").slice(0, 4).show();
          if ($(".fl-item2:hidden").length == 0) {
            $(".view-more-button2").hide();
          }
        }, 600);
      });
    }
    if ($(".loadmore-item3").length > 0) {
      $(".btn-loadmore3").on("click", function () {
        setTimeout(() => {
          $(".fl-item3:hidden").slice(0, 4).show();
          if ($(".fl-item3:hidden").length == 0) {
            $(".view-more-button3").hide();
          }
        }, 600);
      });
    }
  };
  /* stagger wrap
  -------------------------------------------------------------------------*/
  var staggerWrap = function () {
    if ($(".stagger-wrap").length) {
      var count = $(".stagger-item").length;
      // $(".stagger-item").addClass("stagger-finished");
      for (var i = 1, time = 0.2; i <= count; i++) {
        $(".stagger-item:nth-child(" + i + ")")
          .css("transition-delay", time * i + "s")
          .addClass("stagger-finished");
      }
    }
  };

  /* filter
  -------------------------------------------------------------------------*/
  var filterTab = function () {
    var $btnFilter = $('.tf-btns-filter').click(function() {
      if (this.id == 'all') {
        $('#parent > div').show();
      } else {
        var $el = $('.' + this.id).show();
        $('#parent > div').not($el).hide();
      }
      $btnFilter.removeClass('is--active');
      $(this).addClass('is--active');
    })
  };

  /* modal second
  -------------------------------------------------------------------------*/
  var clickModalSecond = function () {
    $(".btn-choose-size").click(function () {
      $("#find_size").modal("show");
    });
    $(".btn-show-quickview").click(function () {
      $("#quick_view").modal("show");
    });
    $(".btn-add-to-cart").click(function () {
      $("#shoppingCart").modal("show");
    });

    $(".btn-add-note").click(function () {
      $(".add-note").addClass("open");
    });
    $(".btn-add-gift").click(function () {
      $(".add-gift").addClass("open");
    });
    $(".btn-estimate-shipping").click(function () {
      $(".estimate-shipping").addClass("open");
    });
    $(".tf-mini-cart-tool-close ,.tf-mini-cart-tool-close .overplay").click(
      function () {
        $(".tf-mini-cart-tool-openable").removeClass("open");
      }
    );
  };



  /* header sticky
  -------------------------------------------------------------------------*/
  var headerSticky = function () {
    let didScroll;
    let lastScrollTop = 0;
    let delta = 5;
    let navbarHeight = $("header").outerHeight();
    $(window).scroll(function (event) {
      didScroll = true;
    });
    
    setInterval(function () {
      if (didScroll) {
        let st = $(this).scrollTop();

        // Make scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta) return;
        // If scrolled down and past the navbar, add class .nav-up.
        if (st > lastScrollTop && st > navbarHeight) {
          // Scroll Down
          $("header").css("top",`-${navbarHeight}px`)
        } else {
          // Scroll Up
          if (st + $(window).height() < $(document).height()) {
            $("header").css("top","0px");
          }
        }
        lastScrollTop = st;
        didScroll = false;
      }
    }, 250);
  };

  /* header change background
  -------------------------------------------------------------------------*/
  var headerChangeBg = function () {
    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 100) {
        $("header").addClass("header-bg");
      } else {
        $("header").removeClass("header-bg");
      }
    });
  }
   /* total cart
  -------------------------------------------------------------------------*/
  var totalPriceVariant = function () {

    var basePrice = parseFloat($(".price-on-sale").data("base-price")) || parseFloat($(".price-on-sale").text().replace("$", ""));
    var quantityInput = $(".quantity-product");
    

    $(".btn-increase").on("click", function () {
      var currentQuantity = parseInt(quantityInput.val());
      quantityInput.val(currentQuantity + 1);
      updateTotalPrice();
    });

    $(".btn-decrease").on("click", function () {
      var currentQuantity = parseInt(quantityInput.val());
      if (currentQuantity > 1) {
        quantityInput.val(currentQuantity - 1);
        updateTotalPrice();
      }
    });

    function updateTotalPrice() {
      var currentPrice = parseFloat($(".price-on-sale").text().replace("LKR", ""));
      var quantity = parseInt(quantityInput.val());
      var totalPrice = currentPrice * quantity;
      $(".total-price").text("LKR" + totalPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

  };

  /* scroll grid product
  ------------------------------------------------------------------------------------- */
  var scrollGridProduct = function(){

    var headerHeight = $("#header").outerHeight(); 
    var activeColorBtn = null; 
    $(".btn-grid-color").on("click", function () {
        var color = $(this).data("color");
        var target = $(".item-img-color[data-color='" + color + "']"); 
        $('html, body').animate({
            scrollTop: target.offset().top - headerHeight 
        }, 100);

        $(".btn-grid-color").removeClass("active");
        $(this).addClass("active");
        activeColorBtn = $(this); 
    });

    $(window).on("scroll", function () {
        var isActiveSet = false; 
        $(".item-img-color").each(function () {
            var targetTop = $(this).offset().top - headerHeight;
            if ($(window).scrollTop() >= targetTop && $(window).scrollTop() < (targetTop + $(this).outerHeight())) {
                var color = $(this).data("color");
                if (!isActiveSet && (activeColorBtn === null || activeColorBtn.data("color") !== color)) {
                    $(".btn-grid-color").removeClass("active");
                    $(".btn-grid-color[data-color='" + color + "']").addClass("active");
                    // $('.value-currentColor').text(color);
                }
                isActiveSet = true; 
            }
        });
        if (!isActiveSet && activeColorBtn !== null) {
            $(".btn-grid-color").removeClass("active");
            activeColorBtn.addClass("active");
        }
    });
  }

  /* contact form
  ------------------------------------------------------------------------------------- */
  var ajaxContactForm = function () {
    $("#contactform").each(function () {
      $(this).validate({
        submitHandler: function (form) {
          var $form = $(form),
            str = $form.serialize(),
            loading = $("<div />", { class: "loading" });

          $.ajax({
            type: "POST",
            url: $form.attr("action"),
            data: str,
            beforeSend: function () {
              $form.find(".send-wrap").append(loading);
            },
            success: function (msg) {
              var result, cls;
              if (msg == "Success") {
                result =
                  "Email Sent Successfully. Thank you, Your application is accepted - we will contact you shortly";
                cls = "msg-success";
              } else {
                result = "Error sending email.";
                cls = "msg-error";
              }
              $form.prepend(
                $("<div />", {
                  class: "flat-alert " + cls,
                  text: result,
                }).append(
                  $(
                    '<a class="close" href="#"><i class="icon icon-close2"></i></a>'
                  )
                )
              );

              $form.find(":input").not(".submit").val("");
            },
            complete: function (xhr, status, error_thrown) {
              $form.find(".loading").remove();
            },
          });
        },
      });
    }); // each contactform
  };

  var registerForm = function () {
    $("#register-form").validate({
      rules: {
          fname: {
              required: true,
              minlength: 2
          },
          lname: {
              required: true,
              minlength: 2
          },
          email: {
              required: true,
              email: true
          },
          phone: {
              required: true,
              phoneUS: true  // Use jQuery Validation's built-in phoneUS method or customize your own
          },
          password: {
              required: true,
              minlength: 6
          }
      },
      messages: {
          fname: {
              required: "Please enter your first name.",
              minlength: "Your first name must be at least 2 characters long."
          },
          lname: {
              required: "Please enter your last name.",
              minlength: "Your last name must be at least 2 characters long."
          },
          email: {
              required: "Please enter your email address.",
              email: "Please enter a valid email address."
          },
          phone: {
              required: "Please enter your phone number.",
              phoneUS: "Please enter a valid phone number."  // Customize phone validation if needed
          },
          password: {
              required: "Please enter a password.",
              minlength: "Your password must be at least 6 characters long."
          }
      },
      errorPlacement: function (error, element) {
          // Error messages will automatically appear under the relevant input field.
          error.insertAfter(element.next('label'));  // Place the error after the input field's label
      },
      submitHandler: function (form) {
          // Only submit the form if validation passes
          form.submit();  // This will trigger the actual form submission
      }
  });
  }

  //login validation
  var validateLoginForm = function () {
    $("#login-form").validate({
      rules: {
        email: {
          required: true,
          email: true 
        },
        password: {
          required: true,
          minlength: 6 
        }
      },
      messages: {
        email: {
          required: "Please enter your email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please enter your password",
          minlength: "Your password must be at least 6 characters long"
        }
      },
      errorElement: "div",  
      errorClass: "invalid-feedback",  
      highlight: function (element) {
        $(element).addClass("is-invalid");  
      },
      unhighlight: function (element) {
        $(element).removeClass("is-invalid");  
      },
      errorPlacement: function (error, element) {
        
        error.insertAfter(element);
      },
      submitHandler: function (form) {
        
        form.submit();
      }
    });
  };
  /* subscribe mailchimp
  ------------------------------------------------------------------------------------- */
  var ajaxSubscribe = {
    obj: {
      subscribeEmail: $("#subscribe-email"),
      subscribeButton: $("#subscribe-button"),
      subscribeMsg: $("#subscribe-msg"),
      subscribeContent: $("#subscribe-content"),
      dataMailchimp: $("#subscribe-form").attr("data-mailchimp"),
      success_message:
        '<div class="notification_ok">Thank you for joining our mailing list!</div>',
      failure_message:
        '<div class="notification_error">Error! <strong>There was a problem processing your submission.</strong></div>',
      noticeError: '<div class="notification_error">{msg}</div>',
      noticeInfo: '<div class="notification_error">{msg}</div>',
      basicAction: "mail/subscribe.php",
      mailChimpAction: "mail/subscribe-mailchimp.php",
    },

    eventLoad: function () {
      var objUse = ajaxSubscribe.obj;

      $(objUse.subscribeButton).on("click", function () {
        if (window.ajaxCalling) return;
        var isMailchimp = objUse.dataMailchimp === "true";

        // if (isMailchimp) {
        //   ajaxSubscribe.ajaxCall(objUse.mailChimpAction);
        // } else {
        //   ajaxSubscribe.ajaxCall(objUse.basicAction);
        // }
        ajaxSubscribe.ajaxCall(objUse.basicAction);
      });
    },

    ajaxCall: function (action) {
      window.ajaxCalling = true;
      var objUse = ajaxSubscribe.obj;
      var messageDiv = objUse.subscribeMsg.html("").hide();
      $.ajax({
        url: action,
        type: "POST",
        dataType: "json",
        data: {
          subscribeEmail: objUse.subscribeEmail.val(),
        },
        success: function (responseData, textStatus, jqXHR) {
          if (responseData.status) {
            objUse.subscribeContent.fadeOut(500, function () {
              messageDiv.html(objUse.success_message).fadeIn(500);
            });
          } else {
            switch (responseData.msg) {
              case "email-required":
                messageDiv.html(
                  objUse.noticeError.replace(
                    "{msg}",
                    "Error! <strong>Email is required.</strong>"
                  )
                );
                break;
              case "email-err":
                messageDiv.html(
                  objUse.noticeError.replace(
                    "{msg}",
                    "Error! <strong>Email invalid.</strong>"
                  )
                );
                break;
              case "duplicate":
                messageDiv.html(
                  objUse.noticeError.replace(
                    "{msg}",
                    "Error! <strong>Email is duplicate.</strong>"
                  )
                );
                break;
              case "filewrite":
                messageDiv.html(
                  objUse.noticeInfo.replace(
                    "{msg}",
                    "Error! <strong>Mail list file is open.</strong>"
                  )
                );
                break;
              case "undefined":
                messageDiv.html(
                  objUse.noticeInfo.replace(
                    "{msg}",
                    "Error! <strong>undefined error.</strong>"
                  )
                );
                break;
              case "api-error":
                objUse.subscribeContent.fadeOut(500, function () {
                  messageDiv.html(objUse.failure_message);
                });
            }
            messageDiv.fadeIn(500);
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert("Connection error");
        },
        complete: function (data) {
          window.ajaxCalling = false;
        },
      });
    },
  };

  /* auto popup
  ------------------------------------------------------------------------------------- */
  var autoPopup = function () {
    if($("body").hasClass("popup-loader")){
      if ($(".auto-popup").length > 0) {
        let showPopup = sessionStorage.getItem("showPopup");
        if (!JSON.parse(showPopup)) {
          setTimeout(function () {
            $(".auto-popup").modal('show');
          }, 3000);
        }
      }
      $(".btn-hide-popup").on("click", function () {
        sessionStorage.setItem("showPopup", true);
      });
    };

  };
  /* toggle control
  ------------------------------------------------------------------------------------- */
  var clickControl = function () {
    // var args = { duration: 500 };

    $(".btn-address").click(function () {
      $(".show-form-address").toggle();
    });
    $(".btn-hide-address").click(function () {
      $(".show-form-address").hide();
    });

    $(".btn-edit-address").click(function () {
      $(this).closest(".account-address-item").find(".edit-form-address").toggle();
    });
    $(".btn-hide-edit-address").click(function () {
      $(this).closest(".account-address-item").find(".edit-form-address").hide();
    });
  };
  /* RTL
  ------------------------------------------------------------------------------------- */
  var RTL = function () {
    if (localStorage.getItem("dir") === "rtl") {
      $("html").attr("dir", "rtl");
      $("body").addClass("rtl");
      $('#toggle-rtl').text('ltr');
      $(".tf-slideshow .tf-btn,.view-all-demo .tf-btn, .pagination-link, .pagination-item").find(".icon").removeClass("icon-arrow-right").addClass("icon-arrow-left");    
    } else {
      $("html").attr("dir", "ltr");
      $("body").removeClass("rtl");
      $('#toggle-rtl').text('rtl');      
      
    }
    $("#toggle-rtl").on("click", function() {
      if ($("html").attr("dir") === "rtl") {
        localStorage.setItem("dir", "ltr"); 
        $('#toggle-rtl').text('rtl');      

      } else {
        localStorage.setItem("dir", "rtl");
        $('#toggle-rtl').text('ltr');      
      }
      location.reload();
    });
  };


  /* hoverPin
  -------------------------------------------------------------------------*/
  var hoverPin = function () {
    if ($(".wrap-lookbook-hover").length) {
      $(".bundle-pin-item").on("mouseover", function () {
        $(".bundle-hover-wrap").addClass("has-hover");
        var $el = $('.' + this.id).show();
        $('.bundle-hover-wrap .bundle-hover-item').not($el).addClass("no-hover");
      });
      $(".bundle-pin-item").on("mouseleave", function () {
        $(".bundle-hover-wrap").removeClass("has-hover");
        $(".bundle-hover-item").removeClass("no-hover");
      });
    }
  };

    /* write-review
  ------------------------------------------------------------------------------------- */
  var writeReview = function () {

    if ($(".write-cancel-review-wrap").length > 0) {
      $(".btn-comment-review").click(function () {
        $(this).closest(".write-cancel-review-wrap").toggleClass("write-review");
      });
    }
   
  };


  //change my-account
  var changeMyAccount = function () {
    $(".my-account-nav-item").click(function(e) {
      e.preventDefault(); 

      
      $(".my-account-nav-item").removeClass("active");

      
      $(this).addClass("active");

      
      $(".dashboard").hide();
      $(".orders").hide();
      $(".account-details").hide();

      
      var target = $(this).text().toLowerCase().trim(); 
      switch (target) {
          case "dashboard":
              $(".dashboard").show();
              break;
          case "orders":
              $(".orders").show();
              break;
          case "address":
              $(".my-account-content.account-address").show();
              break;
          case "account details":
              $(".account-details").show();
              break;
          case "wishlist":
              $(".my-account-content.account-wishlist").show();
              break;
          case "logout":
              
              window.location.href = "/logout";
              break;
          default:
              $(".dashboard").show(); 
      }
  });

  
  $(".my-account-nav-item").first().trigger('click');
  }
    




  // Dom Ready
  $(function () {
    selectImages();
    btnQuantity();
    deleteFile();
    goTop();
    closeAnnouncement();
    preloader();
    sidebarMobile();
    tabs();
    flatAccordion(".flat-accordion", ".flat-toggle");
    flatAccordion(".flat-accordion1", ".flat-toggle1");
    swatchColor();
    changeValue();
    footer();
    btnWishlist();
    btnLoading();
    variantPicker();
    switchLayout();
    itemCheckbox();
    infiniteScroll();
    staggerWrap();
    clickModalSecond();
    scrollProgress();
    headerSticky();
    headerChangeBg();
    totalPriceVariant();
    scrollGridProduct();
    filterTab();
    writeReview();
    ajaxContactForm();
    ajaxSubscribe.eventLoad();
    autoPopup();
    rangePrice();
    clickControl();
    RTL();
    hoverPin();
    registerForm();
    validateLoginForm();
    changeMyAccount();
    //new WOW().init();
  });
})(jQuery);
