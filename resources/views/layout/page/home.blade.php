@extends('layout.master')


@section('content')

<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
                                    @foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/slide/{{$sl->image}}" data-src="/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
											</div>

						            </li>
                                    @endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->



                <div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy: {{$new_products_count}} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                            @isset($new_products_pgn)
							@foreach( $new_products_pgn  as $cake)
								<div class="col-sm-3">
									<div class="single-item">
                                        @if($cake->promotion_price > 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
										<div class="single-item-header">
											<a href="/cake/{{$cake->id}}"><img src="/product/{{$cake->image}}" alt="" style="max-width:700px; max-height:200px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$cake->name}}</p>
                                            <p class="single-item-price">
                                                @if($cake->promotion_price > 0)
                                                    <div class="flash_del">
                                                        <span class="flash-del">{{number_format($cake->unit_price)}}</span>
                                                        <span class="flash-sale">{{number_format($cake->promotion_price)}}</span>
                                                    </div>

                                                @else
                                                 <div class="flash_del">
                                                        <span class="flash-sale">{{number_format($cake->unit_price)}}</span>

                                                    </div>
                                                @endif
                                            </p>
										</div>

										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang', $cake->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="/cake/{{$cake->id}}" >Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>

                                        <!-- <div class="single-item-caption">
                                            <br>
                                            <a class="add-to-cart pull-left" href="{{ route('cake.addproducthead', $cake->id) }}"><i class="fa-regular fa-heart"></i></a>
											<a class="beta-btn primary" href="{{ route('cake.addproducthead',  $cake->id) }}" >Yêu thích <i class="fa-solid fa-heart"></i></a>
											<div class="clearfix"></div>
										</div> -->
									</div>
								</div>
								@endforeach


							</div>
                            <div class="row pager">

                                {{ $new_products_pgn -> links('pagination::bootstrap-4')}}
                            </div>
                            @endisset($new_products_pgn)
						</div> <!-- .beta-products-list -->




						<div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
                            <p class="pull-left">Tìm Thấy: {{$top_products_count}} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
                                @isset( $top_products_count)
                                @foreach( $top_products as $products_top)
								<div class="col-sm-3">
									<div class="single-item">
                                        @if($products_top->promotion_price > 0)
										    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
										<div class="single-item-header">
                                        <a href="/cake/{{$products_top->id}}"><img src="/product/{{$products_top->image}}" alt="" style="max-width:700px; max-height:200px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$products_top->name}}</p>
                                            <p class="single-item-price">
                                            @if($products_top->promotion_price!=0)
                                              <div class="flash_del">
                                                <span class="flash-del">{{number_format($products_top->unit_price)}}</span>
                                                <span class="flash-sale">{{number_format($products_top->promotion_price)}}</span>
                                              </div>

                                              @else
                                              <div class="flash_del">
                                                <span class="flash-sale">{{number_format($products_top->unit_price)}}</span>

                                              </div>
                                              @endif

											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="cake/addcart/{{$products_top->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="/cake/{{$products_top->id}}" >Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>


									</div>
								</div>
								@endforeach
							</div>
                            <div class="row pager">
                                {{ $top_products -> links('pagination::bootstrap-4')}}
                            </div>
                            @endisset( $top_products)
							<div class="space40">&nbsp;</div>

						</div> <!-- .beta-products-list -->






					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>



