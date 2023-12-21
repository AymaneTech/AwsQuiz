const StartQuiz = document.querySelector('#startQuiz');
const PseudoName = document.querySelector('#pseudoName');
const formContainer = document.querySelector('#form-container');

startQuiz.addEventListener('click', function(e){
    let pseudoNameValue = PseudoName.value;
    formContainer.innerHTML = "";
    formContainer.style.display = "none";
    const option = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `pseudoName=${pseudoNameValue}`
    };
    fetch(`../App/Controllers/contoller.php`, option)
        .then((response) =>{
            console.log(response);
        });
});
