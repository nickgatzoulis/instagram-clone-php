$(document).ready(() => {
    $(".feed").on('click', '.comment', (event) => {
        let pid = event.target.id.split("_")[1];
        $(`#postid_${pid}.feed-comments`).load('../../includes/get_comments.php', {pid:pid});
    });
});