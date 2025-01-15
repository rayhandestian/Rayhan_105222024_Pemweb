<style>
	#calendar {
		max-width: 100%;
		margin: 0 auto;
		background-color: white;
		padding: 10px;
	}
	.fc-event {
		cursor: pointer;
		padding: 2px 5px;
	}
	.fc-daygrid-event {
		white-space: normal !important;
		align-items: normal !important;
	}
</style>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
		// First fetch the events
		$.get('{{ route("event.get-json") }}', function(events) {
			// Then initialize the calendar with the events
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				height: 'auto',
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay'
				},
				events: events,
				eventContent: function(arg) {
					return {
						html: '<div class="fc-content">' +
							  '<div class="fc-title">' + arg.event.title + '</div>' +
							  '<div class="fc-user" style="font-size: 0.8em;">By: ' + arg.event.extendedProps.user + '</div>' +
							  '</div>'
					};
				}
			});
			
			calendar.render();
		});
	});
</script>