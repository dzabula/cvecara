

    @foreach($data['products'] as $e)

        <tr id="{{$e->id}}">
            <td class="column-with-img">
                <div class="thumb_cart">
                    <img src="{{asset("asset/img/".$e->src)}}" data-src="{{asset("asset/img/".$e->src)}}" class="lazy" alt="Image">
                </div>
            </td>
            <td>
                <span class="item_cart">{{ucfirst($e->name)}}</span>
            </td>
            <td>
                <strong>{{WriteMoney((float)$e->price[0]->price)}} din.</strong>
            </td>
            <td>
                <strong>{{WriteMoney((float)$e->price[0]->price)}} din.</strong>
            </td>
            <td>
                <strong>{{WriteMoney((float)$e->price[0]->price)}} din.</strong>
            </td>
            <td>
                <div class="numbers-row">
                    <input type="text" value="{{$e->quantity}}" id="quantity_1" data-id="{{$e->id}}" class="quantity qty2" name="quantity_1">


                </div>
            </td>
            <td>
                <strong id="sum-price">{{WriteMoney($e->price[0]->price * $e->quantity)}} din.</strong>
            </td>

            <td class="options">
                <a href="#" class="delete" data-id="{{$e->id}}"><i class="ti-trash"></i></a>
            </td>
        </tr>
    @endforeach



