(function ($) {
    ///get id from form-plugin
    $("#date-of-birth").on("change", function () {
        var birthDate = $("#date-of-birth").val().split("-").join(""),
            num = birthDate.match(/(\d{4})(\d{2})(\d{2})/),
            dateObj = new Date(num[1], num[2] - 1, num[3]);
 
        var age = calculateAge(dateObj);
        if (age > 0) {
            $("#age").val(age);
        } else {
            $("#age").val("");
        }
    });

   /**
    * @type {function}
    * @param {*} birthDate 
    */
    function calculateAge(birthDate) {
        var now = new Date();

        function isLeap(year) {
            return year % 4 == 0 && (year % 100 != 0 || year % 400 == 0);
        }
        var days = Math.floor(
            (now.getTime() - birthDate.getTime()) / 1000 / 60 / 60 / 24
        );
        var age = 0;
        for (var y = birthDate.getFullYear(); y <= now.getFullYear(); y++) {
            var daysInYear = isLeap(y) ? 366 : 365;
            if (days >= daysInYear) {
                days -= daysInYear;
                age++;
            }
        }
        return age;
    }
})(jQuery);
