// window.addEventListener('load', function () {
//     //your code right here;
//     // console.log('hi')
//     let i = 0;
//     let whyus = document.getElementById('why-us');
//     let html = '';
//     for (i = 0; i < 6; i++) {
//         html+=`<div class="card" style="width: 18rem;">
//         <img class="card-img-top" src="..." alt="Card image cap">
//         <div class="card-body">
//           <h5 class="card-title">Card title</h5>
//           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> 
//         </div>
//       </div>`;

//     }
//     console.log(html);
//     // whyus.append(html);

// }, false);

$(document).ready(function () {
    $('#packages').on('click', 'input[type="radio"]', function () {
        let price = $(this).val();
        let package = $(this).attr('package');
        $('#package').val(package);
        $('#payPrice').text('₹ ' + price);
        $('#price').val(price)
    });

    $('.play-pause').on('click', function () {
        let myVideo = document.getElementById("video1"); 
        if (myVideo.paused){
            myVideo.play();
            $(this).find('i').removeClass('fa-play-circle-o');
            $(this).find('i').addClass('fa-pause-circle-o')
        }           
        else{
            myVideo.pause();
            $(this).find('i').removeClass('fa-pause-circle-o');
            $(this).find('i').addClass('fa-play-circle-o')
        }
            
    });

    $('#fPassword').click(function(e){
        e.preventDefault();
       let form = ` <div class="form-group">
                        <input type="email" name="email" class="form-control" required aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <button type="button" id="next" class="btn btn-primary btn-user btn-block">
                      Next
                    </button>`;
        $('#fPassword').addClass('d-none');
        $('#form1').html(form);    
    });

    $('#form1').on('click','#next',function(){
        let mail = $('input[type="email"]').val();
        let formData = new FormData();
        formData.append('email',mail);
        let url = BASE_URL + 'Login/validateMail';        

        $.ajax({
            type: "POST",
            url: url,
            data: formData, // serializes the form's elements.
            success: function (data) {
                let response = JSON.parse(data);
                if(response[0] == 'success'){

                    let formFields = `<div class="form-group"><label for="new-password">New Password</label>
                    <input type="email" hidden name="email" id="email" value="${mail}" class="form-control">
                    <input type="password" name="new-password" id="new-password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" class="form-control">
                </div>
                <div class="form-group ">                                
                    <input type="submit" value="Change" class="form-control btn-sm btn-primary col-sm-3 float-right">
                </div>`
                $(`#form1`).attr('action',BASE_URL + 'Login/updatePassword');
                $('#form1').html(formFields);
                }else{
                    Notiflix.Notify.Failure(response[1]);
                }           
            },
            cache: false,
            contentType: false,
            processData: false
        });

    });

    $('#form1').on('submit', function (e) {
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

    $('.consult').on('mouseover',function(){
        $('.consult-left').removeClass('input-style-2');
        $('.consult').addClass('input-style-2 text-light')
    })

    $('.consult').on('mouseout',function(){
        $('.consult-left').addClass('input-style-2');
        $('.consult').removeClass('input-style-2 text-light')
    })

    $('.dropdown').on('mouseover',function(){
        let element = $(this).find('.dropdown-menu .col-sm-6').length;
        if(element == 2){
            $(this).find('.dropdown-menu').css('min-width','32rem')
        }else{
            $(this).find('.dropdown-menu').css('min-width','10rem')
            $(this).find('.dropdown-menu .items').removeClass('col-sm-6')
            $(this).find('.dropdown-menu .items').addClass('col-sm-12')
        }
       
    })

    $('#mainMenu-trigger').on('click',function(){
        let flag = $('.lines-button.x').hasClass('toggle-active');
        if(flag){
            $('.lines-button.x').removeClass('toggle-active')
            $('.navbar ul').removeClass('opened-menu')
        }else{
            $('.lines-button.x').addClass('toggle-active')
            $('.navbar ul').addClass('opened-menu')
        }
        
    });

    // $('li.dropdown').on('click',function(){
    //     alert('hello')
    //     let flag = $('.dropdown-menu').hasClass('show');
    //     if(flag){
    //         // $('.dropdown-menu').removeClass('show');
    //         // $('.dropdown-menu').css('display','none');
           
    //     }else{
    //         // $('.dropdown-menu').css('display','none');
    //     }
    // })

    

})

