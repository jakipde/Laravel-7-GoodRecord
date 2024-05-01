var isBHTDataFetched = false; // Flag to track if BHT data has been fetched

$(document).ready(function() {
    $('#parts').change(function() {
        console.log("parts change event triggered");
        var partId = $(this).val();

        if (!isBHTDataFetched) { // Check if BHT data has been fetched
            console.log("BHT data not fetched, emptying customers and qty");
            $('#customers').empty();
            $('#qty').empty();

            var selectedRelation = relations.find(relation => relation.part_id == partId);

            var customerName = getCustomerName(selectedRelation.customer_id);
            $('#customers').append('<option value="' + selectedRelation.customer_id + '"> ' + customerName + '</option>');

            var qtyName = getQTYName(selectedRelation.qty_id);
            $('#qty').append('<option value="' + selectedRelation.qty_id + '"> ' + qtyName + '</option>');
        } else {
            console.log("BHT data fetched, not emptying customers");
        }
    });

    $('.select2').select2();

    function getCustomerName(customerId) {
        var customer = customers.find(customer => customer.id == customerId);
        return customer ? customer.name : 'kosong';
    }

    function getQTYName(qtyId) {
        var qty = qtys.find(qty => qty.id == qtyId); // Change qty to qtys
        return qty ? qty.name : 'kosong';
    }
    
});

function fetchBHTData() {
    $.ajax({
        url: $('meta[name="fetch-bht-data-url"]').attr('content'),
        type: 'GET',
        success: function(data) {
            console.log(data); // Add this line to log the response data
            $('#parts').val(data.part_id).trigger('change');
            $('#customers').val(data.customer_id).trigger('change');
            $('#qty').val(data.qty_id).trigger('change');
            isBHTDataFetched = true; // Set flag to true after fetching BHT data
        },
        error: function(xhr, status, error) {
            console.error("Error fetching BHT data:", xhr.responseText);
        }
    });
}
