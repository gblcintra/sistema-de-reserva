$(document).ready(function() {

    $.ajax({
        type: 'GET',
        url: 'http://api.londrinaweb.com.br/PUC/Paisesv2/0/1000',
        contentType: "application/json; charset=utf-8",
        dataType: "jsonp",
        async: false
    }).done(function(response) {

        paises = '';

        $.each(response, function(p, pais) {

            if (pais.Pais == 'Brasil') {
                paises += '<option value="' + pais.Sigla + '-' + pais.Pais + '" selected>' + pais.Pais + '</option>';
            } else {
                paises += '<option value="' + pais.Sigla + '-' + pais.Pais + '">' + pais.Pais + '</option>';
            }

        });

        // PREENCHE O SELECT DE PAÍSES
        $('select[name="country"]').html(paises);
        countryAnduf = $('select[name="country"]').val();
        explode = countryAnduf.split("-");
        countryUf = explode[0];



        montaEstado(countryUf);

        // VERIFICA A MUDANÇA DO VALOR DO SELECT DE PAÍS
        $('select[name="country"]').change(function() {
            countryAnduf = $('select[name="country"]').val();
            explode = countryAnduf.split("-");
            countryUf = explode[0];

            if (countryUf == 'BR') {
                // SE O VALOR FOR BR E CONFIRMA OS SELECTS
                $('input[name="stateanduf"]').remove();
                $('input[name="city"]').remove();
                $('div.state').append('<select class="form-control " name="stateanduf">');
                $('div.city').append('<select class="form-control " name="city">');

                // CHAMA A FUNÇÃO QUE MONTA OS ESTADOS
                montaEstado('BR');
            } else {
                // SE NÃO FOR, TROCA OS SELECTS POR INPUTS DE TEXTO
                $('select[name="stateanduf"]').remove();
                $('select[name="city"]').remove();
                $('div.state').append('<input type="text"name="stateanduf" class="form-control" placeholder="Estado">');
                $('div.city').append('<input type="text" name="city" class="form-control" placeholder="Cidade">');
            }
        })



    });

    function montaEstado(pais) {
        $.ajax({
            type: 'GET',
            url: 'http://api.londrinaweb.com.br/PUC/Estados/' + pais + '/0/10000',
            contentType: "application/json; charset=utf-8",
            dataType: "jsonp",
            async: false
        }).done(function(response) {

            estados = '';
            $.each(response, function(e, estado) {

                estados += '<option value="' + estado.UF + '-' + estado.Estado + '">' + estado.Estado + '</option>';

            });

            input = $('input[name="city]"');

            if (input.length == 1) {
                $('div.state').html('');
                $('div.city').html('');
                $('div.state').append('<select class="form-control " name="stateanduf">');
                $('div.city').append('<select class="form-control " name="city">');
            }

            // PREENCHE OS ESTADOS BRASILEIROS
            $('select[name="stateanduf"]').html(estados);


            stateanduf = $('select[name="stateanduf"]').val();

            explode = stateanduf.split("-");
            uf = explode[0];


            // CHAMA A FUNÇÃO QUE PREENCHE AS CIDADES DE ACORDO COM O ESTADO
            montaCidade(uf, pais);

            // VERIFICA A MUDANÇA NO VALOR DO CAMPO ESTADO E ATUALIZA AS CIDADES
            $('select[name="stateanduf"]').change(function() {
                stateanduf = $('select[name="stateanduf"]').val();
                explode = stateanduf.split("-");
                uf = explode[0];

                montaCidade(uf, pais);
            });

        });
    }

    function montaCidade(estado, pais) {
        $.ajax({
            type: 'GET',
            url: 'http://api.londrinaweb.com.br/PUC/Cidades/' + uf + '/' + pais + '/0/10000',
            contentType: "application/json; charset=utf-8",
            dataType: "jsonp",
            async: false
        }).done(function(response) {
            cidades = '';

            $.each(response, function(c, cidade) {

                cidades += '<option value="' + cidade + '">' + cidade + '</option>';

            });

            // PREENCHE AS CIDADES DE ACORDO COM O ESTADO
            $('select[name="city"]').html(cidades);

        });
    }


    //acima devera ser refatorado 

    $('input[name="cep').focusout(function() {
        cep = $(this).val();
        inputStreet = $('input[name="address"]');


        $.ajax({
            type: 'GET',
            url: 'http://viacep.com.br/ws/' + cep + '/json/',
            contentType: "application/json; charset=utf-8",
            dataType: "jsonp",
            async: false
        }).done(function(response) {
            inputStreet.val("");
            street = response.logradouro;

            inputStreet.val(street);

        });

    });

});