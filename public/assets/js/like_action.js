$(document).ready(() => {
    $(".like").click((event) => {
        let id = event.target.id;
        let split_id = id.split("_");
        let pid = split_id[1];
        $(event).removeClass('far');

        $.ajax({
            type: "POST",
            url: "../../includes/like_action.php",
            data: {pid:pid},
            success: (data) => {

            }
        });
    });
});