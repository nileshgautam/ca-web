console.log('hi i am in');

$('#new-ticket').submit(function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    console.log();
})