$('.product-grid').css('opacity', '0.5');

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
    var max_rs = "";

    // ARRAY WITH DATA SPLITED
    var brands = "";
    var categories = "";
    var animals = "";
    var min_price = "";
    var max_price = "";

    /*  SPLIT FILTERS */
    var filter = url.replace('/produtos', '');

    if (filter.trim()) {
        filter = url.split('!');

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

        /* SET ACTIVE */
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
    }

    //SHOW SEARCH ON ALERT
    if (search != null) {
        $('.search-d').removeClass('d-none').append('<div class="alert alert-search col" role="alert"><i class="fas fa-search"></i> Você buscou por "<span></span>"<button class="remove-search"><i class="fas fa-times"></i></button></div>');
        $('.search-d .alert span').text(search);
        $('#search').val(search);
    }

    /* ADD LOADING ON */
    $('.sidebar li').click(function(e) {
        var loading = '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>';
        var div = $(this).parents();
        $(div[0]).css('opacity', '0.4');
        console.log($(div[0]).children());
        $(div[1]).append(loading);
        console.log(div);
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
        max_rs = $(this).val() == 24 ? "24" : "";
        redirect();
    });

    /* FILTER PRICE */
    $('.filter-price').click(function(e) {
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
        $('#page, .order-container').remove();
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
        if (max_rs > 18) {
            max_rs = "!rs=" + max_rs;
        }
        if (price.trim()) {
            price = "!price=" + price;
        }

        search = search != null ? "?q=" + search : "";

        var url = window.location.origin + "/produtos/" + category + animal + brand + price + order + max_rs + search;
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

    function getImageAnimal(array) {
        var path = 'http://' + window.location.host; //local root
        var animals = "";
        array.forEach(e => {
            animals += '<div class="type"><img src="' + path + '/img/' + e.name.toLowerCase() + '.png" alt="Animais"><span>' + e.name + '</span></div>';
        });
        return '<div class="product-type">' + animals + '</div>'
    }

    /*  POPULATE PRODUCTS */
    function setProducts(data) {
        $('.product-grid').empty();
        if (Array.isArray(data) && data.length) {
            var path = window.location.protocol + '//' + window.location.hostname
            $.each(data, function(i, value) {
                var name = value.name.length > 23 ? value.name.substring(0, 23) + '. . .' : value.name;
                var price = value.price.toFixed(2).replace('.', ',');
                var image = "/storage/products/" + value.image;
                var product = '<div class="col-6 col-md-4 product-d">' +
                    '<div class="product-block">' + getImageAnimal(value.animal) + '<div class="product-img"><img src="' + image + '" alt="">' +
                    '</div><div class="product-info"><h3 class="p-name">' + name + '</h3><p class="p-price">R$ ' + price + '</p>' +
                    '</div><div class="btn-show"><a href="' + path + '/ver/' + value.id + '">Ver produto</a></div></div></div>';
                $('.product-grid').append(product);
            });
        } else {
            add_notfound();
        }
    }

    /*  INIT DATA FILTERS */
    var data_filter = {
        "order": order,
        "min_price": min_price,
        "max_price": max_price,
        "animals": animals,
        "categories": categories,
        "brands": brands,
        "search": search
    };


    /* SEND MODIFICATIONS AND REFRESH PRODUCTS */
    function send_modify() {
        var container = $('#page');
        container.pagination({
            dataSource: '/produtos/filter',
            locator: 'items',
            totalNumberLocator: function(response) {
                return response.length > 0 ? response[0]['total'] : 0;
            },
            className: 'paginationjs-theme-blue paginationjs-big',
            pageSize: max_rs == "" ? 18 : 24,
            ajax: {
                data: data_filter
            },
            callback: function(data) {
                topTop();
                setProducts(data);
            }
        });
        $('.loading').remove();
        $('.product-grid').css('opacity', '1');
    }

    /* FIND PRODUCTS AND SHOW */
    send_modify();

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