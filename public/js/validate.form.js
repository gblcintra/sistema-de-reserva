jQuery.validator.addMethod("CPF", function (value, element) {
    value = jQuery.trim(value);

    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
    while (cpf.length < 11) cpf = "0" + cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }

    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11 - x
    }
    b = 0;
    c = 11;

    for (y = 0; y < 10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11 - x;
    }

    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

    return this.optional(element) || retorno;

}, "Informe um CPF válido");

jQuery.validator.addMethod("NAMEVALIDATE", function (value, element) {
    value = jQuery.trim(value);
    return this.optional(element) || value;
}, 'Por favor digitar apenas o primeiro nome');

jQuery.validator.addMethod("SURNAMEVALIDATE", function (value, element) {
    value = jQuery.trim(value);
    //console.log(value);
    function somente_letras(value) {
        return value = value.replace(/[^\w\.]|\d/g, ' ');
    };
    
    return this.optional(element) || somente_letras(value);
}, 'Por favor digitar apenas  sobrenome');


$(function () {
    $('form[name="formIndicators"]').validate({
        highlight: function (element) {
            $(element).closest('div').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('div').removeClass('has-error').addClass("has-success");
        },
        errorClass: "text-danger",
        validClass: "text-sucess",
        errorElement: "div",
        rules: {
            name: {
                required: true,
                minlength: 3,
                NAMEVALIDATE: "required NAME-VALIDATE"
            },
            surname: {
                required: true,
                minlength: 2,
                SURNAMEVALIDATE: "required SURNAMEVALIDATE"
            },
            cpf: {
                required: true,
                CPF: "required CPF",
                maxlength: 11,
                digits: true
            },
            email: {
                required: true,
                email: true
            },
            qtdpeople: "required",
            phone: {
                required: true,
               
            },
            city: "required",
            stateanduf: "required",
            country: "required",
            cep: {
                required: true,
                number: true,
                digits: true,
                minlength: 8,
                maxlength: 8,
            },
            address: "required",
            addressnumber: {
                required: true,
                min: 0
            },
            modelcar: "required",
            placa: "required",
            color: "required",
            type: "required",
            checkin: "required",
            checkout: "required"
        },
        messages: {
            name: {
                required: "Nome é obrigatorio",
                minlength: "Por favor Digite Um Nome Valido",
            },
            surname: {
                required: "Sobrenome é obrigatorio",
                minlength: "Sobrenome muito curto"
            },
            cpf: {
                required: "CPF é obrigatorio",
            },
            email: {
                required: "E-mail é obrigatorio",
                email: "Por Favor insirir um nome valido"
            },
            qtdpeople: "Por Favor preencher esse campo",
            phone: {
                required: "O telefone é obrigatorio",
            },
            city: "A cidade é obrigatoria",
            state: "O Estado é Obrigatorio",
            country: "O Pais é obrigatorio",
            cep: {
                required: "O campo é obrigatorio",
                number: "por favor colocar um numero valido",
                digits: "apenas numeros",
                minlength: "No minimo 8 digitos",
                maxlength: "No maximo 8 digitos",
                
            },
            address: "O endereco é obrigatorio",
            addressnumber: {
                required: "O numero da residencia é obrigatorio",
                min: "esse numero nao é valido"
            },
            modelcar: "Modelo do Carro é obrigatorio",
            placa: "Placa é obrigatorio",
            color: "Cor é obrigatorio",
            type: "Tipo do veiculo é obrigatorio",
            checkin: "checkin é obrigatorio",
            checkout: "checkout é obrigatorio"
        }

    });
});