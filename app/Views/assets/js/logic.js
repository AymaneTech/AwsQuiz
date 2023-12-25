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
                let Nothification = new Notyf();
            if (response === "1") {
                Nothification.success('Correct Answer');
            } else {
                Nothification.error('Incorrect Answer');
            }
        })
        .catch(error => console.error('Error:', error));
    fetchQuestion();
}
