

        @foreach($data as $product)
            @if(isset($best_seler) && $best_seler)
                <div class="col-12 col-md-6 col-xl-3">
            @elseif(Route::current()->getName() == 'home' || Route::current()->getName() == 'logout' )
                <div class="item">
            @else
                <div class="cards col-12 col-md-4 mb-5">
            @endif
                <div class="grid_item">


                    <figure>
                        <a>
                            <img class="img-fluid lazy" src="{{asset("asset/img/".$product->src)}}" data-src="{{asset("asset/img/".$product->src)}}" alt="{{$product->name}}">
                        </a>
                        @if($product->amount > 0)
                            <div data-countdown="{{ date("Y/m/d",strtotime($product->date_end))}}" class="countdown">{{ strtotime($product->date_end) - strtotime(date("Y-m-d"))  }}</div>
                        @endif
                    </figure>
                    <a href="*">
                        <h3>{{ucfirst($product->name)}}</h3>
                    </a>
                <div class="price_box">


                        @if($product->amount > 0)


                            <span class="old_price"> {{$product->price}} RSD </span><br/>

                            <span class="new_price">{{WriteMoney((int)($product->price - ($product->price * $product->amount / 100)))}} RSD</span></br>

                            <span class="ribbon off">&nbsp;-{{$product->amount ."%"}}</span>
                        @else
                        <span class="new_price">{{WriteMoney((float)$product->price)}}RSD</span>

                       @endif


                    <?php /*
                        <span>color:    @foreach($product->Colors as $color) {{$color->color}}, @endforeach</span><br/>
                        <span>       size: @foreach($product->Sizes as $size) {{$size->size}}@endforeach</span>
                    */?>
                    </div>
                    <ul>
                      <!--
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                       -->
                        <li><a href="#0" class="tooltip-1 add-to-cart" data-price-id="{{$product->id}}" data-product-id="{{$product->id}}" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->

        </div>
            @endforeach
        <!-- /col -->


