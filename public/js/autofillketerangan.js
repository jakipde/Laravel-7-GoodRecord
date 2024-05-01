function generateAutofillText(productCount) {
    var currentDate = new Date();
    var currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');
    var currentDay = currentDate.getDate().toString().padStart(2, '0');
    var currentTime = currentDate.getHours() * 100 + currentDate.getMinutes();
    var timeSlot;

    if (currentTime >= 630 && currentTime <= 1200) {
        timeSlot = 1;
    } else if (currentTime >= 1200 && currentTime <= 1930) {
        timeSlot = 2;
    } else if (currentTime >= 1930 && currentTime <= 2400) {
        timeSlot = 3;
    } else if (currentTime >= 0 && currentTime <= 630) {
        timeSlot = 4;
    } else {
        timeSlot = 5;
    }    

    var autofillText = currentDay + '-' + currentMonth + '-H ' + timeSlot + '-' + productCount;
    $('#keterangan').val(autofillText);
}

$.ajax({
    url: '/api/getProductCount', // Your API endpoint to fetch product count
    type: 'GET',
    success: function(response) {
        // Assuming 'response' contains the product count
        var currentDate = new Date().getDate().toString().padStart(2, '0');
        var currentMonth = (new Date().getMonth() + 1).toString().padStart(2, '0');
        var currentTimeSlot = response.currentTimeSlot; // Assuming this is part of the response
        var productCount = response.productCount; // Assuming this is part of the response
        var autofillText = `${currentDate}-${currentMonth}-H ${currentTimeSlot}-${productCount}`;
        $('#keterangan').val(autofillText);
    },
    error: function(xhr, status, error) {
        console.log("bisa tapi k0k error?");
    }
});

    $(document).ready(function() {
        // Get the current time slot
        var currentTimeSlot = "{{ $currentTimeSlot }}"; // Ensure it's a string
    });
