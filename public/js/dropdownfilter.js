var $select1 = $( '#select1' ),
		$select2 = $( '#select2' ),
    $options2 = $select2.find( 'option' ),
    $select3 = $( '#select3' ),
    $options3 = $select3.find( 'option' );
    
$select1.on( 'change', function() {
	$select2.html( $options2.filter( '[source="' + this.value + '"]' ) );
	$select2.on( 'change', function() {
		$select3.html( $options3.filter( '[source="' + this.value + '"]' ) );
	} ).trigger( 'change' );
} ).trigger( 'change' );

