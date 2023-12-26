let answerId = document.querySelectorAll(".answer-item");
let counter = 0;
var correctionArray = [];

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
                let Notification = new Notyf();
            if (response === "1") {
                Notification.success('Correct Answer');
            } else {
                let data = response.slice(1);
                data = JSON.parse(data);
                correctionArray.push(data);
                localStorage.setItem("correction", JSON.stringify(correctionArray));
                Notification.error('Incorrect Answer');
            }
        })
        .catch(error => console.error('Error:', error));
    fetchQuestion();
}
