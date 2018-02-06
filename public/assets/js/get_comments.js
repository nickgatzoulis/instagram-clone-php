$(document).ready(() => {

    // On click on .comment class...
    $(".feed").on('click', '.comment', (event) => {
        // Fetch the pid of the post
        let pid = event.target.id.split("_")[1];

        // Toggle the class
        $(`#postid_${pid}.feed-comments`).toggleClass('hide-comment');

        // If the selected feed comment has class of 'hide-content'...
        if ($(`#postid_${pid}.feed-comments`).hasClass('hide-comment')) {

            // ..then display the comment section and load comments
            $(`#postid_${pid}.feed-comments`).show();

            // ..and change the class to fas
            $(`#postid_${pid}.comment`).removeClass('far').addClass('fas');

            // Load into the appropriate post, the comments.
            // Pass pid as POST argument via .load() method
            $(`#postid_${pid}.feed-comments`).load('../../includes/get_comments.php', {pid:pid});
        } else {
            // Else.. just hide
            $(`#postid_${pid}.feed-comments`).hide();

            // ..and change the class to far
            $(`#postid_${pid}.comment`).removeClass('fas').addClass('far');
        }


    });

    $(".feed").on('keydown', '.post-comment', (event) => {
        if (event.keyCode == 13) {
            let pid = event.target.id.split("_")[1];
            let comment_content = $(`#postid_${pid}.post-comment`).val();


            $.ajax({
                url: '../../includes/post_comment.php',
                method: 'POST',
                data: {pid:pid, comment_content:comment_content},
                success: (data) => {
                    // On success, re-load the contents of the appropriate comment section
                    $(`#postid_${pid}.feed-comments`).load('../../includes/get_comments.php', {pid:pid});
                }
            });

        }

    });
});