$.ajax({
    method: 'GET',
    url: 'https://api.api-ninjas.com/v1/quotes?category=fitness',
    headers: { 'X-Api-Key': '2huoxKC86AaxZs+iUC9TcQ==SZ72WH3Udd7cVuFv'},
    contentType: 'application/json',
    success: function(result) {
        $('.quote-box').text(',,' + result[0].quote + "''");
    },
    error: function ajaxError(jqXHR) {
        console.error('Error: ', jqXHR.responseText);
    }
});