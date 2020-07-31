<div class="col-md-3">
    <a href="{{ route('messages.create') }}" class="btn btn-primary btn-block mb-3">Compose</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Folders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                    <a href="{{ route('messages.index') }}" class="nav-link">
                        <i class="fas fa-inbox"></i> Inbox
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-envelope"></i> Sent
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-trash-alt"></i> Trash
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Labels</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
