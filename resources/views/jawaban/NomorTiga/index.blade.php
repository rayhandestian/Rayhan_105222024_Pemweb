<table class="table table-schedule">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jadwal</th>
            <th>Start</th>
            <th>End</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $key => $event)
        <tr>
            <td>{{ (int)$key + 1 }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->start }}</td>
            <td>{{ $event->end }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-warning edit-btn" data-toggle="modal" data-target="#editModal" data-id="{{ $event->id }}" title="Edit">
                    <i class="bi bi-pencil"></i>
                </button>
                <form method="POST" action="{{ route('event.delete') }}" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-sm btn-danger delete-btn">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.update') }}" id="editForm">
            @csrf
            <input type="hidden" name="id" id="edit_id">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_event">Nama Jadwal</label>
                    <input type="text" class="form-control" id="edit_event" name="event" required>
                </div>
                <div class="form-group">
                    <label for="edit_start">Start</label>
                    <input type="date" class="form-control" id="edit_start" name="start" required>
                </div>
                <div class="form-group">
                    <label for="edit_end">End</label>
                    <input type="date" class="form-control" id="edit_end" name="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
