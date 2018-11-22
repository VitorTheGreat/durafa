// function calcula_desconto(){
//   var subtotal = parseFloat(document.getElementById('subtotal').value, 10);
//   var desconto = parseFloat(document.getElementById('desconto').value, 10);
//
//   var total = subtotal - desconto;
//
//   document.getElementById('mostra_total').innerHTML = total;
//   document.getElementById('total_desconto').value = total;
//
// }

// MASCARA DE MOEDA
function maskIt(w,e,m,r,a){

    // Cancela se o evento for Backspace
    if (!e) var e = window.event
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;

    // Variáveis da função
    var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
    var mask = (!r) ? m : m.reverse();
    var pre  = (a ) ? a.pre : "";
    var pos  = (a ) ? a.pos : "";
    var ret  = "";
    if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;

    // Loop na máscara para aplicar os caracteres
    for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
    if(mask.charAt(x)!='#'){
    ret += mask.charAt(x); x++; }
    else {
    ret += txt.charAt(y); y++; x++; } }

    // Retorno da função
    ret = (!r) ? ret : ret.reverse()
    w.value = pre+ret+pos;
}
// Novo método para o objeto 'String'
String.prototype.reverse = function(){
return this.split('').reverse().join('');
};
function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}


function calcula_desconto_porcentagem(){
  var subtotal = parseFloat(document.getElementById('subtotal').value, 10);
  var porcentagem = parseFloat(document.getElementById('desconto_porcentagem').value, 10);

  var valor_desconto = subtotal*porcentagem/100;

  var total = subtotal - valor_desconto;

  document.getElementById('mostra_total').innerHTML = number_format(total,2, ',', '.');
  document.getElementById('mostra_desconto').value = number_format(valor_desconto,2, ',', '.');
  document.getElementById('desconto').value = valor_desconto;
  document.getElementById('total_desconto').value = total;

}

function calcula_troco(){

  var total = parseFloat(document.getElementById('total_desconto').value, 10);
  var valor_pago = parseFloat(document.getElementById('valor_pago').value, 10);

  var troco = valor_pago - total;

  document.getElementById('mostra_troco').innerHTML = number_format(troco,2, ',', '.');
  document.getElementById('troco').value = troco;


}


function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }


//função para escolher quais etiquetas Imprimir
//deixar as selecionadas aparencendo e as nao selecionadas não aparecerendo
//ACHAR JEITO MELHOR PARA NAO FICAR TUDO ISSO DE CÓDIGO, NÃO CONSEGUI COM LOOP FOR OU LOOP WHILE


  $('[name=check1]').click(function(){

      if($(this).val()=="true"){
        $('[name=1]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=1]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check2]').click(function(){

      if($(this).val()=="true"){
        $('[name=2]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=2]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check3]').click(function(){

      if($(this).val()=="true"){
        $('[name=3]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=3]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check4]').click(function(){

      if($(this).val()=="true"){
        $('[name=4]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=4]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check5]').click(function(){

      if($(this).val()=="true"){
        $('[name=5]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=5]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check6]').click(function(){

      if($(this).val()=="true"){
        $('[name=6]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=6]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check7]').click(function(){

      if($(this).val()=="true"){
        $('[name=7]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=7]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check8]').click(function(){

      if($(this).val()=="true"){
        $('[name=8]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=8]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check9]').click(function(){

      if($(this).val()=="true"){
        $('[name=9]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=9]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check10]').click(function(){

      if($(this).val()=="true"){
        $('[name=10]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=10]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check11]').click(function(){

      if($(this).val()=="true"){
        $('[name=11]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=11]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check12]').click(function(){

      if($(this).val()=="true"){
        $('[name=12]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=12]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check13]').click(function(){

      if($(this).val()=="true"){
        $('[name=13]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=13]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check14]').click(function(){

      if($(this).val()=="true"){
        $('[name=14]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=14]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check15]').click(function(){

      if($(this).val()=="true"){
        $('[name=15]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=15]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check16]').click(function(){

      if($(this).val()=="true"){
        $('[name=16]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=16]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check17]').click(function(){

      if($(this).val()=="true"){
        $('[name=17]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=17]').css("visibility","visible");
            $(this).val("true");
          }

      });

  $('[name=check18]').click(function(){

      if($(this).val()=="true"){
        $('[name=18]').css("visibility","hidden");
        $(this).val("false");
        }
        else{
            $('[name=18]').css("visibility","visible");
            $(this).val("true");
          }

      });
