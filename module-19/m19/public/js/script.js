// import axios from "axios";

document.addEventListener("DOMContentLoaded", function () {
    const commentForm = document.getElementById("comment-form");
    const commentsList = document.getElementById("comment-list");

    commentForm.addEventListener("submit", function (event) {
        event.preventDefault();
        // console.log('hiiiiiiiiiiiiiiiiii');

        const formData = new FormData(commentForm);
        const commentName = formData.get("name");
        const commentEmail = formData.get("email");
        const commentCmnt = formData.get("cmnt");
        const blogId = commentForm.getAttribute("action").split("/")[4];

        console.log(blogId);
        axios
            .post(`/post/${blogId}/comment`, {
                name: commentName,
                email: commentEmail,
                cmnt: commentCmnt,
            })
            .then((response) => {
                const comment = response.data;
                const newCommentElement = document.createElement("li");

                const newCommentDiv1 = document.createElement("div");
                newCommentDiv1.classList.add("vcard", "bio");

                const now = new Date();
                // const formattedTime = now.toLocaleString("en-US", {
                //     format: "YYYY-MM-DD HH:mm:ss",
                // });

                newCommentDiv1.textContent = now;
                newCommentElement.appendChild(newCommentDiv1);

                const newCommentDiv = document.createElement("div");
                newCommentDiv.classList.add("comment-body");

                const h3Element = document.createElement("h3");
                h3Element.textContent = comment.name;
                newCommentDiv.appendChild(h3Element);

                const h6Element = document.createElement("h6");
                h6Element.textContent = comment.email;
                newCommentDiv.appendChild(h6Element);

                const pElement = document.createElement("p");
                pElement.textContent = comment.cmnt;
                newCommentDiv.appendChild(pElement);

                newCommentElement.appendChild(newCommentDiv);

                commentsList.appendChild(newCommentElement);
                commentForm.reset();
            })
            .catch((error) => {
                console.error(error);
            });
    });
});
