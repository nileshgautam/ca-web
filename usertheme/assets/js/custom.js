$(document).ready(function () {                       
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

    $('#fSubmit').on('click', function () {
        let value = $(this).attr('count');
        let uploaded = $(this).attr('uploaded');
        let id = atob($(this).attr('sId'));
        if (value != '0') {
            Notiflix.Notify.Success(`${uploaded} Documents uploaded successfully,${value} Documents are remainning`);
        } else {
            let formData = new FormData();
            formData.append('id', id);
            let url = baseUrl + 'User/updateUserService';
            $.ajax({
                type: "POST",
                url: url,
                data: formData, // serializes the form's elements.
                beforeSend: function () {
                    Notiflix.Loading.Pulse('Uploading...');
                },
                success: function (data) {
                    Notiflix.Loading.Remove();
                    let response = JSON.parse(data);
                    if (response[0] == 'success') {
                        Notiflix.Notify.Success(`All documents are submited successfully,We will get back you soon`);
                        setTimeout(function () { window.location.reload() }, 1000);
                    } else {
                        Notiflix.Notify.Failure(response[1]);
                        setTimeout(function () { window.location.reload() }, 1000);
                    }

                },
                cache: false,
                contentType: false,
                processData: false
            });

        }
    });

    $('#userDocsTable').on('click', '.sentMail', function () {
        let service = $(this).parent().parent().find('td:nth-child(2)').html();
        let email = $(this).parent().parent().find('td:nth-child(3)').html();
        let formData = new FormData()
        let url = baseUrl + 'BackendTeam/sentReminderMail';
        formData.append('service', service);
        formData.append('email', email);

        $.ajax({
            type: "POST",
            url: url,
            data: formData, // serializes the form's elements.
            beforeSend: function () {
                Notiflix.Loading.Pulse('Sending Mail...');
            },
            success: function (data) {
                Notiflix.Loading.Remove();
                let result = JSON.parse(content);
                if (result[0] == 'success') {
                    Notiflix.Notify.Success(`Mail Sent`);
                } else {
                    Notiflix.Notify.error(result[1]);
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });




    })

    $('#uDocumentTable').on('click', '.reject', function () {
        let html = `<input type="text" class="form-control" style="width:71%" name='reason' required placeholder="Reason for Rejection" /><img class="rejectS ml-2 " style="width:12%" src=" ${baseUrl + 'assets/image/index/wrong.png'}" alt="Reject" width="30" title="Reject Document">`;
        $(this).parent().html(html)
    });

    $('#uDocumentTable').on('click', '.accept', function () {
        let uId = atob($(this).parent().parent().attr('uId'));
        let sId = atob($(this).parent().parent().attr('sId'));
        let name = $(this).parent().parent().attr('name');

        let formData = new FormData()
        let url = baseUrl + 'BackendTeam/acceptDocument';
        formData.append('uId', uId);
        formData.append('sId', sId);
        formData.append('name', name);
        AjaxPost(formData, url, successCallBack, AjaxError);

        function successCallBack(content) {
            let result = JSON.parse(content);
            if (result[0] == 'success') {
                Notiflix.Notify.Success(`Document Accepted`);
                setTimeout(function () { window.location.reload() }, 1000);

            } else {
                Notiflix.Notify.error(result[1]);
                setTimeout(function () { window.location.reload() }, 1000);
            }


        }
    });

    $('#uDocumentTable').on('click', '.rejectS', function () {
        let uId = atob($(this).parent().parent().attr('uId'));
        let sId = atob($(this).parent().parent().attr('sId'));
        let mId = atob($(this).parent().parent().attr('mId'));
        let name = $(this).parent().parent().attr('name');
        let reason = $(this).siblings().val()

        let formData = new FormData()
        let url = baseUrl + 'BackendTeam/rejectDocument';
        formData.append('uId', uId);
        formData.append('sId', sId);
        formData.append('name', name);
        formData.append('mId', mId);
        formData.append('reason', reason);
        AjaxPost(formData, url, successCallBack, AjaxError);

        function successCallBack(content) {
            let result = JSON.parse(content);
            if (result[0] == 'success') {
                Notiflix.Notify.Success(`Document Rejected`);
                setTimeout(function () { window.location.reload() }, 1000);
            } else {
                Notiflix.Notify.error(result[1]);
                setTimeout(function () { window.location.reload() }, 1000);
            }


        }

    });

    $('#uDocumentTable').on('click', '.docImg', function () {
        let src = $(this).attr('src');
        let alt = $(this).attr('alt');
        let ext = $(this).attr('type');
        let file_src = atob($(this).attr('file_src'))
        if (ext == 'pdf' || ext == 'doc' || ext == 'docx') {
            window.open(file_src)
            // console.log(file_src);
        } else {
            $('#exampleModalLabel').text(alt)
            $('#exampleModal .modal-body').html(`<img src="${src}" alt="${alt}" >`);
            $('#exampleModal').modal('show');
        }

    });

    $('#assign').on('click', function () {
        let formData = new FormData()
        let url = baseUrl + 'BackendTeam/getAssignedUser';
        let uId = $(this).attr('uId');
        let sId = $(this).attr('sId');
        AjaxPost(formData, url, successCallBack, AjaxError);

        function successCallBack(content) {
            let result = JSON.parse(content);
            if (result[0] == 'success') {
                let html = ` <div class="form-group row m-0">
                <label class="col-sm-3" for="assignUser">Select User</label>
                <select class="form-control col-sm-6" id="assignUser">`
                for (let user of result[1]) {
                    html += `<option value='${user.email}'>${user.name}</option>`
                }
                html += `</select>
                <button uId="${uId}" sId="${sId}" type="button" id="assignU" class="btn btn-primary mb-2 col-sm-2 btn-sm ml-2">Assign</button>
              </div>`
                $('#exampleModalLabel').text('Assign Task')
                $('#exampleModal .modal-dialog').attr('style', 'top:30%');
                $('#exampleModal .modal-body').html(html);
                $('#exampleModal').modal('show');
            }

        }
    });

    $('#exampleModal').on('click', '#assignU', function () {
        let mail = $('#assignUser').find('option:selected').val()
        let uId = atob($(this).attr('uId'));
        let sId = atob($(this).attr('sId'))
        let formData = new FormData()
        let url = baseUrl + 'BackendTeam/sendAssignerMail';
        formData.append('uId', uId);
        formData.append('sId', sId);
        formData.append('email', mail);
        $('#exampleModal').modal('hide');
        $.ajax({
            type: "POST",
            url: url,
            data: formData, // serializes the form's elements.
            beforeSend: function () {
                Notiflix.Loading.Pulse('Sending Mail...');
            },
            success: function (data) {
                Notiflix.Loading.Remove();
                let result = JSON.parse(data);
                if (result[0] == 'success') {
                    Notiflix.Notify.Success(`Mail Sent`);
                } else {
                    Notiflix.Notify.error(result[1]);
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
        
    })

$('.excerpt').on('click',function(){
    let tId = $(this).attr('tId');
    $('#ticketId').val(tId);
    $('#reply').modal('show')
})


})