function deletePost($page) {
    var ask = window.confirm("Are you sure you want to delete this post?");
    if (ask) {
        window.alert("This post was successfully deleted.");

        document.location.href = $page;

    }
}