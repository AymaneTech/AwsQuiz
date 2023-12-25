let answerId = document.querySelectorAll(".answer-item");
let counter = 0;

function questionAnswered(id, questionId) {
    counter++;

    const option = {
        method: 'post',
        headers: {
            'content-type': 'application/x-www-form-urlencoded',
        },
        body: `answeredId=${id}&questionFk=${questionId}`,
    }
    fetch(`../App/Controllers/controller.php`, option)
        .then(response => response.text())
        .then(response => {
            console.log(response)
            if (response === "1") {
                console.log("good");
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            } else {
                console.log("bad");
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            }
        })
        .catch(error => console.error('Error:', error));
    fetchQuestion();
    console.log("aymane ", counter);
}
