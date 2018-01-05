$("#segmento_id").change(event => {
	$.get(`modelos/${event.target.value}`, function(res, sta){
		$("#modelo_id").empty();
		res.forEach(element => {
			$("#modelo_id").append(`<option value=${element.id}> ${element.titulo} </option>`);
		});
	});
});