(function () {

  var comment,
    navbarDropdown,
    commentData,
    commentBox;

  $(function () {
    comment = $('#comment');
    navbarDropdown = $('#navbarDropdown');
    commentData = $('#comment-data');
    commentBox = $('#comment-box');
    commentBox.animate({scrollTop: commentBox[0].scrollHeight}, 'fast');

    $("#submit").on("click", () => {
      post_comment();
    });
  });

  function post_comment() {
    if (comment.length === 0 || comment.val() === '') return false;

    var postdata = {"comment": comment.val()};
    $.ajaxSetup({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.post(
      "chat/register",
      postdata,
    );

    var date = new Date(),
      name = navbarDropdown.text(),
      html = `
<div class="media comment-visible">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user" id="name">${name}</span>
            <span class="comment-body-time" id="created_at">${date.toLocaleString()}</span>
        </div>
        <span class="comment-body-content" id="comment">${comment.val()}</span>
    </div>
</div>
`;

    commentData.append(html);
    commentBox.animate({scrollTop: commentBox[0].scrollHeight}, 'fast');

    comment.val("");
  }
}());
