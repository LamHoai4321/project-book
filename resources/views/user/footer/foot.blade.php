<!--jQuery-->
<script src="{{ asset('user/js/jquery-2.2.3.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$("#myModal").modal();
		});
	</script>
	<!-- // modal -->

	<!--search jQuery-->
	<script src="{{ asset('user/js/modernizr-2.6.2.min.js') }}"></script>
	<script src="{{ asset('user/js/classie-search.js') }}"></script>
	<!--<script src="{{ asset('user/js/demo1-search.js') }}"></script> -->
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="{{ asset('user/js/minicart.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>

	<script>
		$(function(){
  			loadajaxnumcart();
		});	
		function loadajaxnumcart(){
			$.ajax({
              url:"{{route('user.getNumCart')}}",
              method:"GET",
        
              success:function(data){
			
                $('.circle-count').html(data);
              }
             });
		}
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>

	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<!--close-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!--//close-->
	<!-- carousel -->
	<!-- price range (top products) -->
	<script src="{!! asset('user/js/jquery-ui.js') !!}"></script>
		<script>
			//<![CDATA[
			$(window).load(function () {
				var max = $("#end_price").val();
				var min = $("#start_price").val();
				var max_range = $("#end_price_range").val();
				var min_range = $("#start_price_range").val();
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: max_range,
					values: [min, max],
					slide: function (event, ui) {
						$("#amount").val( ui.values[0] +" VND" + " - " + ui.values[1]+ " VND");
						$("#start_price").val(ui.values[0]);
						$("#end_price").val(ui.values[1]);
					}
				});
				$("#amount").val( $("#slider-range").slider("values", 0)+" VND" + " - " + $("#slider-range").slider("values", 1)+ " VND" );

			}); //]]>
		</script>
	<!--// Count-down -->
	<script src="{{ asset('user/js/owl.carousel.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->
		<!-- single -->
		<script src="{!! asset('user/js/imagezoom.js') !!}"></script>
		<!-- single -->
		<!-- script for responsive tabs -->
		<script src="{!! asset('user/js/easy-responsive-tabs.js') !!}"></script>
		<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
		</script>
		<!-- FlexSlider -->
		<script src="{!! asset('user/js/jquery.flexslider.js') !!}"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider1').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->

	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->
  <script src="{{ asset('user/js/move-top.js') }}"></script>
    <script src="{{ asset('user/js/easing.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear'
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

	<script src="{{ asset('user/js/bootstrap.js') }}"></script>
	<!-- js file -->
	<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "110867918123999");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "110867918123999");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
   <!-- Messenger Plugin chat Code -->
   <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "110867918123999");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>
<div style ="">


