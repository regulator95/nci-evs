alert("hello");

$(".button").click(function(e) {

    $("body").append('<div class="overlay"></div>');
    $(".popup").show();

    $(".close").click(function(e) {
        $(".popup, .overlay").hide();
        $('#loginFrm').trigger("reset");
    });

});

$('#download_meta').bind('click', function(e){
        e.preventDefault();
})

$("#loginSubmit").click(function(e) {
    $.ajax({
        url: 'UTSServlet',
        type: 'post',
        data: $('#loginFrm').serialize(),
        error: function(xhr, statusText, err){
            alert("UMLS Login unsuccessful");
        },
        success : function (result)
        {
                $('#download_meta').removeClass('disabled')
            ticket = result;
        }
    });
});

$('#download_meta').click(function(e){
    e.preventDefault();
        if ($(this).hasClass('disabled'))
        {
        return false;
        }
        else
        {
        document.location.href='UMLSServlet?ticket='+ticket
        }
});
