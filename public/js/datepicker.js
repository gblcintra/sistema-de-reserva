$(document).ready(() => {

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        console.log("is mobile");
       }
       
    function GetBrowserInfo() {
        var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
       
        var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
        var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
       
        var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
        var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6
        if (isOpera) {
            return 1;
        }
        else if (isFirefox) {
            return 2;
        }
        else if (isChrome) {
            return 3;
        }
        else if (isSafari) {
            return 4;
        }
        else if (isIE) {
            return 5;
        }
        else {
            return 0;
        }
    }

    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
    {

    }
    else{
        if(GetBrowserInfo() != 2)
    {
        $('input[name="checkinSearch"]').datepicker();

    var checkin = $('input[name="checkin"]').datepicker({ format: 'yyyy-mm-dd'});
    var checkout = $('input[name="checkout"]').datepicker({ format: 'yyyy-mm-dd'});

    var dataBirth = $('input[name="dataBirth"]').datepicker({ format: 'yyyy-mm-dd'});

   

    }
    }
    



});