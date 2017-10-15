$(function(){
  var doc = $.parseJSON($('#embeddedData').val());
  $('body').data('doc',doc); // This saves the doc object
  $('#bcf').text(doc.bcf);   // bcf is "balance carried forward"
  $('#odl').text(doc.odl);
  $('#cname').text(doc.cname);
  $('#caddr').text(doc.caddr.street+", "+doc.caddr.town+", "+doc.caddr.pc);

var tr = $('<tr/>');
  tr.append($('<td/>',{text:doc.spf}));
  tr.append($('<td/>',{text:'Balance carried forward'}));
  tr.append($('<td/>',{text:'','class':'num'}));
  tr.append($('<td/>',{text:'','class':'num'}));
  tr.append($('<td/>',{text:doc.bcf,'class':'num'}));
  $('#transactions').append(tr);

});

