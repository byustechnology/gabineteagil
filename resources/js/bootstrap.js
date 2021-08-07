window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('jquery-mask-plugin');

    // Tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

        $('.sidebar-toggler').click(function() {
            $('#mainNavigation').toggleClass('d-none')
        })

        // Sends a user confirmation before deleting 
        // a resource.
        $('.confirm-delete').click(function(event)
        {
            event.preventDefault();

            var form = $(this).parents('form');
            var confirmation = confirm('Tem certeza que deseja remover este item? Este procedimento é irreversível.');

            if(confirmation) {
                form.submit();
            }
        });

        // Masked inputs
        var celularRule = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        celularOption = {
            onKeyPress: function(val, e, field, options) {
                field.mask(celularRule.apply({}, arguments), options);
            }
        };
        $('.hora').mask('00:00');
        $('.celular').mask(celularRule, celularOption);
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.cep').mask('00000-000');

    });

} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
