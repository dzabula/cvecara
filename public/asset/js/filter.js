var page = 1;

window.onload = () =>{

    $("#cat-0").on("change",function(){

        $(".categories").each(function (e){

            $(this).prop("checked", $("#cat-0").prop("checked"));
        })
    })



    $("#filter").click(function (){
        page = 1;
        Filtrate();
        ScrollToStick();


    })

    // Optimizovanje visine bloka koji drzi kartice da nedodje do promene prilikom filtriranja
   // var containerHeight = $(".cards").height() * 3;
    //$("#container-with-products").css("min-height",containerHeight);

    addEvents();
}
function  ScrollToStick(){
    var target = $("#stick_here");
    var top = target.offset().top;
    $('html,body').animate({scrollTop: top}, 1000);
}
// Dodavanje svih dogadjaja
function addEvents(){
    $(".add-to-cart").click(function (e){
        e.preventDefault();
        let id = $(this).attr("data-product-id");
        let id_price = $(this).attr("data-price-id");
        AddProductToCart(id);

    })
    $(".paginate").click(function(e){
        e.preventDefault();

        page = $(this).attr("data-num"); // Uzimamo page promenljivu da bi znali koja stranica je u pitanju

        Filtrate();
        ScrollToStick();

    })
    $(".next").click(function(e){
        e.preventDefault();
        page = page + 1

        Filtrate();
    })
    $(".prev").click(function(e){
        e.preventDefault();
        page = page - 1

        Filtrate();
    })


}

function Filtrate(){
    var sort = $("#sort").val();
    var searchText = $("#search-text").val();
    var colors = [0];
    $(".colors").each(function (){
        if($(this).prop("checked")){
            colors.push($(this).val());
        }
    })
    var categories = [0];
    $(".categories").each(function (){
        if($(this).prop("checked")){
            categories.push($(this).val());
        }
    })
    var sizes = [0];
    $(".sizes").each(function (){
        if($(this).prop("checked")){
            sizes.push($(this).val());
        }
    })
    var minPrice = $("#value-min").text()
    var maxPrice = $("#value-max").text()
    StartSpiner();
    $.ajax({
        url: urlToFilter + "/"+ 0 +  "/" + categories.join("-") +  "/" + sizes.join("-") + "/" + colors.join("-") + "/" + maxPrice + "/" + minPrice + "/" + sort + "?search-text="+searchText+"&page=" + page ,
        method: "GET",
        dataType: "JSON",
        success: function (data) {


            WriteProducts(data.data)

            if(data.data.length > 0)
                    WritePagination(data);

            $(".paginate").each(function (){
                if($(this).attr("data-num") == page){
                    $(this).addClass("active");
                } else{
                    $(this).removeClass("active");
                }
            })

            addEvents();
            EndSpiner();
        },
        error: function (xhr) {

            alert("Doslo je do greske pri komunikaciji sa bazom podataka")
            EndSpiner();
        }
    });
}

function WriteProducts(data){
    var  html = "";

    if(data.length == 0){
        html = `
              <div>
                <div class="noOneProduct alert alert-warning" role="alert">
                    Nazalasot trenutno ne postoji ni jedan trazeni proizvod
                </div>
              </div>
            `
    }else{

        data.forEach(e => {
            if(e.price != undefined && Array.isArray(e.price)){
                e.price = e.price[0].price
            }
            html += `

                <div class="cards col-12 col-md-4 mb-5">

                <div class="grid_item">


                    <figure>
                        <a >
                            <img class="img-fluid lazy" src="${global_url + "/asset/img/" + e.src}" data-src="${global_url + "asset/img/" + e.src}" alt="${e.name}"/>
                        </a>`
                    if (e.amount){
                        let date = new Date(e.date_end);
                        let timestamp = date.getTime();

                        date = new Date(timestamp - Date.now());
                        miliseconds = timestamp - Date.now();
                        second = Math.floor(miliseconds / 1000);
                        hour = Math.floor(second / 3600);
                        day = Math.floor(hour / 24);

                        html += `<div data-countdown="${day}" class="countdown">Jos ${day} dana</div>`
                    }
                    html+=`
                    </figure>
                    <a href="*">
                        <h3>${e.name.charAt(0).toUpperCase() + e.name.substring(1,)}</h3>
                    </a>
                <div class="price_box">`


                        if(e.amount){
                             html+=`
                                <span class="old_price"> ${e.price} RSD </span><br/>

                                <span class="new_price">${e.price - (e.price * e.amount / 100)} RSD</span></br>

                                <span class="ribbon off">&nbsp;-${e.amount +"%"}</span>

                            `
                        }else{
                            html+=`<span class="new_price">${e.price} RSD</span>`
                        }

                        html+=`



                    </div>
                    <ul>
                      <!--
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                       -->
                   <li><a href="#0" class="tooltip-1 add-to-cart" data-price-id="${e.id}" data-product-id="${e.id}" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>  </ul>
                </div>
                <!-- /grid_item -->

        </div>`
        })

    }
    $("#container-with-products").html(html);
}

function WritePagination(data) {
    current = data.current_page;
    last = data.last_page;
    var html = ""
    if (current > 1)
        html += `<li><a href="#0" class="prev" title="previous page">&#10094;</a></li>`;


    for (let  i = 1 ; i <= last ; i++){
        html += `
        <li>
            <a data-num="${i}" class="paginate">${i}</a>
        </li>
            `
    }

    if( current < last)
        html += `<li><a href="#0" class="next" title="next page">&#10095;</a></li>`;

    $("#wirte-pagination").html(html);

    AdjustWidth();

}

function WriteArrayPropertyForProduct(Variable,nameProperty){
    html = "";

    if(nameProperty == "color") {
        Variable.forEach(e => {
            html += `
            ${e.color},
        `
        });
    }else{
        Variable.forEach(e => {
            html += `
            ${e.size},
        `
        });
    }
    return html;
}

function  AdjustWidth(){
    if(WIDTH_CARDS == "grid")
            $(".cards").addClass("col-md-4");
    else
        $(".cards").removeClass("col-md-4");
}



function StartSpiner(){
    var container = $("#container-with-products");
    var mask = $("#mask");
    var height = container.height();
    mask.removeClass("d-none");

    container.css("display","none")
    mask.css("display","flex");
    mask.height(height);





}
function EndSpiner(){
   setTimeout(function() {
        var container = $("#container-with-products");
        var mask = $("#mask");

        mask.css("display", "none");
        mask.addClass("d-none");

        container.css("display", "flex");
    },500);
}




