$(() => {
    let timer = 3;

    var interval = setInterval(() => {
        $(".countdown").text(timer);
        timer--;
        if (timer < 0) {
            clearInterval(interval);
            window.location.replace('/public');
        }
    }, 1000);
});