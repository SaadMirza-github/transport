jQuery(document).ready(function ($) {
    /** ******************************
     * Simple WYSIWYG
     ****************************** **/
    $('#editControls a').click(function (e) {
        e.preventDefault();
        switch ($(this).data('role')) {
            case 'h1':
            case 'h2':
            case 'h3':
            case 'p':
                document.execCommand('formatBlock', false, $(this).data('role'));
                break;
            default:
                document.execCommand($(this).data('role'), false, null);
                break;
        }

        var textval = $("#editor").html();
        $("#editorCopy").val(textval);
    });

    $("#editor").keyup(function () {
        var value = $(this).html();
        $("#editorCopy").val(value);
    }).keyup();

    $('#checkIt').click(function (e) {
        e.preventDefault();
        alert($("#editorCopy").val());
    });
});


var options3 = {
    series: [{
        name: 'Manager',
        data: [44, 55, 41, 37, 22, 43, 21]
    }, {
        name: 'QA',
        data: [23, 22, 23, 22, 13, 13, 12]
    }, {
        name: 'Dispatcher',
        data: [22, 27, 21, 29, 15, 21, 20]
    }, {
        name: 'Order Taker',
        data: [25, 12, 19, 32, 25, 24, 10]
    }, {
        name: 'Reborn Kid',
        data: [9, 7, 5, 8, 6, 9, 4]
    }],
    colors: ['#705ec8', '#fa057a', '#2dce89', '#ff5b51', '#fcbf09'],
    chart: {
        type: 'bar',
        height: 300,
        stacked: true,
    },
    plotOptions: {
        bar: {
            horizontal: true,
        },
    },
    stroke: {
        width: 1,
        colors: ['#fff']
    },
    xaxis: {
        categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
        labels: {
            formatter: function (val) {
                return val + "K"
            }
        }
    },
    yaxis: {
        title: {
            text: undefined
        },
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val + "K"
            }
        }
    },
    fill: {
        opacity: 1
    },
    legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: 40
    }
};
var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
chart3.render();