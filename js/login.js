$('form').on('submit',(event)=>{
    event.preventDefault();
    let data = $('form').serialize();
    $.ajax({
        url:"/login",
        type:"post",
        data:data,
        success: (data)=>{
            window.location.href="/";
        },
        error: ()=>{
            $("html, body").animate({ scrollTop: 0 }, 600);
            let alertBox = $("<div></div>").text("Credênciais incorretas!").addClass('alert danger-alert')
            $('info').append(alertBox).hide().delay(100).fadeIn(200);
            $('info div').delay(2000).fadeOut(500,()=>{
                $('info div').remove();
            })
        }
    })
})