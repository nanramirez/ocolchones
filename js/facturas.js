function noEspaciosEnBlanco(value, element, param){
	if(/^\s+$/.test(value)){
		return false;
	}else{
		return true;
	}
}
$.validator.addMethod("noEspacios", noEspaciosEnBlanco, "No debe contener solo espacios");

$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Selecciona el medio");


$.validator.setDefaults({
    highlight: function(element) {
      $(element)
        .css({border:"red solid 5px"});
    },
    unhighlight: function(element) {
      $(element)
        .css({border:""});
    },
 });



$(document).ready(function(){
	$("#transporte").focus();
	$("#btn").on("click",function(){
		$("form").validate({
			rules:{
				nombre:{required:true, minlength:1, maxlength:50, noEspacios:true},
				transporte:{valueNotEquals:"Selecciona"},
				cantidadUnidades:{required:true},
				costoUnidad:{required:true},
				descuento:{required:true}
			},messages:{
				nombre:{
					required:"Nombre obligatorio",
					minlength:"Debes ingresar tu nombre",
					maxlength:"Revasaste el valor de caracteres permitido"},
				cantidadUnidades:{
					required:"La cantidad de unidades es necesaria"},
				costoUnidad:{
					required:"El costo del precio diario es obligatorio"},
				descuento:{
					required:""}
			}, submitHandler:function(form){
				var datos="transporte="+$("#transporte").val()
						+"&nombre="+$("#nombre").val()
						+"&cantidadUnidades="+$("#cantidadUnidades").val()
						+"&costoUnidad="+$("#costoUnidad").val()
						+"&descuento="+$("#descuento").val();
				$.ajax({
					type:"POST",
					url:"facturas.php",
					data: datos, 
					success:function(data){
						if(data=="Generada"){
							alert("Factura generada correctamente.");
							window.location.replace("facturasGeneradas.php");
						}else{
							alert(data);
							$("#transporte").focus();
						}
					}
				});
			}
		});
	});
});
