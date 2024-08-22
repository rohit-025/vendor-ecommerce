  <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
  <!-- <input type="text" id="token" value="{{csrf_token()}}" hidden> -->
  <script>
      window.ga = function() {
          ga.q.push(arguments)
      };
      ga.q = [];
      ga.l = +new Date;
      ga('create', 'UA-XXXXX-Y', 'auto');
      ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>

  <!--====== Vendor Js ======-->
  <script src="{{asset('front/js/vendor.js')}}"></script>

  <!--====== jQuery Shopnav plugin ======-->
  <script src="{{asset('front/js/jquery.shopnav.js')}}"></script>

  <!--====== App ======-->
  <script src="{{asset('front/js/app.js')}}"></script>

  <!-- <script src="https://kendo.cdn.telerik.com/2021.3.914/js/jquery.min.js"></script> -->
  <script src="https://kendo.cdn.telerik.com/2021.3.914/js/kendo.all.min.js"></script>

  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

  <script>
    $( function() {
    
    $( "#main-search" ).autocomplete({
        
    source: function( request, response ) {
        debugger
   // Fetch data
   let term = request.term;
   $.ajax({
    url: "/search-auto",
    type: 'get',
    dataType: "json",
    data: {
     search:term 
    },
    success: function( data ) {
     response( data );
    }
    
   });
   
  },
  
  
  
  });
})
  </script>

  <!--====== Noscript ======-->
  <noscript>
      <div class="app-setting">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="app-setting__wrap">
                          <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                          <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </noscript>

  <script>
      cartAjax = (id) => {
        debugger
          $.ajax({
              type: "POST",
              url: "/cart",
              data: {
                  product: id, // < note use of 'this' here
                  quantity: 1,
                  "_token": "{{ csrf_token() }}",
              },
              success: function(result) {
                  // alert('ok');
                  Livewire.emit('itemAdded')
                  debugger
                  $("#add-to-cart").modal('show');
              },
              error: function(result) {
                  if (result.status == 401)
                  window.location.replace("/login");
                    //   $("#login-first").modal('show');
              }
          });
      }
      
      $('.cart').click(function(e) {
          let id = this.dataset.item
          cartAjax(id)
      })


      $('#cart').on("click","a.cart",(function(e) {
        let id = this.dataset.item
          cartAjax(id)
      }))

      $('.overview').click(function(e) {
          debugger
          id = this.dataset.item;
          $.ajax({
              type: "GET",
              url: "/product-by-id/" + id,
              success: function(result) {
                  // alert('ok');
                  debugger

                  $("#prod-name").text(result.product.name);
                  (!!result.product.sale_price) ? $("#prod-price").text(result.product.sale_price): $("#prod-price").text(result.product.price);

                  let discount = (!!result.product.sale_price) ? (((result.product.price - result.product.sale_price) / result.product.price) * 100) + " " + '% Off' : '';

                  $('#prod-discount').text(discount)

                  let discountedPrice = (!!result.product.sale_price) ? result.product.price : '';

                  $('#prod-discounted-price').text(discountedPrice)

                  $('#prod-short-description').text(result.product.description);

                  let stock = (result.product.quantity > 10) ? '<span class="pd-detail__stock">' + result.product.quantity + ' in stock</span>' : '<span class="pd-detail__left">' + result.product.quantity + ' left</span>'

                  $('#prod-stock').html(stock)

                  let notify = (result.product.quantity == 0) ? '<div class="pd-detail__inline"><span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i><a href="">Email me When the price drops</a><span class="pd-detail__click-count"></span></span></div>' : '<div></div>'


                  $('#prod-email').html(notify);

                  let cover = (!!result.product.cover) ? '<div><img class="u-img-fluid" src="' + result.product.cover + '"></div>' : '<div><img class="u-img-fluid" src=' + "/images/product/product-d-1.jpg" + '></div>'



                  let img = cover;

                  result.images.forEach((item) => {
                      img = img + '<div><img class="u-img-fluid" src="' + item.src + '"></div>'
                  })

                  $('#prod-cover').html('<div id="js-product-detail-modal">' + img + '</div>')

                  $('#prod-cover-thumb').html('<div id="js-product-detail-modal-thumbnail">' + img + '</div>')

                  let cart = (result.product.quantity > 0) ? '<a href="#" class="btn btn--e-brand-b-2 cart" data-item=' + result.product.id + '>Add to Cart</a>' : '<div>Out of Stock</div>'

                  $('#cart').html(cart);

                  $('#js-product-detail-modal').slick({
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      infinite: false,
                      arrows: false,
                      dots: false,
                      fade: true,
                      asNavFor: $('#js-product-detail-modal-thumbnail')
                  });

                  $('#js-product-detail-modal-thumbnail').slick({
                      slidesToShow: 4,
                      slidesToScroll: 1,
                      infinite: false,
                      arrows: true,
                      dots: false,
                      focusOnSelect: true,
                      asNavFor: $('#js-product-detail-modal'),
                      prevArrow: '<div class="pt-prev"><i class="fas fa-angle-left"></i>',
                      nextArrow: '<div class="pt-next"><i class="fas fa-angle-right"></i>',
                      responsive: [{
                              breakpoint: 1200,
                              settings: {
                                  slidesToShow: 4
                              }
                          },
                          {
                              breakpoint: 992,
                              settings: {
                                  slidesToShow: 3
                              }
                          },
                          {
                              breakpoint: 576,
                              settings: {
                                  slidesToShow: 2
                              }
                          }
                      ]
                  });
                  // Hook into Bootstrap shown event and manually trigger 'resize' event
                  // so that Slick recalculates the widths
                  $('#quick-look').on('shown.bs.modal', function() {
                      $('#js-product-detail-modal').resize();
                  });


                  $("#quick-look").modal('show');
              },
              error: function(result) {
                  if (result.status == 401)
                      $("#login-first").modal('show');
              }
          });
      })






      window.onscroll = function() {
          myFunction()
      };

      var navbar = document.getElementById("navbar");
      var sticky = navbar.offsetTop;

      function myFunction() {
          if (window.pageYOffset >= sticky) {
              navbar.classList.add("sticky")
          } else {
              navbar.classList.remove("sticky");
          }
      }
      // $('.has-dropdown > ul').toggle("display", "block", "display", "none");


      $(".addCls").click(function() {
          $(".has-dropdown > ul").toggle("display", "block");
          $(".has-dropdown > ul").toggle("display", "none");
      });
  </script>

  <script>
      var openFlag = true;
      $("#datepicker").kendoDatePicker({
          depth: "month",
          start: "year",
          animation: false,
          min: new Date(2017, 0, 1),
          max: new Date(2017, 11, 31),
          footer: "#: kendo.toString(data, 'm') #",
          format: "MM dd",
          value: new Date(),
          open: function(e) {
              var dp = e.sender;
              var calendar = dp.dateView.calendar;

              if (openFlag) {
                  calendar.setOptions({
                      animation: false
                  });
                  openFlag = false;
                  calendar.navigateUp();
              }


              if (calendar.view().name === "year") {
                  calendar.element.find(".k-header").addClass("k-hidden");
              };

              if (calendar.view().name === "date") {
                  calendar.element.find(".k-header").addClass("k-hidden");
              };

              calendar.bind("navigate", function(e) {
                  var cal = e.sender;
                  var view = cal.view();

                  if (view.name === "year") {
                      cal.element.find(".k-header").addClass("k-hidden");
                  } else {
                      var navFast = $(".k-nav-fast");

                      var dsa = cal.element.find(".k-header").removeClass("k-hidden");
                      navFast[0].innerText = navFast[0].innerText.slice(0, -5);
                  }

              });
          },
          close: function(e) {
              var calendar = e.sender.dateView.calendar;

              calendar.unbind("navigate");
              calendar.element.find(".k-header").removeClass("k-hidden");
          }
      });
  </script>