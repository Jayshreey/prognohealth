$('body').on('click', '.btn-enquiry', function (e) {
    if($("#enquiryModal").length){
        $('#enquiryModal').modal('show');
    }
});
$('body').on('click', '[type=submit]', function (e) {
    e.preventDefault();
    var obj = $(this);
    var form = obj.closest('form');
    if($('.data-parsley-validate').length){
        if (!$(form).parsley().validate()) {
            return false;
        }
    }
    var rtype = form.attr("request-type");
    var htmlBeforeLoading = "";
    if (!rtype) { rtype = "json"; }
    var isMultiPart=false;
    if (form.data("multipart")) {
        try {
            form.find("input[type=file]").each(function () {
                if ($(this).val() != "") {
                   isMultiPart = true;
               }
           });
        }catch (e){
            isMultiPart=true;
        }
    }
    if (isMultiPart) {
        var formData = new FormData(form[0]);
        formData = set_csrf_param(formData);
        var contentType = false;
        var processData = false;
        var async = true;
    } else {
        var formData = set_csrf_param(form.serialize());
        var contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
        var processData = true;
        var async = true;
    }
    var method = form.attr("method");
    $.ajax({
        type: method,
        url: form.attr('action'),
        data: formData,
        processData: processData,
        dataType: rtype,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        contentType: contentType,
        cache: false,
        async: async,
        beforeSend: function() {
            on_beforesend(form);
            htmlBeforeLoading = obj.html();
            obj.html('<i class="fa fa-spinner fa-spin"></i>');
            obj.attr("disabled", "disabled");
        },
        success: function(data) {
            if(data.status){
                alert('Your Details Submitted Sucessfully');
                if (typeof data.url!= "undefined") {
                    window.location.href = data.url;
                }
                if (typeof data.reload!= "undefined") {
                    location.reload();
                }
            }
        },
        complete: function(jqXHR, textStatus) {
            obj.prop('disabled', false).html(htmlBeforeLoading);
            on_complete(form);
            if (jqXHR.status == "500" || jqXHR.status == "403" || textStatus == "error") {
                show_notification('error',jqXHR.responseJSON.msg, jqXHR.responseJSON.status, jqXHR.responseJSON.title);
            }
        }
    });
});
function on_beforesend(form){ 
    //form.find(">.card").addClass("state-loading");
    form.addClass("state-loading");
}  
function on_complete(form){
    //form.find(">.card").removeClass("state-loading");
    form.removeClass("state-loading");
}
function set_csrf_param(param) {  
    /*var postValue = getCookie(csrf_ajax_cookie_name);
    if (postValue && postValue != "") {
        if (typeof param == "string") {
            if (param != "") {
                param += "&";
            }
            param += csrf_ajax_input_name + "=" + postValue;
        } else if (typeof param == "object") {
            try {
                if (typeof param.append === 'function') {
                    param.append(csrf_ajax_input_name, postValue);
                } else {
                  if(param.length==0){
                         param[csrf_ajax_input_name]=postValue;
                  }else{                    
                         param[csrf_ajax_input_name]=postValue;
                  }
                }
            } catch (e) {}

        }
    }*/
    return param;
}