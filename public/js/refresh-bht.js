function fetchBHTData() {
    $.ajax({
        url: $('meta[name="fetch-bht-data-url"]').attr('content'),
        type: 'GET',
        success: function(data) {
            console.log(data); // Add this line to log the response data
            $('#parts').val(data.partbht_id);

            // Set the value for #customers
            $('#customers').val(data.customerbht_id).trigger('change');
            $('#qty').val(data.qtybht_id).trigger('change');

            // Trigger the change event for #parts after a short delay
            setTimeout(function() {
                $('#parts').trigger('change');
            }, 50); // Adjust the delay as needed
        },
        error: function(xhr, status, error) {
            console.error("Error fetching BHT data:", xhr.responseText);
        }
    });
}

    $(document).ready(function() {
        $('#refresh-bht').on('click', function(e) {
            e.preventDefault();
            // clearCustomersSelect();
            fetchBHTData();
        });
    });
