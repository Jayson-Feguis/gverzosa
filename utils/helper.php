<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    function getDateNow(){
      return date('Y-m-d H:i:s');
    }

    function uploadImage($file, $file_temp, $type){
        $image = $file; // $_FILES['addproductimage']['name']
        if($image != ""){
            $extension = end(explode('.', $image));
            $_date = new DateTime();
            $image_date = $_date->format('Y-m-d_H-i-s');
            $image = $type."-".$image_date.".".$extension;
            $source = $file_temp; // $_FILES['addproductimage']['tmp_name'];
            $destination = "../images/".$image;
            if(move_uploaded_file($source, $destination)){
                return $image;
            }
            else{
                return null;
            }
        }
    }

    function sendEmail($name, $email, $subject, $message, $mobile_number, $dateTime, $service){
        $mail = new PHPMailer(true);

        try{
            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail -> Username = 'gverzosasalon@gmail.com';
            $mail -> Password = 'yqzjazwxxcedxosk';
            $mail -> SMTPSecure = 'ssl';
            $mail -> Port = 465;

            $mail -> setFrom('gverzosasalon@gmail.com');
            $mail -> addAddress($email);

            $mail -> isHTML(true);
            $mail -> Subject = $subject;
            $mail -> Body = '
            <!doctype html>
            <html>
              <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>Simple Transactional Email</title>
                <style>
            @media only screen and (max-width: 620px) {
              table.body h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
              }
            
              table.body p,
            table.body ul,
            table.body ol,
            table.body td,
            table.body span,
            table.body a {
                font-size: 16px !important;
              }
            
              table.body .wrapper,
            table.body .article {
                padding: 10px !important;
              }
            
              table.body .content {
                padding: 0 !important;
              }
            
              table.body .container {
                padding: 0 !important;
                width: 100% !important;
              }
            
              table.body .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
              }
            
              table.body .btn table {
                width: 100% !important;
              }
            
              table.body .btn a {
                width: 100% !important;
              }
            
              table.body .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
              }
            }
            @media all {
              .ExternalClass {
                width: 100%;
              }
            
              .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
              }
            
              .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
              }
            
              #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
              }
            
              .btn-primary table td:hover {
                background-color: #34495e !important;
              }
            
              .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
              }
            }
            </style>
              </head>
              <body style="background-image: url(https://scontent.fcrk1-5.fna.fbcdn.net/v/t39.30808-6/311860161_540126878124119_3288179552662448415_n.jpg?stp=dst-jpg_s960x960&_nc_cat=105&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeERaMTvrWLri_HWU2_kLl_rWtPIiJVjB_da08iIlWMH9wwuzcwdAhFk9Bnq50ZDZY5v8FvKxVklDFnp1ZvFRasT&_nc_ohc=NuEvuFU3YucAX_DRXJW&tn=inhvjoaPWTBY76OC&_nc_ht=scontent.fcrk1-5.fna&oh=00_AfBZWkIaWILv6EZzHaXpjcHC0cjvJF5IUKWwz01ZYx478A&oe=63C12458); background-position: top right; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%">
                <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                  <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                    <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
                      <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">
            
                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">
            
                          <!-- START MAIN CONTENT AREA -->
                          <tr">
                            <td></td>
                            <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                <tr>
                                  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Hi '.$name.',</p>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">'.$message.'</p>
                                  </td>
                                </tr>
                                <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Name: '.$name.',</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Email: '.$email.'</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Mobile Number: '.$mobile_number.',</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Appointment Date: '.$dateTime.'</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Service: '.$service.'</p>
                                </td>
                              </tr>
                              </table>
                            </td>
                          </tr>
            
                        <!-- END MAIN CONTENT AREA -->
                        </table>
                        <!-- END CENTERED WHITE CONTAINER -->
            
                        <!-- START FOOTER -->
                        <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                            <tr>
                              <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #000000; text-shadow: -4px 1px 6px rgba(255, 255, 255, 1),0px 9px 23px rgba(255, 255, 255, 1),-4px 4px 4px rgba(255, 255, 255, 0.88); font-size: 12px; text-align: center;" valign="top" align="center">
                                <span class="apple-link" style="color: #000000; font-size: 12px; text-align: center;">244 Kalentong Romualdez St., Brgy. Daang Bakal, Mandaluyong City</span>
                                <br> <span class="text-shadow: -4px 1px 6px rgba(255, 255, 255, 1),0px 9px 23px rgba(255, 255, 255, 1),-4px 4px 4px rgba(255, 255, 255, 0.88);"> This is an automated email. Please do not reply.</span>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                  </tr>
                </table>
              </body>
            </html>';
            
            if(!$mail -> send())
            {
                return "Error sending: " . $mail->ErrorInfo;
            }
            else
            {
                return 1;
            }
        }catch(Exception $e){
            return $e;
        }
    }

    function sendEmailFeedback($name, $email, $number, $subject, $message){
      $mail = new PHPMailer(true);

      try{
          $mail -> isSMTP();
          $mail -> Host = 'smtp.gmail.com';
          $mail -> SMTPAuth = true;
          $mail -> Username = 'gverzosasalon@gmail.com';
          $mail -> Password = 'maflzsmydcrwpgas';
          $mail -> SMTPSecure = 'ssl';
          $mail -> Port = 465;

          $mail -> setFrom('gverzosasalon@gmail.com');
          $mail -> addAddress('gverzosasalon@gmail.com');

          $mail -> isHTML(true);
          $mail -> Subject = $subject;
          $mail -> Body = '
          <!doctype html>
          <html>
            <head>
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <title>Simple Transactional Email</title>
              <style>
          @media only screen and (max-width: 620px) {
            table.body h1 {
              font-size: 28px !important;
              margin-bottom: 10px !important;
            }
          
            table.body p,
          table.body ul,
          table.body ol,
          table.body td,
          table.body span,
          table.body a {
              font-size: 16px !important;
            }
          
            table.body .wrapper,
          table.body .article {
              padding: 10px !important;
            }
          
            table.body .content {
              padding: 0 !important;
            }
          
            table.body .container {
              padding: 0 !important;
              width: 100% !important;
            }
          
            table.body .main {
              border-left-width: 0 !important;
              border-radius: 0 !important;
              border-right-width: 0 !important;
            }
          
            table.body .btn table {
              width: 100% !important;
            }
          
            table.body .btn a {
              width: 100% !important;
            }
          
            table.body .img-responsive {
              height: auto !important;
              max-width: 100% !important;
              width: auto !important;
            }
          }
          @media all {
            .ExternalClass {
              width: 100%;
            }
          
            .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div {
              line-height: 100%;
            }
          
            .apple-link a {
              color: inherit !important;
              font-family: inherit !important;
              font-size: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
              text-decoration: none !important;
            }
          
            #MessageViewBody a {
              color: inherit;
              text-decoration: none;
              font-size: inherit;
              font-family: inherit;
              font-weight: inherit;
              line-height: inherit;
            }
          
            .btn-primary table td:hover {
              background-color: #34495e !important;
            }
          
            .btn-primary a:hover {
              background-color: #34495e !important;
              border-color: #34495e !important;
            }
          }
          </style>
            </head>
            <body style="background-image: url(https://scontent.fcrk1-5.fna.fbcdn.net/v/t39.30808-6/311860161_540126878124119_3288179552662448415_n.jpg?stp=dst-jpg_s960x960&_nc_cat=105&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeERaMTvrWLri_HWU2_kLl_rWtPIiJVjB_da08iIlWMH9wwuzcwdAhFk9Bnq50ZDZY5v8FvKxVklDFnp1ZvFRasT&_nc_ohc=injjQdFU07sAX8Sfa7f&tn=inhvjoaPWTBY76OC&_nc_ht=scontent.fcrk1-5.fna&oh=00_AfBLiKAS8aPTvFhyZ4tlwjyjC3Wfrvi1sbnKsEeI17TppA&oe=637DE7D8); background-position: top right; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
              <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                <tr>
                  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                  <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
                    <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">
          
                      <!-- START CENTERED WHITE CONTAINER -->
                      <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">
          
                        <!-- START MAIN CONTENT AREA -->
                        <tr">
                          <td></td>
                          <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                              <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;"><span>Name: </span>'.$name.'</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;"><span>Email: </span>'.$email.'</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;"><span>Mobile Number: </span>'.$number.'</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; display: block;"><span>Feedback: </span>'.$message.'</p>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
          
                      <!-- END MAIN CONTENT AREA -->
                      </table>
                      <!-- END CENTERED WHITE CONTAINER -->
          
                      <!-- START FOOTER -->
                      <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                          <tr>
                            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #000000; text-shadow: -4px 1px 6px rgba(255, 255, 255, 1),0px 9px 23px rgba(255, 255, 255, 1),-4px 4px 4px rgba(255, 255, 255, 0.88); font-size: 12px; text-align: center;" valign="top" align="center">
                              <span class="apple-link" style="color: #000000; font-size: 12px; text-align: center;">244 Kalentong Romualdez St., Brgy. Daang Bakal, Mandaluyong City</span>
                              <br> <span class="text-shadow: -4px 1px 6px rgba(255, 255, 255, 1),0px 9px 23px rgba(255, 255, 255, 1),-4px 4px 4px rgba(255, 255, 255, 0.88);"> This is an automated email. Please do not reply.</span>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </td>
                  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                </tr>
              </table>
            </body>
          </html>';
          
          if(!$mail -> send())
          {
              return "Error sending: " . $mail->ErrorInfo;
          }
          else
          {
              return 1;
          }
      }catch(Exception $e){
          return $e;
      }
  }
?>