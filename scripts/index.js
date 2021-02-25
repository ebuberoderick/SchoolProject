// ====================calender
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var d = new Date();
    var mon = d.getMonth() + 1;
    var day = d.getDate();
    var year = d.getFullYear();
    if (mon < 10) {
        if (day < 10) {
            var currentDay = year + '-' + '0' + mon + '-' + '0' + day;
        } else {
            var currentDay = year + '-' + '0' + mon + '-' + day;
        }
    } else {
        if (day < 10) {
            var currentDay = year + '-' + mon + '-' + '0' + day;
        } else {
            var currentDay = year + '-' + mon + '-' + day;
        }
    }
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridDay,listMonth'
        },
        initialDate: currentDay,
        navLinks: true,
        selectable: true,
        selectMirror: true,
        businessHours: true,
        editable: true,
        select: function(arg) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                })
            }
            calendar.unselect()
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
            /*  call events from database */
        ]
    });

    calendar.render();
});

$.ajax({
    url: 'present.php',
    cache: false,
    success: function(retData) {
        $('.presestud').val(retData);
    }
});
$.ajax({
    url: 'absent.php',
    cache: false,
    success: function(retData) {
        $('.abstud').val(retData);
    }
});
$.ajax({
    url: 'present.php',
    cache: false,
    success: function(retData) {
        $('.wardPresent').val(retData);
    }
});
$.ajax({
    url: 'absent.php',
    cache: false,
    success: function(retData) {
        $('.wardAbsent').val(retData);
    }
});
$.ajax({
    url: 'wks.php',
    cache: false,
    success: function(retData) {
        $('.wks').val(retData);
    }
});
$.ajax({
    url: 'monday.php',
    cache: false,
    success: function(retData) {
        $('.mon').val(retData);
    }
});
$.ajax({
    url: 'tuse.php',
    cache: false,
    success: function(retData) {
        $('.tuse').val(retData);
    }
});
$.ajax({
    url: 'wed.php',
    cache: false,
    success: function(retData) {
        $('.wed').val(retData);
    }
});
$.ajax({
    url: 'thur.php',
    cache: false,
    success: function(retData) {
        $('.thur').val(retData);
    }
});
$.ajax({
    url: 'fri.php',
    cache: false,
    success: function(retData) {
        $('.fri').val(retData);
    }
});



$.ajax({
    url: 'adminMessageStudent.php',
    cache: false,
    success: function(retData) {
        $('.adminMessageStudent').html(retData);
    }
});




var barChartData = {
    datasets: [{
        backgroundColor: 'rgba(126, 228, 228, 0.74)',
        borderColor: 'rgba(126, 228, 228, 0.74)',
        data: [
            randomScalingFactor() + 1000,
            randomScalingFactor() + 1000,
            randomScalingFactor() + 1000,
            randomScalingFactor() + 1000,
            randomScalingFactor() + 1000,
        ]
    }]

};
var student = document.getElementById('studentcanvas').getContext('2d');
var myBar = new Chart(student, {
    type: 'bar',
    data: barChartData,
    options: {
        responsive: true,
        legend: {
            display: false,
        },
        title: {
            display: true,
            text: 'My attendence for this term'
        },
        scales: {
            x: {
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: "Week"
                }
            },
            y: {
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: "Number Of Day's Present"
                }
            }
        }
    }
});

var i = 1;
var text = [];
var daily = [];
setInterval(() => {
    $week = $('.wks').val().length + 1;
    while (i < $week) {
        $fri = i;
        $.ajax({
            type: 'get',
            url: 'numerAttd.php',
            data: { 'fri': $fri },
            cache: false,
            success: function(returnData) {
                daily.push(returnData);
            }
        });
        text.push("week " + [i]);
        i++;
    }
    myBar.config.data.labels = text;
    myBar.config.data.datasets[0].data = daily;
    myBar.update();
}, 300);