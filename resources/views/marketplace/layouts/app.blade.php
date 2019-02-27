<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - RootOwl</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/waitMe.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/pnotify.custom.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @yield('css')
</head>
<body>
@yield('content')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/waitMe.min.js') }}"></script>
<script src="{{ asset('js/pnotify.custom.min.js') }}"></script>
<script src="{{ asset('js/developer.js') }}"></script>
<script>
$(function() {
    // setup ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        error: function(error) {
            if(error.status == 0 || error.readyState == 0) {
                return;
            }
            else if(error.status == 401){
                errors = $.parseJSON(error.responseText);
                window.location = errors.redirectTo;
            }
            else if(error.status == 422) {
                errors = error.responseJSON;
                $.each(errors.errors, function(key, value) {
                    if(key.indexOf('.') != -1) {
                        let keys = key.split('.');
                        let keys_length = keys.length;
                        for (let i = 0; i < keys_length; i++) {
                            $('span.'+keys[0]+'.error').eq(keys[1]).empty().text(value).fadeIn();
                        }
                    }
                    else {
                        $('span.'+key+'.error').empty().text(value).fadeIn().addClass('text-danger').css('display', 'block');
                    }
                });
            }
            else if(error.status == 400) {
                errors = error.responseJSON;
                if(errors.hasOwnProperty('message')) {
                    show_FlashMessage(errors.message, 'error');
                }
                else {
                    show_FlashMessage('Something went wrong!', 'error');
                }
            }
            else {
                show_FlashMessage('Something went wrong!', 'error');
            }
        },
        complete: function() {
            stopLoader();
        }
    });
});
</script>
@yield('js')
</body>
</html>
