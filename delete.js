function deletePost($page) {
    var ask = window.confirm("Are you sure you want to delete this post?");
    if (ask) {
        document.location.href = $page;

    }
}