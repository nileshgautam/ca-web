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

$(document).ready(function(){    
    $('#packages').on('click','input[type="radio"]',function(){
        let price = $(this).val();
        let package = $(this).attr('package');
        $('#package').val(package);
        $('#payPrice').text('₹ '+price)
    });

    })