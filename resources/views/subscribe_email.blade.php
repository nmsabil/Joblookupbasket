<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
        <title>Subscribe</title>

        <!-- <form method="POST" action="/subscribe-email">
            Email <input name="email" value="{{ session()->get('email') }}">
            {{ session()->get('emailError') }}

            {{ csrf_field() }}
            <button>hello2</button>
            <input type="submit" value="Next">
        </form> -->




        <div class="container">
      <div class="row">
        <div class="container-fluid mx-auto">
          <header class="rounded">
            <img
              src="img/joblookupbasket.png"
              alt="Joblookuplogo"
              class="logo pt-2"
            />
            <p class="text-dark mb-0">
              Enter your email.
            </p>
          </header>

          <div class="card text-dark mx-auto" style="width: 85%;">
            <div class="card-body pt-0">
              <form method="POST" action="/subscribe-email">
                <div class="form-group">
                  <input 
                  name="email" value="{{ session()->get('email') }}"
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter you email"
                    
                  />
                  {{ session()->get('emailError') }}
                  {{ csrf_field() }}
                </div>
                

                <button type="submit" value="Next" class="text-light w-100 rounded-pill">
                  Subscribe
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>





        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    </body>
</html>
