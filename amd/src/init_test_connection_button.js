define('local_cf_odoo_sync/init_test_connection_button', ['jquery'], function($) {
    return {
        init: function() {
            $(document).ready(function() {
                $('#id_local_cf_odoo_sync_test_connection').click(function() {
                    var data = {
                        action: 'test_connection'
                    };
                    $.ajax({
                        url: M.cfg.wwwroot + '/local/cf_odoo_sync/ajax.php',
                        data: data,
                        dataType: 'json',
                        method: 'POST'
                    }).done(function(response) {
                        alert(response.message);
                    }).fail(function() {
                        alert('Failed to connect to Odoo.');
                    });
                });
            });
        }
    };
});
