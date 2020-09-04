function add(formId = '', postUrl = '') {
    let formData = new FormData(document.getElementById(`${formId}`));
    console.log(formData);
    let url = BASE_URL + postUrl;   
    AjaxPost(formData, url, successCallBack, AjaxError)

    function successCallBack(content) {
        let result = JSON.parse(content);
        $('#exampleModal').modal('hide');
        result[0] == 'success' ? Notiflix.Notify.Success(result[1]) : Notiflix.Notify.Failure(result[1]);
        setTimeout(function(){ window.location.reload(); }, 2000);
        
    }
    
}