var $dis1 = $( '#dis1' );
$dis1.on( 'change', function() {
    if(this.value=='n'){
        $('#dis').prop('selectedIndex',0);
        $("#dis").attr('disabled', true);
    }else if(this.value=='y'){
        $("#dis").attr('disabled', false);
    }
} ).trigger( 'change' );