<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
	FB.init({
	  xfbml            : true,
	  version          : 'v12.0'
	});
  };

  (function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
	fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<script>
			function saveSearch(){
				$('#form-search').submit();
			}
</script>
<script type="text/javascript">
    $('#keywords').keyup(function(){
        var query = $(this).val();
     // alert(query);
          if(query != '')
            {
             var _token = $('input[name="_token"]').val();

             $.ajax({
              url:"{{route('user.autocomplete_ajax')}}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#search_ajax').fadeIn();
                $('#search_ajax').html(data);
              }
             });

            }else{
                $('#search_ajax').fadeOut();
            }
    });

    $(document).on('click', '.li_search_ajax', function(){
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script>
<script>
        $("#submitBinhLuan").click(function(){
            $.ajax({
                url: "{{route('postComment')}}",
                type: 'POST',
                data:{
                    "_token":'{{csrf_token()}}',
                    "idKH": $("#inputid_user").val(),
                    "HoTen":$("#inputname").val(),
                    "idSach":$("#inputid_sanpham").val(),
                    "NoiDung":$("#inputcontent").val(),
                    "TrangThai":$("#inputtrangthai").val(),
                    },
             }).done(function(reponse){
				$("#inputcontent").val('');
				document.getElementById('duyetbinhluan').hidden = false;
                alertify.success(reponse);
             });
        });
    </script>
	<script>
		function AddCart(e){
			var soluong = $('#So_Luong_SP').val();

			if(soluong != null){
				var num = soluong;
			}

			else{
				var num = 1;
			}
                $.ajax({
                    url: "{{ route('account.addcart') }}",
                    type:'POST',
                    data: {Id_Sach: e, So_Luong: num, _token: '{{ csrf_token() }}' },
                    success: function(data) {
						toastr.success('Đã thêm sản phẩm vào giỏ hàng');
						$(".circle-count").html(data);
                    }
                });
		}
	</script>


<script>

	function UpdateCart(id, slmax){

			var soluong = $('#So_Luong' + id).val();
			if(soluong > 0 && soluong <= 50){
				var num = soluong;
				$.ajax({
                    url: "{{ route('account.updatecart') }}",
                    type:'POST',
                    data: {Id_Cart: id, So_Luong: num, _token: '{{ csrf_token() }}' },
                    success: function(data) {
						//alertify.alert(data);
						//$(".count").html(data);
						toastr.success('Cập nhật thành công');
						setTimeout(function(){ 	location.reload(); }, 2000);

						//aletify.success(data);
                    }
                });
			}
			else if(soluong>slmax){
				toastr.warning('Số lượng sản phẩm trong kho không đủ');
			}
			else if(soluong>50){
				toastr.warning('Số lượng không được vượt quá 50 sản phẩm');
			} else if(soluong==0){
            toastr.warning('Số lượng không được nhỏ hơn 0');
			}else if(soluong<0){
            toastr.warning('Số lượng không được là số âm');
           }

		}
		function DeleteCart(id){


                $.ajax({
                    url: "{{ route('account.cartdelete') }}",
                    type:'DELETE',
                    data: {Id_Cart: id, _token: '{{ csrf_token() }}' },
                    success: function(data) {
						//alertify.alert(data);
						//$(".count").html(data);
						toastr.success('Xoá sản phẩm thành công');
						setTimeout(function(){ 	location.reload(); }, 2000);


						//aletify.success(data);
                    }
                });
		}
	</script>
	<script>
		function Favorite(e){
                $.ajax({
                    url: "{{ route('user.accountheart') }}",
                    type:'POST',
                    data: {IdSach: e, _token: '{{ csrf_token() }}' },
                    success: function(data) {
						toastr.success('Thêm sản phẩm yêu thích thành công');
						setTimeout(function(){ 	location.reload(); }, 2000);
                    }
                });
		}
		function DeleteFavorite(e){
			var tablefavorite = document.getElementById("favorite-book");
                $.ajax({
                    url: "{{ route('user.deleteheart') }}",
                    type:'POST',
                    data: {id: e, _token: '{{ csrf_token() }}' },
                    success: function(data) {
						toastr.success('Xoá sách thành công...!');
						setTimeout(function(){ 	location.reload(); }, 2000);
                    }
                });
		}
		function InputCoupon(){
			$('#coupon-error').attr('hidden', true);
		}
		function CheckDiscount(){
			var code = $('#coupon').val();//lay code nhap
			var priceOriginal = parseInt($('#priceOriginal').val());//lay gia goc
			
			var feeship = parseInt($('#fee_ship').val());//lay phí ship
                $.ajax({
                    url: "{{ route('user.check-discount') }}",
                    type:'POST',
                    data: {code: code, priceOriginal: priceOriginal, _token: '{{ csrf_token() }}' },
                    success: function(data) {
						if(data == false){//mã code sai

							$('#coupon-error').attr('hidden', false); //hiện thẻ thông báo mã code sai
						}else{//mã code đúng
							console.log(data[0]);
							$('#idDiscount').val(data[0]);
							$('#div_num_discount').attr('hidden', false); //hiện thẻ số tiền giảm
							$('#num_discount').html(formatVND(data[1])+" VND");//hiện thẻ số tiền giảm
							$('#totalDiscount').val(formatVND(calculateMoney(data[1])));
							$('#total-money').html(formatVND(calculateMoney(data[1]))+" VND"); //tính toán lại tổng tiền (calculateMoney), fomart tiền (formatVND)
							disableCheckCoupon(); //không cho nhập tiếp. hiện nút hủy
						}

						//$('#num_discount').value = data;
                    },
					error: function (data) {
						
						console.log(data);

					}
					
                });
		}
		function calculateMoney(coupon){
			var priceOriginal = parseInt($('#priceOriginal').val()); //lấy giá gốc từ thẻ input ẩn
			var feeship = parseInt($('#fee_ship').val()); //lấy ship từ thẻ input ẩn
			var c = parseInt(coupon);
			return priceOriginal - c + feeship;

		}
		function formatVND(money){ //hàm format tiền
			var formatter = new Intl.NumberFormat('en-VN', {
				
				currency: 'VND',

				});

		return formatter.format(money).replace('VND', 'VND');
		}
		//hienj nut huy
		function disableCheckCoupon(){
			$('#btn_check_coupon').attr('hidden', true);  //ẩn nút kiểm tra code 
			$('#coupon').attr('disabled', true);  //k cho nhập thẻ input code
			$('#btn_remove_coupon').attr('hidden', false); //hiện nút hủy
		}
		//hien nut tinh
		function EnableCheckCoupon(){ //onClick của nut hủy
			$('#btn_check_coupon').attr('hidden', false); // hiện nút kiểm tra code
			$('#coupon').attr('disabled', false); // cho nhập thẻ input code
			$('#btn_remove_coupon').attr('hidden', true); //ẩn nút hủy
			$('#idDiscount').val(null);
			var priceOriginal = parseInt($('#priceOriginal').val());
			var feeship = parseInt($('#fee_ship').val()); //lấy ship từ thẻ input ẩn
			$('#total-money').html(formatVND(priceOriginal + feeship)); //set lại giá gốc
			$('#div_num_discount').attr('hidden', true); //ẩn thẻ số tiền giảm giá

		}

		</script>

<script>
	function InvalidMsg(textbox) {
		
    if (textbox.value === '') {
        textbox.setCustomValidity('Vui Lòng Nhập Địa Chỉ');
    } else {
       textbox.setCustomValidity('');
    }

    return true;
}
</script>
<script>
	$('#phone_checkout').keyup(function(){
                if($(this).hasClass('required')){
                    $(this).removeClass('required');
                    $(this).next().remove();
                }
            });

	$('#Dia_Chi').keyup(function(){
                if($(this).hasClass('required')){
                    $(this).removeClass('required');
                    $(this).next().remove();
                }
      });
        
	$('#btnPayment').click(function(){
		var checkPhone  = validatePhoneNumber($('#phone_checkout'));
		var checkAddress = validateAddress($('#Dia_Chi'));
		if(checkPhone && checkAddress){
			$('#formPayment').submit();
		}
	});
	 // kiểm tra số điện thoại
    function validatePhoneNumber(tel){
		
        // nếu đã kiểm tra rồi thì return
        if(tel.hasClass('required')){
            return;
        }

        var length = tel.val().length;
        var phoneno = /(((\+|)84)|0)(3|5|7|8|9)+([0-9]{8})\b/;
        var required;

        // chưa nhập
        if(length == 0){
            tel.addClass('required');
            required = $('<span class="required-text">Vui lòng nhập số diện thoại</span>');
            tel.after(required);
            return false;
        } else if(!tel.val().match(phoneno)){ // không đúng định dạng
            required = $('<span class="required-text">Số diện thoại không hợp lệ</span>');
            tel.addClass('required');
            tel.after(required);
            return false;
        }

        return true;
    
	}

	function validateAddress(address){
		// nếu đã kiểm tra rồi thì return
        if(address.hasClass('required')){
            return;
        }

		// if(address.val().length===0){
		// 	required = $('<span class="required-text">Vui lòng nhập địa chỉ</span>');
		// 	address.addClass('required');
        //     address.after(required);
        //     return false;
		// }
		//  if(((!address.val().includes('xã')&&!address.val().includes('Xã')) && (!address.val().includes('phường') && !address.val().includes('Phường')))){
		// 	required = $('<span class="required-text">Vui lòng nhập địa chỉ chính xác (số nhà...,đường..., xã/phường..., huyện/quận..., tỉnh/tp....)</span>');
        //    address.addClass('required');
		// 	address.after(required);
        //     return false;
		// }
		//  if( ((!address.val().includes('huyện')&&!address.val().includes('Huyện')) && (!address.val().includes('quận')&&!address.val().includes('Quận')))){
		// 	required = $('<span class="required-text">Vui lòng nhập địa chỉ chính xác (số nhà...,đường...,xã/phường..., huyện/quận..., tỉnh/tp....)</span>');
        //    address.addClass('required');
		// 	address.after(required);
        //     return false;
		// }
		// if(((!address.val().includes('tỉnh')&&!address.val().includes('Tỉnh')) && (!address.val().includes('tp') && !address.val().includes('TP')&& !address.val().includes('Tp')))){
		// 	required = $('<span class="required-text">Vui lòng nhập địa chỉ chính xác (số nhà...,đường...,xã/phường..., huyện/quận..., tỉnh/tp....)</span>');
        //    address.addClass('required');
		// 	address.after(required);
        //     return false;
		// }
		return true;
	}

	// 1113/14/16 a Huỳnh Tấn Phát, phường 9, quận 7, TPHCM
	// 1113/14/16 a Huỳnh Tấn Phát, Phường 9, Quận 7, tpHCM
	// xã Hòa Hiệp, huyện Tam Bình, tỉnh Vĩnh Long
	// Xã Hòa Hiệp, Huyện Tam Bình, Tỉnh Vĩnh Long
	
	$('#btnsave').click(function(){
		var checkPhone  = validatePhoneNumber($('#phone_checkout'));
		var checkAddress = validateAddress($('#Dia_Chi'));
		if(checkPhone && checkAddress){
			$('#save1').submit();
		}
	});
</script>
