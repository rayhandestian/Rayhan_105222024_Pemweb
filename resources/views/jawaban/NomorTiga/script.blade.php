<script type="text/javascript">
	$(document).ready(function() {
		// Initialize DataTable
		var table = $('.table-schedule').DataTable({
			language: {
				paginate: {
					next: '<i class="bi bi-arrow-right"></i>',
					previous: '<i class="bi bi-arrow-left"></i>'
				},
				emptyTable: "Data tidak ditemukan",
			},
			order: [[0, 'asc']]
		});

		// Handle edit button click
		$('.edit-btn').click(function() {
			var id = $(this).data('id');
			
			// Fetch data
			$.get("{{ route('event.get-selected-data') }}?id=" + id, function(data) {
				// Set values directly
				document.getElementById('edit_id').value = data.id;
				document.getElementById('edit_event').value = data.name;
				document.getElementById('edit_start').value = data.start;
				document.getElementById('edit_end').value = data.end;
				
				// Show modal after setting values
				$('#editModal').modal('show');
			});
		});

		// Handle form submission
		$('#editForm').submit(function(e) {
			e.preventDefault();
			
			$.ajax({
				url: $(this).attr('action'),
				type: 'POST',
				data: $(this).serialize(),
				success: function(response) {
					// Close the modal using Bootstrap's method
					$('#editModal').modal('hide');
					// Remove any remaining backdrop
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					// Show success message
					alert(response.message);
					// Reload the page since we don't have AJAX DataTable setup
					window.location.reload();
				},
				error: function(xhr) {
					alert('Error: ' + xhr.responseJSON.message);
				}
			});
		});

		// Handle delete button click
		$('.delete-btn').click(function(e) {
			e.preventDefault();
			if (!confirm('Are you sure?')) return;

			var form = $(this).closest('form');
			
			$.ajax({
				url: form.attr('action'),
				type: 'POST',
				data: form.serialize(),
				success: function(response) {
					alert(response.message);
					window.location.reload();
				},
				error: function(xhr) {
					alert('Error: ' + xhr.responseJSON.message);
				}
			});
		});
	});
</script>