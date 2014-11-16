function subComp() {
    $('form .form-group').removeClass('has-error');
    var result = $('#iframSub').contents();
    if(result[0].documentElement.childNodes[1].innerHTML != '')
    {
        var data = JSON.parse(result[0].documentElement.childNodes[1].innerHTML);
        var error = '';
        for (var i = 0; i < data.length; i++) 
        {
            if(data[i].type == 'error') {
                error += '<li>' + data[i].Message + '</li>';
                $('input[name=' + data[i].Element + ']').parent('dd').parent('dl').parent('.form-group').addClass('has-error');
            }
            if(data[i].type == 'success') {
            	window.onbeforeunload = null;
                window.location = data[i].SuccessURL.replace(/&amp;/g, '&');
            }
        }
        if(error != '') {
        	$('#formSubmission').addClass('bg-danger');
        	error = '<h3>Errors</h3><ul>' + error + '</ul>';
        	$('#formSubmission').html(error);
        }
    }
    else
    {
        $('#formSubmission').hide();
        $('#formSubmission').html('<p><img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>Submiting form, please wait...</p>');
    }
}
function formSubmit() {
	$('#formSubmission').removeClass('bg-danger');
    $('#formSubmission').show();
}