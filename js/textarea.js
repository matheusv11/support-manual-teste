$("#postCode").on("change keyup paste", (e) => {
    updatePreview($("#postCode").val());
})
function updatePreview(newHtml) {
    $("#preview").html(newHtml);
}

updatePreview($("#postCode").val());

document.getElementById('postCode').addEventListener('keydown', function (e) {
    if (e.keyCode == 9) {
        e.preventDefault();
        var start = this.selectionStart;
        var end = this.selectionEnd;

        this.value = this.value.substring(0, start) + "  " + this.value.substring(end);
        this.selectionStart = this.selectionEnd = start + 2;
    }
});

function switchTopBottom() {
    if ($("#top").html() == "") {
        $("#top").html($("#bottom").html());
        $("#bottom").html("");
        $("#switch")[0].innerText = "Switch to Bottom";
    } else {
        $("#bottom").html($("#top").html());
        $("#top").html("");
        $("#switch")[0].innerText = "Switch to top";
    }
}