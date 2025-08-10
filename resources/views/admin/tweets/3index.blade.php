@extends('layouts.admin')
@section('content')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="text-white">Manage <b>Tweets</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addTweetModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i> <span>Add New Tweet</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tweets as $tweet)
                    <tr>
                        <td>{{ $tweet->id }}</td>
                        <td>{{ Str::limit($tweet->body, 50) }}</td>
                        <td>{{ $tweet->user->name }}</td>
                        <td>{{ $tweet->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="#editTweetModal" class="edit" data-toggle="modal"
                               data-id="{{ $tweet->id }}"
                               data-body="{{ $tweet->body }}">
                               <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteTweetModal" class="delete" data-toggle="modal" data-id="{{ $tweet->id }}">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $tweets->firstItem() }}</b> to <b>{{ $tweets->lastItem() }}</b> of <b>{{ $tweets->total() }}</b> entries</div>
                <ul class="pagination">
                    @if ($tweets->onFirstPage())
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                    @else
                        <li class="page-item"><a href="{{ $tweets->previousPageUrl() }}" class="page-link">Previous</a></li>
                    @endif

                    @for ($i = 1; $i <= $tweets->lastPage(); $i++)
                        <li class="page-item {{ ($tweets->currentPage() == $i) ? 'active' : '' }}">
                            <a href="{{ $tweets->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($tweets->hasMorePages())
                        <li class="page-item"><a href="{{ $tweets->nextPageUrl() }}" class="page-link">Next</a></li>
                    @else
                        <li class="page-item disabled"><a href="#" class="page-link">Next</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="addTweetModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addTweetForm" method="POST" action="{{ route('admin.tweets.store') }}">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Tweet</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="body" required rows="3" maxlength="280"></textarea>
                        <small class="text-muted">Max 280 characters</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editTweetModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editTweetForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Tweet</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="body" id="editBody" required rows="3" maxlength="280"></textarea>
                        <small class="text-muted">Max 280 characters</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteTweetModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteTweetForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Delete Tweet</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Tweet?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Edit tweet modal
    $('#editTweetModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var body = button.data('body');
        var modal = $(this);

        modal.find('#editId').val(id);
        modal.find('#editBody').val(body);
        modal.find('#editTweetForm').attr('action', '/admin/tweets/' + id);
    });

    // Delete tweet modal
    $('#deleteTweetModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);

        modal.find('#deleteTweetForm').attr('action', '/admin/tweets/' + id);
    });
});
</script>
@endsection

@endsection


@extends('layouts.admin')
@section('content')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="text-white">Manage <b>Tweets</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addTweetModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i> <span>Add New Tweet</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tweets as $tweet)
                    <tr>
                        <td>{{ $tweet->id }}</td>
                        <td>{{ Str::limit($tweet->body, 50) }}</td>
                        <td>{{ $tweet->user->name }}</td>
                        <td>{{ $tweet->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="#editTweetModal" class="edit" data-toggle="modal"
                               data-id="{{ $tweet->id }}"
                               data-body="{{ $tweet->body }}">
                               <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteTweetModal" class="delete" data-toggle="modal" data-id="{{ $tweet->id }}">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $tweets->firstItem() }}</b> to <b>{{ $tweets->lastItem() }}</b> of <b>{{ $tweets->total() }}</b> entries</div>
                <ul class="pagination">
                    @if ($tweets->onFirstPage())
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                    @else
                        <li class="page-item"><a href="{{ $tweets->previousPageUrl() }}" class="page-link">Previous</a></li>
                    @endif

                    @for ($i = 1; $i <= $tweets->lastPage(); $i++)
                        <li class="page-item {{ ($tweets->currentPage() == $i) ? 'active' : '' }}">
                            <a href="{{ $tweets->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($tweets->hasMorePages())
                        <li class="page-item"><a href="{{ $tweets->nextPageUrl() }}" class="page-link">Next</a></li>
                    @else
                        <li class="page-item disabled"><a href="#" class="page-link">Next</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="addTweetModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addTweetForm" method="POST" action="{{ route('admin.tweets.store') }}">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Tweet</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="body" required rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editTweetModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editTweetForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Tweet</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="body" id="editBody" required rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteTweetModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteTweetForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Delete Tweet</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Tweet?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Edit tweet modal
    $('#editTweetModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var body = button.data('body');
        var modal = $(this);

        modal.find('#editId').val(id);
        modal.find('#editBody').val(body);
        modal.find('#editTweetForm').attr('action', '/admin/tweets/' + id);
    });

    // Delete tweet modal
    $('#deleteTweetModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);

        modal.find('#deleteTweetForm').attr('action', '/admin/tweets/' + id);
    });
});
</script>

@endsection

