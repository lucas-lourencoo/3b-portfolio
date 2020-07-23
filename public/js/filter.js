$(document).ready(function() {


    /**
     *      FILTERS
     */
    var url = decodeURIComponent(window.location.pathname);
    let search = new URLSearchParams(window.location.search);
    search = search.get('q');
    var rs = url.split('/');

    /* VAR WITH DATA */
    var category = "";
    var animal = "";
    var brand = "";
    var order = "";
    var price = "";
    var max_rs = "18";

    // ARRAY WITH DATA SPLITED
    var brands = "";
    var categories = "";
    var animals = "";
    var min_price = "";
    var max_price = "";

    /*  SPLIT FILTERS */
    var filter = url.split('/produtos/')[1].split('!');

    filter.forEach(val => {
        type = val.split("=");
        if (type[0] === "category") {
            type.splice(0, 1);
            categories = type[0].split('_');
            category = categories.join("_");
        } else if (type[0] === "animal") {
            type.splice(0, 1);
            animals = type[0].split('_');
            animal = animals.join("_");
        } else if (type[0] === "brand") {
            type.splice(0, 1);
            brands = type[0].split('_');
            brand = brands.join("_");
        } else if (type[0] === "price") {
            type.splice(0, 1);
            price = type[0].split('_');
            min_price = typeof price[0] !== 'undefined' ? price[0] : false;
            max_price = typeof price[1] !== 'undefined' ? price[1] : false;
        } else if (type[0] === "ord") {
            type.splice(0, 1);
            order = type[0];
            order == "asc" || order == "desc" || order == "def" ? $("#order-product").val(order) : false;
        } else if (type[0] === "rs") {
            type.splice(0, 1);
            max_rs = type[0];
            max_rs == "18" || max_rs == "24" ? $("#max-results").val(max_rs) : false;
        }
    });

    if (Array.isArray(categories)) {
        categories.forEach(element => {
            $("#category").find("[data-category='" + element + "']").children().addClass('active');
        });
        add_button_clear('categories');
    }
    if (Array.isArray(brands)) {
        brands.forEach(element => {
            $(".sidebar_categories").find("[data-brand='" + element + "']").children().addClass('active');
        });
        add_button_clear('brands');
    }
    if (Array.isArray(animals)) {
        animals.forEach(element => {
            $(".sidebar_categories").find("[data-animal='" + element + "']").children().addClass('active');
        });
        add_button_clear('animals');
    }
    $('.sidebar_section li.active a').append('<i class="fas fa-times fa-pull-right"></i>');

    //SHOW SEARCH ON ALERT
    if (search != null) {
        $('.products_iso .alert').parent().removeClass('d-none');
        $('.products_iso .alert span').text(search);
        $('#search').val(search);
    }

    /* ADD LOADING ON */
    $('.sidebar li').click(function(e) {
        var loading = '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>';
        var div = $(this).parents();
        $(div[1]).prepend(loading);
        $('.sidebar_title , .sidebar_categories').addClass('opacity');
    });


    $('ul#categories li').click(function(e) {
        remove_click(this);
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            categories = remove_e(categories, $(this).data('category'));
            category = categories.join("-");
        } else {
            var new_category = $(this).data('category');
            if (category === "") {
                category = new_category;
            } else {
                category += "-" + new_category;
            }
        }
        redirect();
    });


    /**
     *     FILTERS EVENT CLICK 
     */

    $('ul#category li a').click(function(e) {
        remove_click(this);
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            categories = remove_e(categories, $(this).parent().data('category'));
            category = categories.join("_");
        } else {
            var new_category = $(this).parent().data('category');
            if (category === "") {
                category = new_category;
            } else {
                category += "_" + new_category;
            }
        }
        redirect();
    });

    $('ul#brand li a').click(function(e) {
        remove_click(this);
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            brands = remove_e(brands, $(this).parent().data('brand'));
            brand = brands.join("_");
        } else {
            var new_brand = $(this).parent().data('brand');
            if (brand === "") {
                brand = new_brand;
            } else {
                brand += "_" + new_brand;
            }
        }
        redirect();
    });

    $('ul#animal li a').click(function(e) {
        remove_click(this);
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            animals = remove_e(animals, $(this).parent().data('animal'));
            animal = animals.join("_");
        } else {
            var new_animal = $(this).parent().data('animal').toString();
            if (animal === "") {
                animal = new_animal;
            } else {
                animal += "_" + new_animal;
            }
        }
        redirect();
    });

    $('#order-product').change(function(e) {
        order = $(this).val();
        redirect();
    });

    $('#max-results').change(function(e) {
        max_rs = $(this).val();
        redirect();
    });

    /* FILTER PRICE */
    $('.filter_button').click(function(e) {
        remove_click(this);
        var value = $('#range_price');
        price = value.data('from') + "_" + value.data('to');
        redirect();
    });

    $('.remove-search').click(function(e) {
        search = null;
        redirect();
    });

    // PREVENT MULTIPLE CLICK ON ELEMENT FILTER
    function remove_click(element) {
        $(element).off("click");
    }

    // REMOVE ELEMENT FROM ARRAY
    function remove_e(array, n) {
        var index = array.indexOf(n.toString());
        if (index > -1) {
            array.splice(index, 1);
        }
        return array;
    }

    function add_button_clear(type) {
        var button = '<button class="clear_filter" data-remove="' + type + '" type="button"><i class="fas fa-times"></i> remover filtros</button>';
        var local_class = ".side-" + type;
        $(local_class + ' .sidebar_title').append(button);
    }

    function add_notfound() {
        $('#page').remove();
        $('.grid-products').append('<div class="text-center w-100"><h3>Nenhum produto encontrado.</h3></div>');
    }

    function topTop() {
        $(window).width() < 700 ? $("html, body").animate({ scrollTop: 0 }, 1000) : $("html, body").animate({ scrollTop: 0 }, 500);
    }

    /**
     *      REFRESH PAGE WITH PARAMS
     */

    function redirect() {
        if (category.trim()) {
            category = "!category=" + category;
        }
        if (animal.trim()) {
            animal = "!animal=" + animal;
        }
        if (brand.trim()) {
            brand = "!brand=" + brand;
        }
        if (order.trim()) {
            order = "!ord=" + order;
        }
        if (max_rs > 0) {
            max_rs = "!rs=" + max_rs;
        }
        if (price.trim()) {
            price = "!price=" + price;
        }

        search = search != null ? "?q=" + search : "";

        var url = window.location.origin + "/produtos/" + category + animal + brand;
        window.location.replace(url);
    }



    /**
     *      SLIDER PRICE
     */
    $("#range_price").ionRangeSlider({
        skin: "round",
        step: 5,
        type: "double",
        grid: true,
        min: 1,
        max: 800,
        prefix: "R$ "
    });

    if (min_price.trim()) {
        let range = $("#range_price").data("ionRangeSlider");
        range.update({
            from: min_price,
            to: max_price
        });
        price = price.join('_');
    }


    function setProducts(data) {
        $('.grid-products').empty();
        if (Array.isArray(data) && data.length) {
            var path = 'https://' + window.location.host; //local image
            $.each(data, function(i, value) {
                var favorite = value.favorite ? "active" : "";
                var title = value.title.length > 23 ? value.title.substring(0, 23) + '. . .' : value.title;
                var image = $(window).width() < 700 ? "/storage/products/" + value.image.split('.')[0] + "." + value.image.split('.')[1] : "/storage/products/" + value.image.split('.')[0] + "." + value.image.split('.')[1];
                var product = '<div class="col-6 col-md-4 product" data-prod="' + value.id + '">' +
                    '<div class="content">' +
                    '<div class="image-product">' +
                    '<img src="' + path + image + '" alt="">' +
                    '</div>' +
                    '<div class="favorite ' + favorite + ' "></div>' +
                    '<div class="product-info">' +
                    '<div class="title-product">' +
                    '<h6>' + title + '</h6>' +
                    '</div>' +
                    '<div class="product-price">' +
                    'R$ ' + value.price.toFixed(2).replace('.', ',') +
                    '<span></span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="show-more">' +
                    '<a href="' + path + "/ver/" + value.id + '">Ver mais</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('.grid-products').append(product);
            });
        } else {
            add_notfound();
        }
    }


    var data_filter = {
        "order": order,
        "min_price": min_price,
        "max_price": max_price,
        "animals": animals,
        "categories": categories,
        "brands": brands,
        "search": search
    };


    /*
    function send_modify() {
        var container = $('#page');
        container.pagination({
            dataSource: '/produtos/filtro',
            locator: 'items',
            totalNumberLocator: function(response) {
                return response.length > 0 ? response[0]['total'] : 0;
            },
            className: 'paginationjs-theme-blue paginationjs-big',
            pageSize: max_rs,
            ajax: {
                data: data_filter
            },
            callback: function(data) {
                topTop();
                setProducts(data);
            }
        });
        $('.loading').remove();
    }

*/
    /* FIND PRODUCTS AND SHOW */
    //send_modify();


    $(".clear_filter").click(function(e) {
        var data = $(this).data('remove');
        if (data == "brands") {
            brand = "";
        } else if (data == "animals") {
            animal = "";
        } else if (data == "categories") {
            category = "";
        }
        redirect();
    });

});