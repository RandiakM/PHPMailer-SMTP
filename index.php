<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title> Title </title>

	<style type="text/css">
	.contact-tab input{
	    width: 100%;
	    height: 50px;
	    border-radius: 0px;
	    border: 2px solid rgba(0, 0, 0, 0.13);
	    margin-bottom: 15px;
	}
	.contact-tab textarea{
	    width: 100%;
	    height: 200px;
	    border-radius: 0px;
	    border: 2px solid rgba(0, 0, 0, 0.13);
	    resize: none;
	    margin-bottom: 15px;
	}
	.contact-tab .btn-contact{
	    width: 100%;
	    cursor: pointer;
	}
  </style>


</head>

<body>

								<div class="tab-content">
									<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-home-tab">
											<form action="mail.php" method="post">
													<div class="row">
														<div class="col-md-6">
															<input type="text" class="form-control" name="fullname" placeholder="Your Name">
														</div>
														<div class="col-md-6">
															<input type="email" class="form-control" name="email" placeholder="Enter Your Email">
														</div>
														<div class="col-md-12">
															<input type="text" class="form-control" name="subject" placeholder="Subject">
														</div>
														<div class="col-12">
															<textarea class="form-control" rows="3" name="message" placeholder="Write your message here"></textarea>
														</div>
														<div class="col-12">
															<button type="submit" name="sendmail"> Send Us A Message
															</button>
														</div>
													</div>
												</form>

									</div>

</body>

</html>
