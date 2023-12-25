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
                // alert("correct answer")
            } else {
                // alert("wrong answer")
                console.log("bad");
            }
        })
        .catch(error => console.error('Error:', error));
    fetchQuestion();
    console.log("aymane ", counter);
}
