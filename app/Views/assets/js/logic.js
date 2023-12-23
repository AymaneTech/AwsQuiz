let answerId = document.querySelectorAll("#answerId");



function questionAnswered(id){
    const option = {
        method: 'post',
        headers: {
            'content-type': 'application/x-www-form-urlencoded',
        },
        body : `answeredId=${id}`,
    }
    fetch (`../App/Controllers/controller.php`, option)
        .then(response => response.text())
        .then(response => {
            console.log("send");
        })
        .catch(error => console.error('Error:', error));
        fetchQuestion();
    console.log("hello from function questionAnswered");

}