const StartQuiz = document.querySelector('#startQuiz');
const PseudoName = document.querySelector('#pseudoName');
const formContainer = document.querySelector('#form-container');

window.onbeforeunload = (event) =>{
    // event.preventDefault();
}

StartQuiz.addEventListener('click', function(e){
    let pseudoNameValue = PseudoName.value;
    formContainer.innerHTML = "";
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `pseudoName=${pseudoNameValue}`
    };
    fetch(`../App/Controllers/contoller.php`, options)
        .then(response => response.text())
        .then(data => {
            console.log(data);
            formContainer.innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
});
