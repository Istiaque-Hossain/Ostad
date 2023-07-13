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

                // Get current date and time
                const now = new Date();

                // Get the components of the date and time
                const year = now.getFullYear();
                const month = String(now.getMonth() + 1).padStart(2, "0");
                const day = String(now.getDate()).padStart(2, "0");
                const hours = String(now.getHours()).padStart(2, "0");
                const minutes = String(now.getMinutes()).padStart(2, "0");
                const seconds = String(now.getSeconds()).padStart(2, "0");

                // Format the date and time
                const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

                // console.log(formattedDateTime);

                newCommentDiv1.textContent = formattedDateTime;
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

document.addEventListener("DOMContentLoaded", function () {
    const dateConvert = document.getElementsByClassName("bio");
    Array.from(dateConvert).forEach((element) => {
        // utc = element.innerText.toLocaleString();
        // element.innerText = utc;
        const utc = element.innerText;
        const localDateTime = new Date(utc).toLocaleString();
        element.innerText = localDateTime;
    });
});
