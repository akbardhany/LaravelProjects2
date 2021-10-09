<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    {{-- <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(){
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.logos').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
        }); 
        // DOMContentLoaded  end
    </script>
</head>
<body>
    <div class="container">
        <div class="content-fluid">
            <div class="text-center logos">
                <span class="material-icons rounded mx-auto d-block">
                    android
                </span>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="/search" method="GET">
                        <div class="input-group mb-3">
                            <div class="form-floating flex-grow-1">
                                <input type="text" class="form-control" name="search" placeholder="Search Keywords" required />
                                <label for="search">Search Keywords</label>
                            </div>
                            <button type="submit" class="input-group-text btn-success">
                                <span class="material-icons">search</span>
                            </button>
                        </div>
                    </form>
                {{-- <div class="form-floating mb-3">
                    <input type="text" class="search form-control form-control-lg" id="floatingInput" placeholder="Search Here">
                    <label for="floatingInput">Search Keyword</label>
                    <button type="submit" class="input-group-text btn-success"><i class="bi bi-search me-2"></i> Search</button>
                </div> --}}
                    {{-- <div class="input-group mb-3">
                        <div class="form-floating">
                            <input type="text" name="search" id="search" class="search form-control form-control-lg" id="floatingInput" placeholder="keywords">
                            <label for="floatingInput">Search Keyword</label>
                            <button type="submit" class="input-group-text btn-success">
                                <span class="material-icons">search</span>
                            </button>
                            <select name="livesearch" id="livesearch" class="livesearch form-control"></select>
                        </div>
                    </div> --}}
                    {{-- <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Search Here">
                        <button type="submit" class="input-group-text btn-success">
                            <span class="material-icons">search</span>
                        </button>
                    </div> --}}
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Content
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body" id="result">
                            @foreach ($contents as $c)
                                <p>
                                    {{$c->contents}}
                                </p>
                            @endforeach
                                <div class="d-flex justify-content-center">
                                    {{ $contents->links('pagination::bootstrap-4') }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-touch-target-wrapper float-end position-relative">
                <a href="{{ route('login') }}">
                    <button class="mdc-fab mdc-fab--touch">
                    <div class="mdc-fab__ripple"></div>
                    <span class="material-icons mdc-fab__icon">login</span>
                    <div class="mdc-fab__touch"></div>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{-- <script>
        $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:'/livesearcha',
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('p').html(data.table_data);
                        // $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script> --}}
    {{-- <script type="text/javascript">
        $('.livesearch').select2({
            placeholder: 'type keyword',
            ajax: {
                url: '/livesearcha',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.contents,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script> --}}
    <!-- Required Material Web JavaScript library -->
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <!-- Instantiate single textfield component rendered in the document -->
    <script>
        import {MDCRipple} from '@material/ripple';

        const fabRipple = new MDCRipple(document.querySelector('.mdc-fab'));
    </script>
    {{-- <script>
        $(document).ready(function(){
            load_data();
            function load_data(query)
            {
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                    else
                {
                    load_data();
                }
            });
        });
    </script> --}}
</body>
</html>