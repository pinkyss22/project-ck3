$(window).load(function () {
    $('#banner').nivoSlider({ pauseTime: 5000, pauseOnHover: false });
    setTimeout(function () {
        $('#slider2').nivoSlider({ pauseTime: 5000, pauseOnHover: false });
    }, 1000);
    setTimeout(function () {
        $('#slider3').nivoSlider({
            pauseTime: 5000,
            pauseOnHover: false,
            controlNavThumbs: true
        });
    }, 2000);
    setTimeout(function () {
        $('#slider4').nivoSlider({
            effect: 'boxRandom,boxRain,boxRainReverse,boxRainGrow,boxRainGrowReverse',
            pauseTime: 5000,
            pauseOnHover: false,
            boxCols: 8,
            boxRows: 4
        });
    }, 3000);
});