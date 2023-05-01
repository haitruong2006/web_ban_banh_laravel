@extends('layout.master')

@section('content')

<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
                <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($loai_sp as $type)
							<li><a href="/cake/loai_san_pham/{{$type->id}}">{{$type->name}}</a></li>

                            @endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản Phẩm</h4>
							<div class="beta-products-details">
                                @isset($san_pham_theo_loai_count)
								<p class="pull-left">TÌm thấy {{$san_pham_theo_loai_count}} sản phẩm</p>
								<div class="clearfix"></div>
                                @endisset

							</div>
                            @isset($san_pham_theo_loai)
							<div class="row">
                                @foreach($san_pham_theo_loai as $san_pham)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="/cake/{{$san_pham->id}}"><img src="/product/{{$san_pham->image}}" alt="" style="max-width:700px; max-height:200px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$san_pham->name}}</p>

											<p class="single-item-price">
                                                @if($san_pham->promotion_price!=0)
                                                    <div class="flash_del">
                                                        <span class="flash-del">{{number_format($san_pham->unit_price)}}</span>
                                                        <span class="flash-sale">{{number_format($san_pham->promotion_price)}}</span>
                                                    </div>
                                                @else
                                                    <div class="flash_del">

                                                        <span class="flash-sale">{{number_format($san_pham->unit_price)}}</span>
                                                    </div>
                                                @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang', $san_pham->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="/cake/{{$san_pham->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                                @endforeach
							</div>
						</div> <!-- .beta-products-list -->

                        @endisset($san_pham_theo_loai)
						<div class="space50">&nbsp;</div>


					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
