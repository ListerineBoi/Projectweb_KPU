var $select1 = $( '#select1' ),
	$select2 = $( '#select2' ),
    $select3 = $( '#select3' ),
	$select4 = $( '#select4' ),
	$select1_1 = $( '#select1_1' ),
    $select2_2 = $( '#select2_2' ),
	$select3_3 = $( '#select3_3' );
    
    

	$select1.on( 'change', function() {
		var value = $(this).val();
	 	var dt = $(this).attr("dt");
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url:"/fetch/"+dt,
			method:"GET",
			data:{value:value, _token:_token,},
			success:function(result)
			{
			$select2.html(result);
			}
		})
		$select2.on( 'change', function() {
			var value = $(this).val();
			var dt = $(this).attr("dt");
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"/fetch/"+dt,
				method:"GET",
				data:{value:value, _token:_token,},
				success:function(result)
				{
				$select3.html(result);
				}
			})
			$select3.on( 'change', function() {
				var value = $(this).val();
				var dt = $(this).attr("dt");
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"/fetch/"+dt,
					method:"GET",
					data:{value:value, _token:_token,},
					success:function(result)
					{
					$select4.html(result);
					}
				})
			} ).trigger( 'change' );
		} ).trigger( 'change' );
	} ).trigger( 'change' );

	$select1_1.on( 'change', function() {
		var value = $(this).val();
	 	var dt = $(this).attr("dt");
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url:"/fetch/"+dt,
			method:"GET",
			data:{value:value, _token:_token,},
			success:function(result)
			{
			$select2_2.html(result);
			}
		})
		$select2_2.on( 'change', function() {
			var value = $(this).val();
			 var dt = $(this).attr("dt");
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"/fetch/"+dt,
				method:"GET",
				data:{value:value, _token:_token,},
				success:function(result)
				{
				$select3_3.html(result);
				}
			})
			
		} ).trigger( 'change' );
	} ).trigger( 'change' );

