var input = document.querySelector("#phone");
window.intlTelInput(input, {
    separateDialCode: true,
    initialCountry: "bd",
});

$(".iti--allow-dropdown").addClass('custom-w-100');

$("#phone").on("keypress", function (e) {
    var charCode = (e.which) ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
});

$("#phone").on("input", function (e) {
    e.preventDefault();
    var phoneNumber = $("#phone").val();
    var countryCode = $(".iti__selected-dial-code").html();
    newPhoneNumber = countryCode + phoneNumber;
    $("#phone2").val(newPhoneNumber);
});
