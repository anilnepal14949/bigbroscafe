$(document).ready(function() {
    $("#customFile").on("change", function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#displayImage > img").remove();
                $("#displayImage").html(
                    '<img src="' +
                        e.target.result +
                        '" width="50" height="50" style="border: 1px solid #f00;"/>'
                );
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});
