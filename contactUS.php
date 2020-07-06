<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="card">
            <div class="card-title">
              <h2 class="text-center py-2">Contact us</h2>
              <hr>
            </div>
            <div class="card-body">
              <form action="process.php" method="post">
                <input type="text" name="Username" placeholder="username" class="form-contrl mb-2">
                <input type="email" name="Email" placeholder="Mail" class="form-contrl mb-2">
                <input type="text" name="Subject" placeholder="Subject" class="form-contrl mb-2">
                <textarea name="msg" class="form-control" placeholder="Write Message"rows="8" cols="80"></textarea>
                <button type="button" class="btn btn-succes" name="btn-send">Send</button>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>

  </body>
</html>
