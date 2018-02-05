$(document).ready(() => {
    $(".feed").load('../../includes/get_feed.php');

    // Post Like Ajax request
    $(".feed").on('click', '.like', (event) => {
        let id = event.target.id;
        let split_id = id.split("_");
        let pid = split_id[1];

        $.ajax({
            url: '../../includes/like_action.php',
            method: 'POST',
            data: {pid:pid},
            success: (data) => {
                event.target.classList.remove('far');
                event.target.classList.add('fas');
                event.target.classList.remove('like');
                event.target.classList.add('unlike');
            }
        });
    });

    $(".feed").on('click', '.unlike', (event) => {
        let unlike_id = event.target.id;
        let split_unlike_id = unlike_id.split("_");
        let unlike_pid = split_unlike_id[1];

        $.ajax({
            url: '../../includes/unlike_action.php',
            method: 'POST',
            data: {unlike_pid:unlike_pid},
            success: (data) => {
                event.target.classList.remove('fas');
                event.target.classList.add('far');
                event.target.classList.remove('unlike');
                event.target.classList.add('like');
            }
        });
    });

});