$(document).ready(() => {
    $(".like").click((event) => {
        let id = event.target.id;
        let split_id = id.split("_");
        let pid = split_id[1];

        $.ajax({
            type: "POST",
            url: "../../includes/like_action.php",
            data: {pid:pid},
            success: (data) => {
                event.target.classList.remove('far');
                event.target.classList.add('fas');
                event.target.classList.remove('like');
                event.target.classList.add('unlike');
            }
        });
    });

    $(".unlike").click((event) => {
        let id = event.target.id;
        let split_id = id.split("_");
        let pid = split_id[1];

        $.ajax({
            type: "POST",
            url: "../../includes/unlike_action.php",
            data: {pid:pid},
            success: (data) => {
                event.target.classList.remove('fas');
                event.target.classList.add('far');
                event.target.classList.remove('unlike');
                event.target.classList.add('like');
            }
        });
    });
});