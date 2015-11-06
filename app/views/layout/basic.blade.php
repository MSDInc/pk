<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>{{ $title or "Pustakalaya" }}</title>
  <meta name="description" content="Pustakalaya, Library Management System." />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="icon" href="4.png" type="image/x-icon" /> -->

  {{ HTML::style('bootstrap/bootstrap.css') }}
  {{ HTML::style('bootstrap/bootswatch.css') }}
  {{-- HTML::style('bootstrap-select/bootstrap-select.css') --}}

</head>

<body>

  @include('layout.navbar')
  <div class="container" id="wrap">
    @yield('content')
    <div id="push"></div>
  </div>
  @include('layout.footer')

  {{-- HTML::script('//code.jquery.com/jquery-1.11.2.min.js') --}}
  {{ HTML::script('bootstrap/jquery-1.js') }}
  {{ HTML::script('bootstrap/bootstrap.js') }}
  {{ HTML::script('bootstrap/bootswatch.js') }}
  {{-- HTML::script('bootstrap-select/bootstrap-select.js') --}}
  @yield ('scripts')

  <script>
    $(document).ready(function() {

      // Hide/Show buttons
      $('.dropdown-menu li a').click(function() {
        $(this).parents('.select-sub').nextAll().hide();
        $("#" + $(this).attr('id') + '-sub').show();
      });

      $(".dropdown-menu li a").click(function() {
        // Dropdown as select
        $(this).parents('.interchange').find('.dropdown-toggle').html($(this).text() + ' <span class="caret"></span>');
        // Populate hidden field
        $("#" + $(this).parents('.dropdown-menu').attr('id') + '-topic').val($(this).text());
      });

      // Hide all except the type-select-sub
      //$(this).find(".select-sub").nextAll().hide();

      // Trigger a click on book-select
      $("#book-select").trigger('click');

    });

    @yield ('scriptcontent')
  </script>

</body>

<html>
