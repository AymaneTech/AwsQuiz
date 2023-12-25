function timing(){
    var timer;
    let ele = document.getElementById("timer");
    (function () {
        var seconds = 20;
        timer = setInterval(() => {
            ele.innerHTML = seconds;
            seconds--;
            if (seconds <= 5) {
                ele.style.color = "red";
                if (seconds < 0) {
                    clearInterval(timer);
                }
            }
        }, 1000);
    })();
}