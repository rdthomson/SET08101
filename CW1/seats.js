$(function(){
	//Get flight details from the server
	$.getJSON('booking1.json',function(d){
		$('#whereFrom').text(d.whereFrom);
		$('#whereTo').text(d.whereTo);
		$('#whereTo1').text(d.whereTo);
		$('#numSeats').text(d.numSeats);
		$('#numSeats1').text(d.numSeats);
		$('#unitPrice').text(d.unitPrice);
		$('#flightId').text(d.flightId);

		//Change flight date and times to GMT and removes the letters GMT and :00 for the seconds
   		var leave = new Date(d.departAt);
   		$('#date').text(leave.toUTCString().slice(0,-7));

		var depart = new Date(d.departAt);
		$('#takeOffTime').text(depart.toUTCString().slice(0,-7));

		var arrive = new Date(d.arriveAt);
		$('#landTime').text(arrive.toUTCString().slice(0,-7));

		//Get subTotal for price and display on page
		var unitPrice = (d.unitPrice);
		var numSeats = (d.numSeats);
		var subTotal = unitPrice * numSeats;
		$('#subTotal').text(subTotal);

		//Total for payment by debit
		$('#debitTotal').text(subTotal);

		//Total for payment by credit
		var additionalPayment = subTotal/100*2;
		var creditTotal = additionalPayment+subTotal;
		creditTotal = creditTotal.toFixed(2);
		$('#creditTotal').text(creditTotal);

		//Removes text from the table and adds a free class
    		$('td.n').empty().addClass('free');

		//Updates table with data from JSON file removes the free class and adds a taken class to the seats that have already been booked
		for (i = 0; i < 138; i++) { 
			if (d.alloc[i] == 1){
				$($('td.n')[i]).removeClass('free').addClass('taken');
   			}
		}

		//Manages the click function to allow the user to select and unselect a seat
		$('td.n').click(function(){
			var selectedSeats = $('td.n.selected').length;
			if(selectedSeats < 4 && $(this).hasClass('free')){
				$(this).removeClass('free').addClass('selected');
				$('#seatsAlloc').text(selectedSeats + 1);
			}
			else{
				if($(this).hasClass('selected')){
					$(this).removeClass('selected').addClass('free');
					$('#seatsAlloc').text(selectedSeats - 1);
				}
			}
		});
	});
})