$('form').on('submit', (event) => {
    event.preventDefault();

    let data = $('form').serialize();
    let jsonData = $('form').serializeArray();
    if (jsonData[1]['value'] != jsonData[2]['value']) {
        $("html, body").animate({ scrollTop: 0 }, 600);
        let alertBox = $("<div></div>").text("As senhas não são compatíveis!").addClass('alert danger-alert')
        $('info').append(alertBox).hide().delay(500).fadeIn(200);
        $('info div').delay(2400).fadeOut(500, () => {
            $('info div').remove();
        });
        return false;
    }
    
    $.ajax({
        url:"/perfil/nova-senha",
        type:"post",
        data:data,
        success: ()=>{
            $('input').val("");
            $("html, body").animate({ scrollTop: 0 }, 600);
            let alertBox = $("<div></div>").text("Senha alterada com sucesso!").addClass('alert success-alert')
            $('info').append(alertBox).hide().delay(500).fadeIn(200);
            $('info div').delay(2400).fadeOut(500,()=>{
                $('info div').remove();
            });
        },
        error: ()=>{
            $("html, body").animate({ scrollTop: 0 }, 600);
            let alertBox = $("<div></div>").text("Não foi possível alterar a senha!").addClass('alert danger-alert')
            $('info').append(alertBox).hide().delay(500).fadeIn(200);
            $('info div').delay(2400).fadeOut(500,()=>{
                $('info div').remove();
            });
        }
    })
})