<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    </head>
    <body>
        <div class="container">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="" class="navbar-brand">
                        <span class="material-icons rounded mx-auto d-block">
                            android
                        </span>
                    </a>
                    <button 
                        type="button"
                        class="navbar-toggler"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto">
                            <a href="{{ route('logout') }}" class="nav-item nav-link">
                                <button class="btn btn-outline-danger" type="submit">Log Out</button>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block" id="msgSuccess"> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Form
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special Content</h5>
                    <form action="{{ route('admin.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <input type="hidden">
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" required /></textarea>
                        </div>
                        <input type="hidden" name="createdBy" value="{{ Auth::User()->name }}">
                        <input type="hidden" name="updatedBy" value="{{ Auth::User()->name }}">
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </form>
                </div>
            </div>
            <br />
            @if ($message = Session::get('success-del'))
                <div class="alert alert-success alert-block" id="msgSuccess"> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Table Content
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="text-center">
                                    <th>Content</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $c)
                                        <tr>
                                            <td>
                                                {{ $c->contents }}
                                            </td>
                                            <td class="text-center">
                                                <a
                                                    href="admin/delete/{{$c->id}}"
                                                    class="btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure want to delete data  with code  ?')"
                                                >
                                                    <span class="material-icons">delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="d-flex justify-content-center">
                                    {{ $contents->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright float-end">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , Develop by
                    <a href="https://www.njn.com" target="_blank"
                        >NJN</a
                    >
                    </div>
                </div>
            </footer>
            <br />
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- Required Material Web JavaScript library -->
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
        <!-- Instantiate single textfield component rendered in the document -->
        <script>
            import {MDCRipple} from '@material/ripple';

            const fabRipple = new MDCRipple(document.querySelector('.mdc-fab'));
        </script>
        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/js/demos.js
                md.initDashboardPageCharts();
            });
            $(document).ready(function () {
                $('#msgSuccess').slideUp(3000).delay(10000);
            });
        </script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(){
                // add padding top to show content behind navbar
                navbar_height = document.querySelector('.navbar.fixed-top').offsetHeight;
                document.body.style.paddingTop = navbar_height + 'px';
            }); 
            // DOMContentLoaded  end
        </script>
    </body>
</html>