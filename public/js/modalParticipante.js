




// function mostrarpd(){
//     alert("hola mundo");
  
//   //     document.getElementById('pdmodificar').style.display= 'none';
//   //     document.getElementById('pddetalle').style.display= 'inline';
//   //     document.getElementById('cnl_participante').style.display= 'inline';
//   //     document.getElementById('del_participante').style.display= 'inline';
//   //     document.getElementById('actualizar_participante').style.display= 'inline';
//   //     document.getElementById('guardar_participante').style.display= 'none';
      
  
//   //     //Para desactivar ciertos controles
//   //     document.getElementById("pdnombres").disabled = true;
//   //     document.getElementById("pdapellidos").disabled = true;
//   //     document.getElementById("pdfechanacimiento").disabled = true;
//   //     document.getElementById("sexo1").disabled = true;
//   //     document.getElementById("sexo2").disabled = true;
//   //     document.getElementById("sexo3").disabled = true;
//   //     document.getElementById("pddui").disabled = true;
//   //     document.getElementById("pdnit").disabled = true;
//   //     document.getElementById("pdcarnetminoridad").disabled = true;
//   //     document.getElementById("pddireccion").disabled = true;
//   //     document.getElementById("pdtelefono").disabled = true;
//   //     document.getElementById("pdemail").disabled = true;
//   //     //document.getElementById("ppass").disabled = true;
//   //     document.getElementById("pestado1").disabled = true;
//   //     document.getElementById("pestado2").disabled = true;
  
//     }
    
//   //   function ocultarpd(){
      
//   //     document.getElementById('cnl_participante').style.display= 'inline';
//   //     document.getElementById('del_participante').style.display= 'none';
//   //     document.getElementById('actualizar_participante').style.display= 'none';
//   //     document.getElementById('guardar_participante').style.display= 'inline';
  
//   //     document.getElementById('pddetalle').style.display= 'none';
//   //     document.getElementById('pdmodificar').style.display= 'inline';
//   //     //Para activar ciertos controles
//   //     document.getElementById("pdnombres").disabled = false;
//   //     document.getElementById("pdapellidos").disabled = false;
//   //     document.getElementById("pdfechanacimiento").disabled = false;
//   //     document.getElementById("sexo1").disabled = false;
//   //     document.getElementById("sexo2").disabled = false;
//   //     document.getElementById("sexo3").disabled = false;
//   //     document.getElementById("pddui").disabled = false;
//   //     document.getElementById("pdnit").disabled = false;
//   //     document.getElementById("pdcarnetminoridad").disabled = false;
//   //     document.getElementById("pddireccion").disabled = false;
//   //     document.getElementById("pdtelefono").disabled = false;
//   //     document.getElementById("pdemail").disabled = false;
//   //     //document.getElementById("ppass").disabled = false;
//   //     document.getElementById("pestado1").disabled = false;
//   //     document.getElementById("pestado2").disabled = false;
//   //   }
  
//   //   function activarpdid(){
//   //     //Para activar ciertos controles
//   //     document.getElementById("pdid").disabled = false;
     
//   //   }
//   //   function activarpid(){
//   //     //Para activar ciertos controles
//   //     document.getElementById("pid").disabled = false;
     
//   //   }
  
//     $(document).ready(function() {
//         $(".actu").click(function() {
//         var dp0 = "";
//         var dp1 = "";
//         var dp2 = "";
//         var dp3 = "";
//         var dp4 = "";
//         var dp5 = "";
//         var dp6 = "";
//         var dp7 = "";
//         var dp8 = "";
//         var dp9 = "";
//         var dp10 = "";
//         var dp11 = "";
//         var dp12 = "";
        

//         // Obtenemos todos los valores contenidos en los <td> de la fila
//         // seleccionada
//         $(this).parents("tr").find(".dp0").each(function() {
//           dp0 += $(this).html() ;
//         });
//         $(function () {$('#pdid').val(dp0);});
  
  
//         $(this).parents("tr").find(".dp1").each(function() {
//           dp1 += $(this).html() ;
//         });
//         $(function () {$('#pdnombres').val(dp1);});
  
//         $(this).parents("tr").find(".dp2").each(function() {
//           dp2 += $(this).html() ;
//         });
//         $(function () {$('#pdapellidos').val(dp2);});
  
//         $(this).parents("tr").find(".dp3").each(function() {
//           dp3 += $(this).html() ;
//         });
//         $(function () {$('#pdfechanacimiento').val(dp3);});
  
//         $(this).parents("tr").find(".dp5").each(function() {
//           dp5 += $(this).html() ;
//         });
//         $(function () {$('#pddui').val(dp5);});
  
//         $(this).parents("tr").find(".dp6").each(function() {
//           dp6 += $(this).html() ;
//         });
//         $(function () {$('#pdnit').val(dp6);});
  
//         $(this).parents("tr").find(".dp7").each(function() {
//           dp7 += $(this).html() ;
//         });
//         $(function () {$('#pdcarnet_minoridad').val(dp7);});
  
//         $(this).parents("tr").find(".dp8").each(function() {
//           dp8 += $(this).html() ;
//         });
//         $(function () {$('#pddireccion').val(dp8);});
        
  
//         $(this).parents("tr").find(".dp9").each(function() {
//           dp9 += $(this).html() ;
//         });
//         $(function () {$('#pdtelefono').val(dp9);});
  
//         $(this).parents("tr").find(".dp10").each(function() {
//           dp10 += $(this).html() ;
//         });
//         $(function () {$('#pdemail').val(dp10);});
  
//         // $(this).parents("tr").find(".dp11").each(function() {
//         //   dp11 += $(this).html() ;
//         // });
//         // $(function () {$('#ppass').val(dp11);});
    
  
//         $(this).parents("tr").find(".dp12").each(function() {
//           dp12 += $(this).html();
//         });
//         if (dp12==1) {  
//           document.getElementById("pdestado1").checked= true;
//          } else {
//           document.getElementById("pdestado2").checked= true;
//         }
        
//         $(this).parents("tr").find(".dp4").each(function() {
//           dp4 += $(this).html() ;
//         });
//         if (dp4=="FEMENINO") {  
//           document.getElementById("pdsexo1").checked= true;
//         }else{
//           if(dp4=="MASCULINO"){
//           document.getElementById("pdsexo2").checked= true;
//           }else{
//           document.getElementById("pdsexo3").checked= true;
//           }
//         }
        
//       });
//     });
  
  
//     $(document).ready(function () {
  
//       $('#pdui').attr('required',true);
//       $('#pnit').attr("required",true);
//       $('#pcarnet').attr("required",true);
  
//       $('#pdui, #pnit, #pcarnet').keyup(function () {
//           $('#pdui').attr('required',true);
//           $('#pnit').attr("required",true);
//           $('#pcarnet').attr("required",true);
//               var reqdui = $('#pdui').val().length == 10;
//               var reqnit = $('#pnit').val().length == 17;
//               var reqcarnet = $('#pcarnet').val().length == 7;
  
//               if (reqdui) {
//                   $('#pnit').removeAttr("required");
//                   $('#pcarnet').removeAttr("required");
//               }
  
//               if (reqnit) {
//                   $('#pdui').removeAttr("required");
//                   $('#pcarnet').removeAttr("required");
//               }
//               if (reqcarnet) {
//                   $('#pnit').removeAttr("required");
//                   $('#pdui').removeAttr("required");
//               }
              
//       });
//   });
  
  
  
  
  
  
  
  
  
  
  