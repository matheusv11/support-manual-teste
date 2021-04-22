function openModal(id, title) {
    $("#remove-id").val(id);
    $("#remove-message").text(`Você deseja mesmo remover o post '${title}'?`);
    $("#alert").modal({
        fadeDuration: 200
    });
}
$('#remove-post').on('click', (event) => {
    let post_id = $('#remove-id').val();
    $.ajax({
        url: "/remover",
        type: "post",
        data: { post_id: post_id },
        success: () => {
            $(`tr[post-id="${post_id}"]`).fadeOut(400,()=>{
                $(`tr[post-id="${post_id}"]`).remove();
            })
            $("html, body").animate({ scrollTop: 0 }, 600);
            let alertBox = $("<div></div>").text("Post removido com sucesso!").addClass('alert success-alert')
            $('info').append(alertBox).hide().delay(500).fadeIn(200);
            $('info div').delay(2400).fadeOut(1000, () => {
                $('info div').remove();
            });
        },
        error: () => {
            $("html, body").animate({ scrollTop: 0 }, 600);
            let alertBox = $("<div></div>").text("Não foi possível remover o post!").addClass('alert danger-alert')
            $('info').append(alertBox).hide().delay(100).fadeIn(200);
            $('info div').delay(2000).fadeOut(500, () => {
                $('info div').remove();
            })
        }
    })
})