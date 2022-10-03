

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
      rel="stylesheet"
    />
  </head>
  <header>
    <nav>
      <div>
      </div>
    </nav>

  </header>
  <body class="w-100">
    <div id="result"></div>
    <div
      style="display: block; align-items: center; color: white"
      class="container mt-5 w-50 align-middle"
    >
      <!-- Pills navs -->
      <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a
            class="nav-link active"
            id="tab-login"
            data-mdb-toggle="pill"
            href="#pills-login"
            role="tab"
            aria-controls="pills-login"
            aria-selected="true"
            >Login</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="tab-register"
            data-mdb-toggle="pill"
            href="#pills-register"
            role="tab"
            aria-controls="pills-register"
            aria-selected="false"
            >Register</a
          >
        </li>
      </ul>
      <!-- Pills navs -->

      <!-- Pills content -->
      <div class="tab-content">
        <div
          class="tab-pane fade show active"
          id="pills-login"
          role="tabpanel"
          aria-labelledby="tab-login"
        >
        
    <!--------------- Log in --------------->
          <form id="loginForm" method="post">
            <div class="text-center mb-3">
              <p>Sign in</p>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email_login" id="emailLogin" class="form-control" />
              <label class="form-label" for="email-login">
                Email <small></small></label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="password-login" name="passwordLogin" class="form-control" />
              <label class="form-label" for="password-login">Password <small></small></label>
            </div>
            <small id="err"></small>
              
            <!-- Submit button -->
            <button type="submit" id="loginBtn" class="btn btn-block mb-4" style="background-color: #23ff16 !important; color: white;">
              Login
            </button>
          </form>
        </div>
        <div
          class="tab-pane fade"
          id="pills-register"
          role="tabpanel"
          aria-labelledby="tab-register"
        >






        <!--------------- Register --------------->
          <form id="registrationForm">
            <div class="text-center mb-3">
              <p>Sign up:</p>
            </div>

            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="name-registration" name="name"class="form-control" />
              <label class="form-label" for="name-registration">Name <small id="name-small"></small></label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4" style="color: #23ff16;">
              <input type="text" name="email" id="email-registration" class="form-control" />
              <label class="form-label" for="email-registration">Email <small id="esmall"></small></label>
            </div>
            <small id="taken"></small>


             <!-- phone input -->
             <div class="form-outline mb-4">
              <input type="tel" name="phone"id="phone-registration" class="form-control" />
              <label class="form-label" for="phone-registration">Phone <small></small></label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input
                type="password"
                id="password-registration"
                class="form-control"
                name="password"
              />
              <label class="form-label" for="password-registration">Password <small></small></label>
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
              <input
                type="password"
                id="password-confirm-registration"
                class="form-control"
                name="passwordConfirm"
              />
              <label class="form-label" for="password-confirm-registration"
                >Repeat password <small></small></label
              >
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input
                class="form-check-input me-2"
                type="checkbox"
                value=""
                id="registerCheck"
                checked
                aria-describedby="registerCheckHelpText"
              />
              <label class="form-check-label text-dark" for="registerCheck">
                I have read and agree to the terms
              </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn mb-3" style="background-color: #23ff16">
              Sign Up
            </button>
          </form>
        </div>
      </div>
      <!-- Pills content -->
    </div>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
    ></script>
    <script src="./signup/js/app.login.js"></script>
    <script src="./signup/js/app.register.js"></script>
  </body>
</html>