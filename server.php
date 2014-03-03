<?php
namespace Cyberrange\Server;

require_once 'vendor/autoload.php';

//use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Validator\Constraints as Assert;
// use Symfony\Component\Serializer\Serializer;
// use Symfony\Component\Serializer\Encoder\XmlEncoder;
// use Symfony\Component\Serializer\Encoder\JsonEncoder;
// use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class Server {

  public function __construct() { 


    $configDirectories = array(__DIR__ . '/app/config');  
    $locator = new FileLocator($configDirectories);
    $yamlSecurityFiles = $locator->locate('security.yml', null, false);
    $dbFiles = $locator->locate('database.yml', null, false);

    if($dbFiles) {
      $db_config = Yaml::parse($dbFiles[0]);
    }

    // $connect = mysql_connect( $db_config['database']['server']['host'] , $db_config['database']['server']['user'] , $db_config['database']['server']['pass']);
    // $db = mysql_select_db('cyberrange_p');

    $connect = mysql_connect(':/Applications/MAMP/tmp/mysql/mysql.sock', 'cyberrange', 'cyberrange'); 
    $db = mysql_select_db('cyberrange_staging');

    // if(!$connect) {
    //   echo "connect failed<br/>";
    // } else {
    //   echo "<h1>connected</h1>";
    // }

    //$db = mysql_select_db('cyberrange_p');
    // if(!$db) {
    //   echo "db connection failed<br/>";
    // } else {
    //   echo "db connected";
    // }
  }

  public function validate_name($name, $validator) {
    $obj = $validator->validateValue(trim($name), array(new Assert\Regex(array('pattern' => '/^\w+$/', 'match' => true)), new Assert\NotBlank()));
    return count($obj);
  }

  public function validate_phone($phone, $validator) {
   return count($validator->validateValue(trim($phone), array(new Assert\Regex(array('pattern' => '/\D+/', 'match' => false)), new Assert\NotBlank(), new Assert\Length(10))));
  }

  public function validate_email($email, $validator) {
   return count($validator->validateValue(trim($email), array(new Assert\Email(), new Assert\NotBlank())));
  }

  public function validate_true_false($val, $validator) {
   return count($validator->validateValue(trim($val), array(new Assert\Regex(array('pattern' => '/(true|false)/' , 'match' => true)), new Assert\NotBlank())));
  }

  public function validate_scale($val, $validator) {
    return count($validator->validateValue(trim($val), array(new assert\Regex(array('pattern' => '/\D+/' , 'match' => false)), new assert\LessThan(array('value' => 11)), new assert\GreaterThan(array('value' => -1)), new assert\NotBlank())));
  }

  public function validate_field($val, $validator) {
    $obj = $validator->validateValue(trim($val), array(new Assert\Regex(array('pattern' => '/[^\s\w\.,]+/', 'match' => false)), new Assert\NotBlank()));
    return count($obj);
  }
}

  $validator = Validation::createValidator();
  $server = new Server();

  $validations = array(); 

  $validations['first'] = $server->validate_name($_POST['first'], $validator );
  $validations['last'] = $server->validate_name($_POST['last'], $validator );
  $validations['phone'] = $server->validate_phone($_POST['phone'], $validator );
  $validations['email'] = $server->validate_email($_POST['email'], $validator );
  $validations['work'] = $server->validate_field($_POST['work'], $validator );
  $validations['captain'] = $server->validate_field($_POST['captain'], $validator );
  $validations['cocaptain'] = $server->validate_field($_POST['cocaptain'], $validator );
  $validations['rating'] = $server->validate_scale($_POST['rating'], $validator );
  $validations['insight'] = $server->validate_field($_POST['insight'], $validator );
  $validations['commments'] = $server->validate_field($_POST['comments'], $validator );

  $invalidFields = array();

  foreach($validations as $key => $val) {
    if($val != 0) {
      $invalidFields[] = $key; 
    }
  }

  if(count($invalidFields) > 0) {

    echo "Error with fields: ";
    foreach($invalidFields as $val) {
      echo $val . ' , ';
    }
    echo "<br/>redirecting back to homepage.";

  } else if($connect && $db) {
    $isMil = ($_POST['isMilitary'] == "true") ? 1 : 0;
    $query = 'INSERT INTO `cyberrange_p`.`participant` VALUES (NULL, "'.$_POST['first'].'", "'.$_POST['last'].'", "'.$_POST['phone'].'","'.$_POST['email'].'","'.$_POST['work'].'", '.$isMil.', "'.$_POST['captain'].'", "'.$_POST['cocaptain'].'", "'.$_POST['rating'].'", "'.$_POST['insight'].'", "'.$_POST['comments'].'");';

    $q = mysql_query($query);

    if($q) {
      echo "Registration successful! Redirecting back to homepage.";
    } else {
      echo "Submission failed.  Redirecting back to homepage.";
    }
  }
  echo "<script type='text/javascript'>setTimeout(function() { window.location = 'http://hawaii.edu/cyberrange'; }, 2000);</script>";
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cyber Range</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <?php if($q) {?>
          <h1>Thank you!</h1>
              <p>Your registration is complete.</p>
              <table>
                  <?php foreach($_POST as $key => $val) : ?>
                  <tr>
                      <th><?php echo $key; ?></th>
                      <td><?php echo $val; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </table>
        <?php } ?>
    </body>
</html>

