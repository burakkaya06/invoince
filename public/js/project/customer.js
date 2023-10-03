$(document).ready(function() {
    $('#createCustomerModal').on('shown.bs.modal', function (e) {
        var timestamp = new Date().getTime();
        $('#customer_id_name').val(parseInt(timestamp/1000));
    });
});
$(document).ready(function() {
    $('#createCustomerModal').on('hidden.bs.modal', function (e) {
        $('#customer_id_name').val('');
    });
});

$(document).ready(function() {
    $('#customer_id_name').on('blur keypress', function(e) {
        // Eğer event 'blur' ise ya da 'keypress' ve tuş 'Enter' ise kontrol et
        if(e.type === 'blur' || (e.type === 'keypress' && e.which === 13)) {
            var customerId = $(this).val();

            $.ajax({
                url: '/customer/check-customer-id',
                method: 'POST',
                data: {
                    customer_id_name: customerId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Önceki uyarıları kaldır
                    $('.alert-message').remove();

                    if(response.exists) {
                        // Müşteri ID'si varsa uyarı göster
                        $('#customer_id_name').css('border-color', 'red');
                        $('<div class="alert-message" style="color: red;">This Customer ID already exists!</div>').insertAfter('#customer_id_name');
                    } else {
                        // Müşteri ID'si yoksa çerçeve rengini yeşil yap
                        $('#customer_id_name').css('border-color', 'green');
                    }
                }
            });

            // Eğer 'Enter' tuşuna basıldıysa formun submit olmasını engelle
            if(e.type === 'keypress') {
                e.preventDefault();
            }
        }
    });
});
