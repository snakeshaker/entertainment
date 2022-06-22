$(document).ready(function (){
    $('#date_timepicker_start').datetimepicker({
        format:'Y/m/d',
        onShow:function( ct ){
            this.setOptions({
                maxDate:$('#date_timepicker_end').val()?$('#date_timepicker_end').val():false
            })
        },
        timepicker:false
    });
    $('#date_timepicker_end').datetimepicker({
        format:'Y/m/d',
        onShow:function( ct ){
            this.setOptions({
                minDate:$('#date_timepicker_start').val()?$('#date_timepicker_start').val():false
            })
        },
        timepicker:false
    });
});
