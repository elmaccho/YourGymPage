$(function(){
    $('div.products-count a').click(function(event){
        event.preventDefault();
        $('a.products-actual-count').text($(this).text());
        getProducts($(this).text());
    })
    
    $('a#filter-btn').click(function(event){
        event.preventDefault();
        getProducts($('a.products-actual-count').first().text());
    })

    $('button.add-cart-btn').click(function (event) {
        event.preventDefault();
        let productId = $(this).data('id');

        $.ajax({
            method: "POST",
            url: WELCOME_DATA.addToCart + productId
        })
        .done(function () {
            Swal.fire({
                title: 'Dodano do koszyka!',
                icon: "success",
                showCancelButton: true,
                confirmButtonText: "<i class=\"fas fa-cart-plus\"></i> Przejdź do koszyka",
                cancelButtonText: "<i class=\"fas fa-shopping-bag\"></i> Kontynuuj zakupy"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = WELCOME_DATA.cartList;
                }
            });
        })
        .fail(function () {
            Swal.fire("Oops...", "Wystąpił błąd", "error");
        });
    });

    function getProducts(paginate){
        const form = $('form.sidebar-filter').serialize();
        
        $.ajax({
            method: "GET",
            url: "/",
            data: form + "&" + $.param({paginate: paginate})
        })
        .done(function (response) {
            $('div#products-wrapper').empty();
            $.each(response.data, function (index, product) {
                const html = '<div class="col-6 col-md-6 col-lg-4 mb-3">' +
                    '            <div class="card h-100 border-0">' +
                    '                <div class="card-img-top">' +
                    '                    <img src="' + getImage(product) + '" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">' +
                    '                </div>' +
                    '                <div class="card-body text-center bg-white">' +
                    '                    <h4 class="card-title">' +
                                            product.name +
                    '                    </h4>' +
                    '                    <h5 class="card-price small">' +
                    '                        <i>PLN ' + product.price + '</i>' +
                    '                    </h5>' +
                    '                </div>' +
                    '                   @guest' +
                    '                       <button class="btn btn-danger">' +
                    '                           Do zakupów internetowych wymagane jest konto' +
                    '                       </button>' +
                    '                   @else' +
                    '                       <button class="btn btn-sm add-cart-btn btn-main" data-id="{{ $product->id }}" @guest disabled @endguest>' +
                    '                           <i class="fas fa-cart-plus"></i> Dodaj do koszyka' +
                    '                       </button>' +
                    '                   @endguest' +
                    '            </div>' +
                    '        </div>';
                $('div#products-wrapper').append(html);
            });
        });
    }

    function getImage(product){
        if(!!product.image_path){
            return WELCOME_DATA.storagePath + product.image_path
        }
        return WELCOME_DATA.defaultImage;
    }

    function getDisabled() {
        if(WELCOME_DATA.isGuest){
            return ' disabled';
        }
        return '';
    }

    $('button.test').click(function(){
        console.log('test')
    })

    $('button.add-cart-btn').click(function() {
        console.log('test');
    });
})