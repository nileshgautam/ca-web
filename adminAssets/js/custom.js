$(document).ready(function () {
    //add services in packages
    $('#packageServices').on('click', 'option', function () {
        let data = $('#selectedServices').html();        
        let price = 0;
        if (data.trim() != '') {
            price = parseInt($('input[name="bPrice"]').val()) + parseInt($(this).attr('price'));
        }
        else {
            price = parseInt($(this).attr('price'));
        }

        $('input[name="bPrice"]').val(price)
        $(this).remove();
        $('#selectedServices').append($(this))
    });

    //remove services from packages
    $('#selectedServices').on('click', 'option', function () {
        let data = $('#selectedServices').html();
        let price = $(this).attr('price');        
        if (data.trim() != '') {
            price = parseInt($('input[name="bPrice"]').val()) - parseInt(price);
        }
        else {
            price = 0;
        }

        $('input[name="bPrice"]').val(price)
        $(this).remove();
        $('#packageServices').append($(this))
    });

    //add services in packages
    $('#pPackageServices').on('click', 'option', function () {
        let data = $('#pSelectedServices').html();
        let price = 0;
        if (data.trim() != '') {
            price = parseInt($('input[name="pPrice"]').val()) + parseInt($(this).attr('price'));
        }
        else {
            price = parseInt($(this).attr('price'));
        }

        $('input[name="pPrice"]').val(price)
        $(this).remove();
        $('#pSelectedServices').append($(this))
    });

    //remove services from packages
    $('#pSelectedServices').on('click', 'option', function () {
        let data = $('#pSelectedServices').html();
        let price = $(this).attr('price');
        if (data.trim() != '') {
            price = parseInt($('input[name="pPrice"]').val()) - parseInt(price);
        }
        else {
            price = 0;
        }

        $('input[name="pPrice"]').val(price)
        $(this).remove();
        $('#pPackageServices').append($(this))
    });


    //add services in packages
    $('#ePackageServices').on('click', 'option', function () {
        let data = $('#eSelectedServices').html();
        let price = 0;
        if (data.trim() != '') {
            price = parseInt($('input[name="ePrice"]').val()) + parseInt($(this).attr('price'));
        }
        else {
            price = parseInt($(this).attr('price'));
        }

        $('input[name="ePrice"]').val(price)
        $(this).remove();
        $('#eSelectedServices').append($(this))
    });

    //remove services from packages
    $('#eSelectedServices').on('click', 'option', function () {
        let data = $('#eSelectedServices').html();
        let price = $(this).attr('price');
        if (data.trim() != '') {
            price = parseInt($('input[name="ePrice"]').val()) - parseInt(price);
        }
        else {
            price = 0;
        }

        $('input[name="ePrice"]').val(price)
        $(this).remove();
        $('#ePackageServices').append($(this))
    });

    //Save services
    $('#servicesForm').on('submit', function (e) {
        e.preventDefault();
        let category = $('select[name="category"]').val()
        if (category != "") {
            let data = packageData();
            let formData = new FormData(document.getElementById(`servicesForm`));
            formData.append('packages', JSON.stringify(data))
            let url = BASE_URL + 'Admin/saveServices';
            AjaxPost(formData, url, successCallBack, AjaxError)

            function successCallBack(content) {
                let result = JSON.parse(content);
                $('#exampleModal').modal('hide');
                result[0] == 'success' ? Notiflix.Notify.Success(result[1]) : Notiflix.Notify.Failure(result[1]);
                setTimeout(function () { window.location.reload(); }, 2000);

            }
        } else {
            Notiflix.Notify.Failure('Service category Required');
            $('select[name="category"]').focus()
        }


    });

    function packageData() {
        let basicPack = [];
        let essentialPack = [];
        let premiumPack = [];
        let bPrice = $('input[name="bPrice"]').val();
        let ePrice = $('input[name="ePrice"]').val();
        let pPrice = $('input[name="pPrice"]').val();
        $('#selectedServices option').each(function () {
            basicPack.push($(this).val());
        });
        $('#pSelectedServices option').each(function () {
            premiumPack.push($(this).val());
        });
        $('#eSelectedServices option').each(function () {
            essentialPack.push($(this).val());
        });
        let package = [{ name: 'Basic', price: bPrice, services: basicPack },
        { name: 'Essential', price: ePrice, services: essentialPack },
        { name: 'Premium', price: pPrice, services: premiumPack }]

        return package;
    }

    //edit services
    $('#services').on('click','.edit',function(){
        let id = $(this).attr('data-id');
        window.location.href = BASE_URL +'Admin/addServices/'+id;
    })


})