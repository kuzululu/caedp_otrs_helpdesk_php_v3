$(document).ready(function(){
	$(".datePicker").datepicker({
		dateFormat: "mm/dd/yy",
		// change year and month
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:c" // 1900AD to 2013 + 10 years(1900:c+10)
	});


	$(".dateTimePicker").datetimepicker({
		dateFormat: "mm/dd/yy",
        timeFormat: "hh:mm tt",
        ampm: true,

        // Auto current date & time
        defaultDate: new Date(),

        // Office hours only: 7AM – 7PM
        hourMin: 7,
        hourMax: 19,

        // UI options
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:c",
        controlType: "select",
        oneLine: true,

        // Enable buttons
        showButtonPanel: true,
        showNowButton: true,

        // Minutes step (recommended)
        stepMinute: 5,

        // Prevent selecting past date
        minDate: 0
	});

});

