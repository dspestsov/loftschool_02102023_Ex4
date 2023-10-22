$(document).ready(function() {
    $('#sendForm').submit(function (e) {
        e.preventDefault();
        let values = $(this).serialize();

        $.ajax({
            type: "POST",
            url: './src/index.php',
            data: values,
            success: function (res) {
                let html = 'Стоимость километра: ' + res.distanceCost + "<br>";
                html += 'Стоимость минуты (часа, если тариф почасовой): ' + res.timeCost + "<br>";
                html += 'Сумма: ' + res.calc;
                $('#result').html(html);
            }
        });
    });
});