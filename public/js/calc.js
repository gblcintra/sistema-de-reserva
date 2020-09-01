$(function () {


    //$('input[name="checkin"]').val('');
    //$('input[name="checkout"]').val('');

    var select = $('select[name="qtdpeople"]');
    var people = $('.people');
    var divRow = $('<div class="row"></div>');
    var divCol = $('<div class="col-md-6"></div>');
    var fieldset = $('<fieldset><legend>aaaaa</legend></fieldset>');
    var formGroup = $('<div class = "form-group"></div>');
    var divInputText = $('<div class="input text"></div>');
    var input = $('<input type="text"/>');

    var table = $('<table class="table"></table>');
    var tableHead = $('<thead></thead>');
    var tableBody = $('<tbody></tbody>');

    var tr = $('<tr></tr>');

    var th1 = $('<th scope="col">#</th>');
    var th2 = $('<th scope="col">Nome</th>');
    var th3 = $('<th scope="col">Cpf</th>');
    var th4 = $('<th scope="col">Data de nascimento</th>');
    var th5 = $('<th scope="col"> Classificação de idade </th>');


    tr.append(th1);
    tr.append(th2);
    tr.append(th3);
    tr.append(th4);
    tr.append(th5);

    tableHead.append(th1);
    tableHead.append(th2);
    tableHead.append(th3);
    tableHead.append(th4);
    tableHead.append(th5);

    console.log(tr);




    selectValue = "";

    select.prop('selectedIndex', 0);

    select.change(function () {
        people.html('');
        divRow.html('');
        divCol.html('');
        fieldset.html('');
        formGroup.html('');
        divInputText.html('');
        tr.html('');

        selectValue = select.val();

        if (selectValue > 1) {
            tableBody.html('');
            for (let x = 1; x < selectValue; x++) {

                tr = $('<tr></tr>');
                td1 = $('<td>' + x + '</td>');
                td2 = $('<td></td>');
                td3 = $('<td></td>');
                td4 = $('<td></td>');
                td5 = $('<td></td>');


                td2.append('<input placeholder="Ex:Jose" class="form-control" required name="nameCompanion-' + x + '" type="text">');
                td3.append('<input required placeholder="27246699082" class="form-control" name="cpfCompanion-' + x + '" type="text">');
                td4.append('<input required  class="form-control birth" data-name="1" name="companionBirth-' + x + '" data-birth="' + x + '" type="date">');
                td5.append('<label id=' + x + '></label>');

                tr.append(td1);
                tr.append(td2);
                tr.append(td3);
                tr.append(td4);
                tr.append(td5);

                tableBody.append(tr);

            }

            table.append(tableHead);
            table.append(tableBody);
            people.append(table);


            people.append('<hr />');

            var inputHidden = $('<input type="hidden" name="peopleValue" value="' + selectValue + '"/>');

            people.append(inputHidden);



            var birth = $('input[name="companionBirth-1"]');

            birth.change(function () {
                var dataBirth = $(this).data("birth");

                var inputDateValue = $(this).val();

                var newDate = new Date;
                var dateDay = newDate.getDate();
                var dateMonth = newDate.getMonth();
                dateMonth = dateMonth + 1;
                var dateYear = newDate.getFullYear();

                var dateArray = [
                    dateYear,
                    dateMonth,
                    dateDay
                ];

                var dateNow = dateArray.join('-');
                //console.log("date now : ", dateNow);

                //console.log('inputDateValue :', inputDateValue);
                //console.log('dateNow :');
                //console.log(dataBirth);
            });

        }


    });

    dateCheckin = null;
    dateCheckout = null;



    $('input[name="checkin"]').focusout(() => {
        dateCheckin = $(this).val();
    });

    $('input[name="checkout"]').focusout(() => {
        dateCheckout = $(this).val();
    });

    var quantityPeople = $('.qtdpeople').val();
    //console.log(quantityPeople);

    $('.qtdpeople').change(() => {
        quantityPeople = $('.qtdpeople').val();
        //console.log(quantityPeople);
    });

    var url_atual = window.location.host;
    //console.log(url_atual);
    var cashAjax = null;

    $.ajax({
        type: 'GET',
        url: 'http://' + url_atual + '/dailyValue',
        dataType: "json",
        async: false,
        success: function (res) {
            cashAjax = res.data.dailyValue;
            //console.log(cashAjax);
        },
        error: function (error) {
            //console.log(error);
        }
    });




    $(document).on('focusout', 'input[data-name="1"]', (event) => {
        var dataId = null;
        var input = $(event.target);
        dataBirth = input.attr('data-birth');
        value = input.val();
        value = value.split('-');
        var label = $('label[id="' + dataBirth + '"]');
        label.html('');


        age = idade(new Date(value[0], value[1], value[2]), new Date());
        label.append(age + ' Anos');
        console.log(peoplea);

    });
    const peoplea = {
        free: 0,
        sock: 0,
        entire: 0,
    }



    $('#calcPeople').click((event) => {
        event.preventDefault();



    });

    $('input[name="final"]').click(() => {
        if ($('input[name="responsible"]').is(":checked")) {
            calculo();
            $('input[name="final"]').submit();
        }
        else {
            alert('Por Favor aceitar o regulamento');
        }
    });

    Number.prototype.pad = function (size, character = "0") {
        var s = String(this);
        while (s.length < (size || 2)) { s = character + s; }
        return s;
    }



    function idade(nascimento, hoje) {
        var diferencaAnos = hoje.getFullYear() - nascimento.getFullYear();
        if (new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate()) <
            new Date(hoje.getFullYear(), nascimento.getMonth(), nascimento.getDate()))
            diferencaAnos--;
        if (diferencaAnos < 0) {
            return 0;
        }
        return diferencaAnos;
    }

    $('button[name="calcular"]').click((event) => {
        event.preventDefault();
        calculo();

    });
    function a() {
        var select = selectValue;

        peoplea.free = 0;
        peoplea.sock = 0;
        peoplea.entire = 0;

        var da = $('input[name="dataBirth"]').val();
        da = da.split('-');

        ages = idade(new Date(da[0], da[1], da[2]), new Date());

        console.log('ages', ages);

        if (ages >= 0 && ages < 8) {
            peoplea.free++;
        }
        if (ages > 7 && ages < 12) {
            peoplea.sock++;
        }
        if (ages > 11) {
            peoplea.entire++;
        }
        console.log(peoplea);


        for (let x = 1; x <= select; x++) {

            var content = null;
            content = $('input[name="companionBirth-' + x + '"]');
            var v = null;
            v = content.val();
            var a = v.split('-');
            console.log('v = ', v);
            console.log('a = ', a);

            age = idade(new Date(a[0], a[1], a[2]), new Date());
            console.log('idade', age);

            if (age >= 0 && age < 8) {
                peoplea.free++;
                console.log('free =  ', peoplea.free);
            }
            if (age > 7 && age < 12) {
                peoplea.sock++;
                console.log('sock =  ', peoplea.sock);
            }
            if (age > 11) {
                peoplea.entire++;
                console.log('entire =  ', peoplea.entire);
            }

        }
        return;
    }

    function calculo() {
        console.log('peoplea', peoplea);
        a();


        dateCheckin = $('input[name="checkin"]').val();
        dateCheckout = $('input[name="checkout"]').val();

        if (dateCheckin == null) {
            alert('Por favor preencher o campo de checkin');
            $('input[name="checkin"]').val('');
        }
        if (dateCheckout == null) {
            alert('Por favor preencher o campo de checkout');
            $('input[name="checkout"]').val('');
        };

        if (dateCheckin != null && dateCheckout != null) {
            var checkin = $('input[name="checkin"]').val();
            var checkout = $('input[name="checkout"]').val();

            var dayNumber = tiraData(checkin, checkout);

            var type = $('select[name="type"]').val();
            //console.log(type);
            if (Math.sign(dayNumber) == -1) {
                alert('Não é possivel deixar o dia do checkout menor que o dia de checkin');
                $('input[name="checkin"]').val('');
                $('input[name="checkout"]').val('');

            }
            else {

                var checkoutExplode = checkout.split('-');

                var checkoutColor = new Date(checkoutExplode[0], checkoutExplode[1] - 1, checkoutExplode[2]);

                checkoutColor = checkoutColor.getDay();

                //console.log('d', checkoutColor);

                var canvas = $('canvas[id="colorBracelet"]');
                var colorBracelets = null;

                $.ajax({
                    type: 'GET',
                    url: 'http://' + url_atual + '/colorBracelets',
                    dataType: "json",
                    async: false,
                    success: function (res) {
                        colorBracelets = res.data;
                    },
                    error: function (error) {
                        //console.log(error);
                    }
                });

                var keyColors = Object.keys(colorBracelets);
                var keyColors = keyColors[checkoutColor];
                var colorBracelets = colorBracelets[keyColors];

                canvas.css('background-color', colorBracelets);



                var canvass = $('<canvas></canvas>');

                var cash = cashAjax * dayNumber * quantityPeople;
                //console.log(cash);
                //console.log("quantidade de pessoas" + quantityPeople );
                var resume = $('fieldset[name="resume"]');
                var div = $('<div></div>');
                div.html('');
                resume.html('');

                div.append('<span>Numero de pessoas : ' + quantityPeople + '</span>');
                div.append('<ul><li>Adultos : ' + peoplea.entire + '</li>   <li>Crianças de 8 a 11 anos : ' + peoplea.sock + '</li>  <li>Crianças de 0 a 7 anos : ' + peoplea.free + '</li></ul>');

                div.append('Data de Entrada : ' + checkin + '<br>');
                div.append('Data de Saida : ' + checkout + '<br>');

                
                div.append('Tipo de acomodação : <br>');
                div.append('<ul> <li>Motor Home: ' + $('input[name=motorHome]').val() + '</li>    <li>Kombi Home: ' + $('input[name=KombiHome]').val() + '</li>    <li>Barraca de teto : ' + $('input[name=barracaTeto]').val() + '</li>    <li>Barraca : ' + $('input[name=barraca]').val() + '</li>   </ul>')


                div.append('<span>Você ficara hospedado  :' + dayNumber + ' dias</span><br>');
                div.append('<span>Ficaram Hospedados um total de ' + quantityPeople + ' pessoa(s)</span><br>');
                div.append('<span>O valor da diaria é : R$ ' + cashAjax + ' </span>');
                div.append('<h2>O total da sua reserva é :' + cash + ' </h2> <hr>');

                div.append('<h4>Para confirmar a reserva, é necessário  depositar ou transferir metade do valor.</h4><br/>');
                div.append('<h4>Dados para depósito:</h4><br/>');
                div.append('<h4>Banco 341 - Itaú</h4><br/>');
                div.append('<h4> Agência: 5247</h4><br/>');
                div.append('<h4>C/C: 00915-1</h4><br/>');
                div.append('<h4>Titular: Francisca Rodrigues da Costa</h4><br/>');
                div.append('<h4>CPF: 770.664.136-87</h4><br/>');
                div.append('<h4> Atencao: enviar o comprovante para o Whatsap: 37 99865 2667</h4><br/>');
                div.append('<h4>Citar o código da reserva : XXX</h4><br/>');
                div.append('<h4>O restante do pagamento deverá ser feito no check in</h4><br/>');

                var inputCash = $('<input type="hidden" name="inputCash" value="' + cash + '"/>');

                div.append(inputCash);
                if (peoplea.free != null) {
                    var free = $('<input type="hidden" name="peopleFree" value="' + peoplea.free + '"/>');
                    div.append(free);
                }

                if (peoplea.sock != null) {
                    var sock = $('<input type="hidden" name="peopleSock" value="' + peoplea.sock + '"/>');
                    div.append(sock);
                }

                if (peoplea.entire != null) {
                    var entire = $('<input type="hidden" name="peopleEntire" value="' + peoplea.entire + '"/>');
                    div.append(entire);
                }


                resume.append(div);

                //console.log('checkin', checkin);
                //console.log('checkout', checkout);
                //console.log('dayNumber', dayNumber);
            }

        }
    }

});




/*
function tiraData(checkinn, checkoutn) {
    var checkinArray = checkinn.split('-');
    var checkoutArray = checkoutn.split('-');

    var checkinValue = checkinArray[0] + checkinArray[1] + checkinArray[2];
    var checkoutValue = checkoutArray[0] + checkoutArray[1] + checkoutArray[2];

    var result = (checkoutValue - checkinValue);
    console.log('total de dias = ' , result);
    console.log('checkin = ',checkinValue);
    console.log('checkout = ',checkoutValue);
    return result;
}
*/

function tiraData(checkinn, checkoutn) {
    var checkinArray = checkinn.split('-');
    var checkoutArray = checkoutn.split('-');

    checkinn = new Date(checkinArray[0], checkinArray[1], checkinArray[2]);
    checkoutn = new Date(checkoutArray[0], checkoutArray[1], checkoutArray[2]);
    console.log('resultado = ', (checkoutn - checkinn) / (1000 * 3600 * 24));
    return (checkoutn - checkinn) / (1000 * 3600 * 24);
}