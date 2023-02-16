$(document).ready(function () {
    if ($('#defaultAlert') != null ) {
        $('#defaultAlert').show('fade');
            setTimeout(function(){
                $('#defaultAlert').hide('fade');
            }, 8000);
    }

    if ($('#specialAlert') != null ) {
        $('#specialAlert').show('fade');
    }
});