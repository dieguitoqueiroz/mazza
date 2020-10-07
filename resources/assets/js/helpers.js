(function() {
    var helpers;
    helpers = {
        initialize: function () {
            helpers.masks();
            helpers.initializeDateTimePicker();
        },

        masks: function () {
            $('.date').mask('00/00/0000');
            $('.cep').mask('00000-000');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.time').mask('00:00');

            var PhoneMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                Options = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(PhoneMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('.phone').mask(PhoneMaskBehavior, Options);

            $('.email').mask("A", {
                translation: {
                    "A": { pattern: /[\w@\-.+]/, recursive: true }
                }
            });
        },

        initializeDateTimePicker: function () {
            $('.datepicker').datetimepicker({
                format: 'DD/MM/YYYY',
                locale: 'pt-BR'
            });

            $('.time').datetimepicker({
                format: 'HH:mm',
                locale: 'pt-BR'
            });
        }
    }
    helpers.initialize();
    return helpers;
})();