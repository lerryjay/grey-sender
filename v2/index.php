
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>Document</title>
</head>
<body class="text-white px-0">

  <header>
    <!-- As a heading -->
    <nav class="navbar navbar-m bg-dark py-3 px-5">
      <span class="navbar-brand mb-0 text-light h1 font-weight-bold">GREY Mailer</span>
    </nav>
  </header>
  <form method="POST" enctype="multipart/form-data" action="http://localhost/Mailer/resource/index.php"  >
    <div class="container-fluid">
      <div class="row px-md-5 pt-md-5">
        <div class="col-md-6">
          <div class="form-group">
            <label for="recipients">Recipients:</label>
            <select class="form-control" name="recipients" id="recipients">
              <option value="email">Email</option> 
              <option value="mailfile">File (mails;.txt)</option> 
              <option value="combofile">File (combos;.txt)</option>
              <option value="mailtext">Mail Text</option>
              <option value="combotext">Combo Text</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
          <label for="smtp">SMTP Configuartions:</label>
          <select class="form-control" name="smtp" id="smtp">
            <option value="file">File</option>
            <option value="textarea">Textarea</option>
            <option value="configuration" selected>Configuration</option>
          </select>
        </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row bg-dark-purple mid-area px-md-5 pt-md-4 my-md-5">
        <div class="col-md-6">   
          <div class="form-group d-none"  id="recipients-combofile-input">
            <label for="combo-text">Combo File:</label>
            <input class="form-control" type="file" type="combofile" name="combofile" />
          </div>
          <div class="form-group d-none"  id="recipients-combotext-input">
            <label for="combo-text">Combo Text:</label>
            <textarea class="form-control" name="combo-text" id="combotext" rows="3" placeholder="email:password"></textarea>
          </div>
          <div class="form-group" id="recipients-email-input">
            <label for="combo-text">Email:</label>
            <input class="form-control" type="text" name="recipientemail" />
          </div>
          <div class="form-group d-none"  id="recipients-mailfile-input">
            <label for="combo-text">Mail File:</label>
            <input class="form-control" type="file" type="mailfile" name="mailfile" />
          </div>
          <div class="form-group d-none"  id="recipients-mailtext-input">
            <label for="combo-text">Mail Text:</label>
            <textarea class="form-control" name="mailtext" id="mailtext" rows="3" placeholder="email"></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row" id="smtp-configuration-input">
            <div class="col">
              <label>Host:</label>
              <input type="text" class="form-control"  id="" name="smtphost"  placeholder="">
            </div>
            <div class="col">
            <label>Username:</label>
              <input type="text" class="form-control" id="" name="smtpuser"  placeholder="">
            </div>
            <div class="col">
            <label>Password:</label>
              <input type="text" class="form-control" id="" name="smtppass"  placeholder="">
            </div>
            <div class="col">
              <label>Port:</label>
              <input type="text" class="form-control"  id="" name="smtpport" placeholder="">
            </div>
            <div class="col">
              <label>IP:</label>
              <input type="text" class="form-control" id="" name="smtpip"  placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-none" id="smtp-textarea-input">
              <div class="form-group">
                <label for="">Configurations:</label>
                <textarea class="form-control" name="smtpconfigtext" id="smtpconfigtext" placeholder="host:ip:port:username:password" rows="3"></textarea>
              </div>
            </div>
            <div class="col-md-12 d-none"  id="smtp-file-input">
              <div class="form-group">
                <label for="combo-text">Combo:</label>
                <input class="form-control" name="smtpcombofile" type="file" id="smtpcombofile" rows="3" placeholder="email:password"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row px-5">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Subject:</label>
            <input type="text" class="form-control" name="subject" id="subject" >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="senderemail">Sender Email:</label>
            <input type="email" class="form-control" name="senderemail" id="senderemail">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="sendername">Sender Name:</label>
            <input type="text" class="form-control" name="sendername" id="sendername" placeholder="">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="row px-5">
      <div class="col-md-12">
          <?php if (isset($_GET['total'])) { ?>
            <h5>Total: <?php echo $_GET['total']; ?>&nbsp;Success: <?php echo $_GET['success']; ?>&nbsp;Failed:<?php echo $_GET['failed']; ?>  </h5>
          <?php } ?>
        </div>
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-success px-5 p rounded-0" value="submit" name="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
</body>
<script src="./assets/js/main.js"></script>
</html>

