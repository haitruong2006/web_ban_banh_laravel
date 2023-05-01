@if($newCart != null)
     <p>ok</p>


<div class="cart-item">
    <div class="media">
        @foreach($newCart->products as $item)
        <a class="pull-left" href="#"><img src="/product/{{$item['productInfo']->image}}" alt=""></a>

        <div class="media-body">
            <span class="cart-item-title">{{$item['quanty']}}</span>
            <span class="cart-item-options">{{$item['productInfo']->name}}</span>
            <span class="cart-item-amount">{{$item['quanty']}}*<span>{{ number_format($item['productInfo']->promotion_price) }}</span></span>
        </div>
        @endforeach
    </div>
</div>
<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{ number_format($newCart->totalPrice) }}</span></div>
<div class="clearfix"></div>

@endif
