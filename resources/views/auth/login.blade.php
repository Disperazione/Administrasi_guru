<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIFOS | LOGIN</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
</head>
<style>
    /*===== GOOGLE FONTS =====*/
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");

    /*===== VARIABLES CSS =====*/
    :root {
        /*===== Colores =====*/
        --first-color: #1A73E8;
        --input-color: #80868B;
        --border-color: #DADCE0;

        /*===== Fuente y tipografia =====*/
        --body-font: 'Roboto', sans-serif;
        --normal-font-size: 1rem;
        --small-font-size: .75rem;
    }

    /*===== BASE =====*/
    *,
    ::before,
    ::after {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
    }

    h1 {
        margin: 0;
    }

    .l-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form {
        width: 460px;
        padding: 4rem 2rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
    }

    .form__title {
        font-weight: 500;
        margin-bottom: 3rem;
    }

    .form_div {
        position: relative;
        height: 48px;
        margin-bottom: 1.5rem;
    }

    .form__input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-size: var(--normal-font-size);
        border: 1px solid var(--border-color);
        border-radius: .5rem;
        outline: none;
        padding: 1rem;
        background: none;
        z-index: 1;
    }

    .form__label {
        position: absolute;
        left: 1rem;
        top: 1rem;
        padding: 0 .25rem;
        background-color: #fff;
        color: var(--input-color);
        font-size: var(--normal-font-size);
        transition: .3s;
    }

    .form__button {
        display: block;
        margin-left: auto;
        padding: .75rem 2rem;
        outline: none;
        border: none;
        background-color: var(--first-color);
        color: #fff;
        font-size: var(--normal-font-size);
        border-radius: .5rem;
        cursor: pointer;
        transition: .3s;
    }

    .form__button:hover {
        box-shadow: 0 10px 36px rgba(0, 0, 0, .15);
    }

    .form__input:focus+.form__label {
        top: -.5rem;
        left: .8rem;
        color: var(--first-color);
        font-size: var(--small-font-size);
        font-weight: 500;
        z-index: 10;
    }

    .form__input:not(:placeholder-shown).form__input:not(:focus)+.form__label {
        top: -.5rem;
        left: .8rem;
        color: var(--first-color);
        font-size: var(--small-font-size);
        font-weight: 500;
        z-index: 10;
    }

    .form__input:focus {
        border: 1.5px solid var(--first-color);
        }
    .alert{
        margin-bottom: 15px;
        color:white;
        padding-left: 20px;
        padding-top: 13px;
        height: 45px;
        background-color: red ;
        /* opacity: 0.5; */
        border-radius: 5px;
        border-color: black;
        display: flex;

    }
    .close{
      margin-left: 35%;
      text-decoration: none;
      color: white;
    }
</style>

<body>
    <div class="row">
        <div class="col-6">

            <div class="l-form">

                <form action="{{ route('api.login') }}" class="form" method="POST">
                    @csrf
                    <img src="{{url('images/tb.png')}}" alt="" style="width: 200px; margin-left: 100px;">
                    <h1 class="form__title" style="margin-left: 150px;">LOGIN</h1>
                    @if ($errors->has('name') || $errors->has('password'))
                        <div class="alert">
                            Wrong username or password
                                <div class="close">
                                    X
                                </div>
                            </div>
                    @endif
                    <div class="form_div">
                        <input type="text" name="name" class="form__input" placeholder=" " value="{{ old('name') }}">
                        <label for=""  class="form__label">Username</label>

                    </div>
                    <div class="form_div">
                        <input type="password" name="password" value="{{ old('password') }}" class="form__input" placeholder=" ">
                        <label for="" class="form__label">Password</label>
                    </div>
                    {{-- <input type="submit" class="form__button btn btn-warning" value="Sign In"> --}}
                    <button type="submit" class="form__button"><i class="fas fa-check-square "></i>Submit</button>
                </form>

            </div>
        </div>

    </div>
</body>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $('.close').click(function () {
        $('.alert').remove();
    })
</script>
</html>
