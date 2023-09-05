<aside class="col-lg-3" id="sidebar_fixed">
    <div class="filter_col bg-light">
        <div class="inner_bt"><a href="#" class=""><i class="ti-close"></i></a></div>
        <div class="filter_type version_2">
            <h4><a href="#filter_1" data-toggle="collapse" class="closed">Kategorije</a></h4>
            <div class="collapse" id="filter_1">

                @foreach($data['categories_obj']->all() as $category)

                    @if($category->id_parent == null)

                        <li> {{$category->category}}
                            <ul class="pl-1">
                                @foreach($data['categories_obj']->all() as $i => $subcategory)

                                    @if($subcategory->id_parent != null && $category->id == $subcategory->id_parent)
                                        <li>
                                            <label class="container_check">{{$subcategory->category}} <small id="cat-num-{{$subcategory->id}}">{{count($subcategory->Products)}}</small>
                                                <input value="{{$subcategory->id}}" class="categories" id="cat-{{$subcategory->id}}" type="checkbox" @if(isset($data['single-category']) && ($data['single-category'] == $subcategory->id || $data['single-category'] == -1)) checked="checked" @endif >
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                <hr/>
                <ul>
                    <li>
                        <label class="container_check">Sve<small id="cat-num-all"></small>
                            <input value="0"  id="cat-0" type="checkbox"  @if(isset($data['single-category']) &&  $data['single-category'] == -1) checked="checked" @endif >
                            <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>

            </div>
            <!-- /filter_type -->
        </div>
        <!-- /filter_type -->
        <?php /*
        <div class="filter_type version_2">
            <h4><a href="#filter_2" data-toggle="collapse" class="closed">Boje</a></h4>
            <div class="collapse " id="filter_2">
                <ul>
                   @foreach($data['colors'] as $color)
                        <li>
                            <label class="container_check">{{$color->color}} <small>{{count($color->Products)}}</small>
                                <input class="colors" value="{{$color->id}}" id="size-{{$color->id}}" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                   @endforeach

                </ul>
            </div>
        </div>
        <!-- /filter_type -->
        <div class="filter_type version_2">
            <h4><a href="#filter_3" data-toggle="collapse" class="closed">Velicine</a></h4>
            <div class="collapse" id="filter_3">
                <ul>
                    @foreach($data['sizes'] as $size)
                        <li>
                            <label class="container_check">{{$size->size}} <small>{{count($size->Products)}}</small>
                                <input type="checkbox" class="sizes" value="{{$size->id}}" id="size-{{$size->id}}">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    */?>
        <!-- /filter_type -->
        <div class="filter_type version_2">
            <h4><a href="#filter_4" data-toggle="collapse" class="closed">Cena</a></h4>
            <div class="collapse" id="filter_4">
                <ul>
                    <div slider id="slider-distance">
                        <div>
                            <div inverse-left style="width:1%;"></div>
                            <div inverse-right style="width:99%;"></div>
                            <div range style="left:99%;right:1%;"></div>
                            <span thumb style="left:1%;"></span>
                            <span thumb style="left:99%;"></span>
                            <div sign style="left:1%;" class="opacity-100">
                                <span id="value-min">0</span>
                            </div>
                            <div sign style="left:95%;" class="opacity-100">
                                <span id="value-max">{{($data['max-price'])}}</span>
                            </div>
                        </div>
                        <input type="range" tabindex="0" value="0" max="{{$data['max-price']}}" min="0" step="{{$data['max-price']/20}}" id="min-price" oninput="
  this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
  var children = this.parentNode.childNodes[1].childNodes;
  children[1].style.width=value+'%';
  children[5].style.left=value+'%';
  children[7].style.left=value+'%';children[11].style.left=value+'%';
  children[11].childNodes[1].innerHTML=this.value;" />

                        <input type="range" tabindex="0" value="{{$data['max-price']}}" max="{{$data['max-price']}}" min="0" step="{{$data['max-price']/20}}" id="max-price" oninput="
  this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
  var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
  var children = this.parentNode.childNodes[1].childNodes;
  children[3].style.width=(100-value)+'%';
  children[5].style.right=(100-value)+'%';
  children[9].style.left=value+'%';children[13].style.left=value+'%';
  children[13].childNodes[1].innerHTML=this.value;" />
                    </div>
                    <!--CSS FOR PRICE RANGE-->
                    <style>


                        [slider] {
                            position: relative;
                            height: 14px;
                            border-radius: 10px;
                            text-align: left;
                            margin: 45px 0 10px 0;
                        }

                        [slider] > div {
                            position: absolute;
                            left: 13px;
                            right: 15px;
                            height: 14px;
                        }

                        [slider] > div > [inverse-left] {
                            position: absolute;
                            left: 0;
                            height: 14px;
                            border-radius: 10px;
                            background-color: #CCC;
                            margin: 0 7px;
                        }

                        [slider] > div > [inverse-right] {
                            position: absolute;
                            right: 0;
                            height: 14px;
                            border-radius: 10px;
                            background-color: #CCC;
                            margin: 0 7px;
                        }

                        [slider] > div > [range] {
                            position: absolute;
                            left: 0;
                            height: 14px;
                            border-radius: 14px;
                            background-color: #1ABC9C;
                        }

                        [slider] > div > [thumb] {
                            position: absolute;
                            top: -7px;
                            z-index: 2;
                            height: 28px;
                            width: 28px;
                            text-align: left;
                            margin-left: -11px;
                            cursor: pointer;
                            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
                            background-color: #FFF;
                            border-radius: 50%;
                            outline: none;
                        }

                        [slider] > input[type=range] {
                            position: absolute;
                            pointer-events: none;
                            -webkit-appearance: none;
                            z-index: 3;
                            height: 14px;
                            top: -2px;
                            width: 100%;
                            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
                            filter: alpha(opacity=0);
                            -moz-opacity: 0;
                            -khtml-opacity: 0;
                            opacity: 0;
                        }

                        div[slider] > input[type=range]::-ms-track {
                            -webkit-appearance: none;
                            background: transparent;
                            color: transparent;
                        }

                        div[slider] > input[type=range]::-moz-range-track {
                            -moz-appearance: none;
                            background: transparent;
                            color: transparent;
                        }

                        div[slider] > input[type=range]:focus::-webkit-slider-runnable-track {
                            background: transparent;
                            border: transparent;
                        }

                        div[slider] > input[type=range]:focus {
                            outline: none;
                        }

                        div[slider] > input[type=range]::-ms-thumb {
                            pointer-events: all;
                            width: 28px;
                            height: 28px;
                            border-radius: 0px;
                            border: 0 none;
                            background: red;
                        }

                        div[slider] > input[type=range]::-moz-range-thumb {
                            pointer-events: all;
                            width: 28px;
                            height: 28px;
                            border-radius: 0px;
                            border: 0 none;
                            background: red;
                        }

                        div[slider] > input[type=range]::-webkit-slider-thumb {
                            pointer-events: all;
                            width: 28px;
                            height: 28px;
                            border-radius: 0px;
                            border: 0 none;
                            background: red;
                            -webkit-appearance: none;
                        }

                        div[slider] > input[type=range]::-ms-fill-lower {
                            background: transparent;
                            border: 0 none;
                        }

                        div[slider] > input[type=range]::-ms-fill-upper {
                            background: transparent;
                            border: 0 none;
                        }

                        div[slider] > input[type=range]::-ms-tooltip {
                            display: none;
                        }

                        [slider] > div > [sign] {
                            width:40px !important;
                            opacity: 0;
                            position: absolute;
                            margin-left: -11px;
                            top: -39px;
                            z-index:3;
                            background-color: #1ABC9C;
                            color: #fff;
                            width: 28px;
                            height: 28px;
                            border-radius: 28px;
                            -webkit-border-radius: 28px;
                            align-items: center;
                            -webkit-justify-content: center;
                            justify-content: center;
                            text-align: center;
                        }

                        [slider] > div > [sign]:after {
                            position: absolute;
                            content: '';
                            left: 0;
                            border-radius: 16px;
                            top: 19px;
                            border-left: 14px solid transparent;
                            border-right: 14px solid transparent;
                            border-top-width: 16px;
                            border-top-style: solid;
                            border-top-color: #1ABC9C;
                        }

                        [slider] > div > [sign] > span {
                            font-size: 12px;
                            font-weight: 700;
                            line-height: 28px;
                        }

                        [slider]:hover > div > [sign] {
                            opacity: 1;
                        }
                    </style>
                    <!-- END CSS FOR PRICE RANGE -->
                </ul>
            </div>
        </div>
        <!-- /filter_type -->
        <div class="buttons">
            <a href="#0" id="filter" class="btn_1 filter-sort">Primeni</a> <a href="#0" class="d-none" id="reset"class="btn_1 gray">Reset</a>
        </div>
    </div>
</aside>
