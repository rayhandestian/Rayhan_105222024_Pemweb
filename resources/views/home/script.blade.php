<script type="text/javascript">
  
  let calendar;

  $(document).ready(function(){
      var calendarEl = document.getElementById('calendar');
      calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            right   : 'prev,next',
            center  : 'title', 
            left    : null,
          },
          locale: 'id',
          initialView: 'dayGridMonth',
          events: [],
      });
      calendar.render();
  });

</script>