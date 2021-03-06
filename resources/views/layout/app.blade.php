<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    <title>Sistema de Heróis - {{$current}}</title>

    <style type="text/css">
      body {
        background: linear-gradient(50deg,#8ffcfc,#3a40fd);
        font-family: Helvetica,Arial,sans-serif;
      }
    </style>
  </head>
  <body>

      @component('component.navbar', ['current' => $current])
      @endcomponent

      <main role="main" style="margin-top: 30px;">
        <div class="container">
          @hasSection('body')
            @yield('body')
          @endif
        </div>
      </main>

      <section id="cards_herois">
        <div class="container">
          @hasSection('cards_herois')
            @yield('cards_herois')
          @endif
        </div>
      </section>

    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
    @hasSection('javascript')
      @yield('javascript')
    @endif
  </body>
</html>