'use strict';

let Page;
let loc = location.pathname;

Page = {

    /**
     * @type {jQuery}
     */
    $body: $('body'),

    /**
     * @type {jQuery}
     */
    $window: $(window),



    /**
     * Initialize page scripts.
     */
    init: function() {

        // Initialize page parts.
        Page.addMoreBtn();
        Page.valHref(loc);
        Page.closesButton();
        Page.ajaxRequest();
        Page.minify();
        Page.addMoreTut();
        Page.showLists();
        Page.printPays();

    },

    valHref: function (loc){
        if(loc === "/") {
            var hrefHome = "menu";
            Page.login(hrefHome);
        }else{
            hrefHome = loc;
            Page.login(hrefHome);
        }
    },

    addMoreBtn: function(){

        let btns = $('.moreconcep');
        let addS = $('.paycash');

      let $addMoreBtn = btns.find('.add-more-products');

      $addMoreBtn.on('click', function addMore(ev) {
            ev.preventDefault();

          let $select = addS.find('select[name*="addit[]"]').last();
          let $parent = $select.parent();
          let $clon = $parent.clone();
          let $selectClon = $clon.children('select');
          let index = $select.data('index') || 1;

          $selectClon.data('index', ++index);
          $select.attr('name', 'addit[]-' + index);

          $clon.insertAfter($parent);

      });
    },

    addMoreTut: function(){

        let btns = $('.moreconcep');
        let addS = $('.tutors');

        let $addMoreBtn = btns.find('.add-more-tutor');

        $addMoreBtn.on('click', function addMore(ev) {
            ev.preventDefault();

            let $select = addS.find('.row').last();
            let $parent = $select.parent();
            let $clon = $parent.clone();
            let $selectClon = $clon.find('input');

            $selectClon.val('');
            $clon.insertAfter($parent);

        });
    },

    login: function (href) {

        $(".login-user").submit(function (e) {


            var form = $(this);
            var url = "login";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function () {

                },
                success: function (data) {
                    //console.log(data); // show response from the php script.
                    if (data == "True") {
                        var lodis = $('.upload');
                        lodis.css('display', 'block');
                        lodis.html('<span>Enviando Solicitud Por Favor Espera...</span>');
                        setTimeout(function () {
                            location.href = href;
                        }, 3000);
                    }else{
                        //console.log(data);
                        var lodis = $('.upload');
                        lodis.css('display', 'block');
                        lodis.html('<span>¡Debes Ser Usuario Autorizado!</span>');
                        setTimeout(function () {
                            location.href = href;
                        }, 3000);
                    }

                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    },

    closesButton: function () {
        var button = $('#buttoncl');
        var pross = $('.modal-show');

        button.click( function () {
            pross.addClass('hidden');
            $('body').removeClass('no-body');
            var print = $('.print-receipt');
            print.html('');
            location.reload();
        });
    },

    ajaxRequest: function () {

        $(".send-form").submit(function (e) {


            var form = $(this);
            var url = "send";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function () {

                },
                success: function (data) {
                   //console.log(data); // show response from the php script.
                    if(data != ""){
                        var print = $('.print-receipt');
                        var pross = $('.modal-show');
                        setTimeout(function () {
                            var input = $(".block input[type=text]");
                            input.val("");
                            print.addClass('active');
                            print.html('<a id="printpays" href="pago-realizado" target="_blank">¡Si lo quiero impreso!</a>');
                            pross.removeClass('hidden');
                            $('body').addClass('no-scroll');
                        },1000);
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        $(".consultor-form").submit(function (e) {

            var form = $(this);
            var url = "consultant";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function () {

                },
                success: function (data) {
                    //console.log(data); // show response from the php script.
                    var lodis = $('.upload');
                    lodis.css('display', 'block');
                    lodis.html('<span>Enviando Solicitud Por Favor Espera...</span>');
                    setTimeout(function () {
                        location.href = 'consulted.php';
                    }, 3000);

                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        $(".ins-form").submit(function (e) {

            var form = $(this);
            var url = "inscriptions";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function () {

                },
                success: function (data) {
                    //console.log(data); // show response from the php script.
                        var lodis = $('.upload');
                        lodis.css('display', 'block');
                        lodis.html('<span>Enviando Solicitud Por Favor Espera...</span>');
                        setTimeout(function () {
                            lodis.html('<span>Datos Ingresados Correctamente.</span>');
                        }, 5000);
                        setTimeout(function () {
                            location.reload();
                        }, 8000);
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        $(".update-form").submit(function (e) {

            var form = $(this);
            var url = "update";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function () {

                },
                success: function (data) {
                    //console.log(data); // show response from the php script.
                     var lodis = $('.upload');
                     lodis.css('display', 'block');
                     lodis.html('<span>Enviando Solicitud Por Favor Espera...</span>');
                     setTimeout(function () {
                         lodis.html('<span>ID Actualizado.</span>');
                     }, 5000);
                     setTimeout(function () {
                        location.reload();
                     },8000);

                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    },
    
    printPays: function () {
        var showm = $('.modal-show');
        var print = $('.print-receipt');

        print.click(function () {
            showm.addClass('hidden');
            $('body').removeClass('no-body');
            print.html('');
            location.reload();
        });
    },
    minify: function () {
        var min = $('#minify');
        var nav = $('.navigation');
        var des = $('.navigation .des');
        var lis = $('.navigation li');
        var imli = $('.navigation .img-li');
        var wra = $('.outer-wrapper');
        var imn = $('.img-nav');
        var navh = $('.navigation-hor');

        min.click(function () {

            if(min.hasClass('active')){
                min.removeClass('active');
                nav.removeClass('active');
                des.removeClass('active');
                lis.removeClass('active');
                imli.removeClass('active');
                wra.removeClass('active');
                imn.removeClass('active');
                navh.removeClass('active');
                document.getElementById('imgmin').src= '../design/imgs/minify.png';
            }else{
                nav.addClass('active');
                des.addClass('active');
                lis.addClass('active');
                imli.addClass('active');
                min.addClass('active');
                wra.addClass('active');
                imn.addClass('active');
                navh.addClass('active');
                document.getElementById('imgmin').src= '../design/imgs/minifyr.png';
            }
        });
    },
    showLists: function () {

        var inst = $('#click');
        var show = $('.showins');

        inst.click(function () {
            if (show.hasClass('active')){
                show.removeClass('active');
            }else{
                show.addClass('active');
            }
        });
    }
};
$(Page.init);
