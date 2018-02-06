$(document).ready(() => {

    // On click on .comment class...
    $(".feed").on('click', '.comment', (event) => {

        // Fetch the pid of the post
        let pid = event.target.id.split("_")[1];

        // Load into the appropriate post, the comments.
        // Pass pid as POST argument via .load() method
        $(`#postid_${pid}.feed-comments`).load('../../includes/get_comments.php', {pid:pid});

    });

    $(".feed").on('keydown', '.post-comment', (event) => {
        if (event.keyCode == 13) {
            let pid = event.target.id.split("_")[1];
            alert(pid);
        }

    });
});