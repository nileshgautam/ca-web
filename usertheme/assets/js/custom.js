$(document).ready(function () {
    $('#new-ticket').submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        let formData = new FormData(this);
        let url = baseUrl + 'User/new_ticket';
        let file = document.getElementById('file')

        $.ajax({
            type: "POST",
            url: url,
            data: formData, // serializes the form's elements.
            success: function (data) {
                let response = JSON.parse(data);
                console.log(response.message);
                console.log(response.type);
                // console.log(data);
                if (response.type === 'success' || response.type === 'danger') {
                    $('#newTicket').modal('hide');
                    response.type == 'success' ? Notiflix.Notify.Success(response.message) : Notiflix.Notify.Failure(response.message);
                }

                // show response from the php script.
            },
            cache: false,
            contentType: false,
            processData: false
        });

    });

    $('.pass-form').on('submit', function (e) {
        let nPass = $('#new-password').val();
        let cPass = $('#confirm-password').val();
        if (nPass != cPass) {
            Notiflix.Notify.Warning('Password does not match');
            $('#confirm-password').focus();
            return false;
        } else {
            return true;
        }

    });

})