var $dis1 = $( '#dis1' );
$dis1.on( 'change', function() {
    if(this.value=='n'){
        $('#dis').prop('selectedIndex',0);
        $("#dis").attr('disabled', true);
    }else if(this.value=='y'){
        $("#dis").attr('disabled', false);
    }
} ).trigger( 'change' );

var $dis2 = $( '#dis2' );
$dis2.on( 'change', function() {
    if(this.value=='2'){
        $('#select2_2').prop('selectedIndex',0);
        $("#select2_2").attr('disabled', true);
    }else if(this.value=='0'){
        $("#select2_2").attr('disabled', false);
    }
} ).trigger( 'change' );