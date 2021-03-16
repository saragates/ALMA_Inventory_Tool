var API_SERVICE = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/";
var API_REDIRECT = "php/barcodeReportRedirect.php";

//Location validation Regular Expression
var LOC_REGEX = /STACKS/;

//Location format message
var LOC_MSG = "Invalid Location";


//Barcode validation Regular expression
var BARCODE_REGEX = /^[A-Z0-9\-]{5,14}$/;

//Barcode Format message
var BARCODE_MSG = "Enter a 5-14 digit barcode containing only numbers, letters, and dashes";

