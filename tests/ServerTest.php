<?php
namespace Cyberrange\Servertest;

require_once('/Users/veas/cyberrange/server.php');

use Cyberrange\Server as Server;
use Symfony\Component\Validator\Validation;

class ServerTest extends \PHPUnit_Framework_TestCase
{

  public function testName() {
    $server = new Server\Server(); 
    $validator = Validation::createValidator();

    $this->assertNotEquals(0,$server->validate_name("` 1=1", $validator));
    $this->assertNotEquals(0,$server->validate_name("DROP;", $validator));
    $this->assertNotEquals(0,$server->validate_name("!xobile,", $validator));
    $this->assertNotEquals(0,$server->validate_name("", $validator));
    $this->assertEquals(0,$server->validate_name("Tom", $validator));
  }

  public function testField() {
    $server = new Server\Server(); 
    $validator = Validation::createValidator();

    $this->assertEquals(0, $server->validate_field("Tom Hoppus", $validator));
    $this->assertEquals(0, $server->validate_field("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non tortor.", $validator));
    $this->assertGreaterThan(0, $server->validate_field("` 1=1 AND DROP TABLE STUDENTS;", $validator));
  }

  public function testPhone() {
    $server = new Server\Server(); 
    $validator = Validation::createValidator();

    $this->assertNotEquals(0,($server->validate_phone("phonenumber", $validator)));
    $this->assertNotEquals(0,($server->validate_phone("808u1kljs", $validator)));
    $this->assertEquals(0,($server->validate_phone("8081231234", $validator)));
  }

  public function testEmail() {
    $server = new Server\Server(); 
    $validator = Validation::createValidator();

    $this->assertNotEquals(0,($server->validate_email("test", $validator)));
    $this->assertNotEquals(0,($server->validate_email("` 1=1 AND DROP TABLE STUDENTS;", $validator)));
    $this->assertEquals(0,($server->validate_email("test@gmail.com", $validator)));
    $this->assertEquals(0,($server->validate_email("test.name@gmail.com", $validator)));
  }

  public function testTrueFalse() {
    $server = new server\server(); 
    $validator = validation::createvalidator();

    $this->assertNotEquals(0, $server->validate_true_false("", $validator));
    $this->assertNotEquals(0, $server->validate_true_false("` 1=1 and drop table students;", $validator));
    $this->assertEquals(0, $server->validate_true_false("true", $validator));
    $this->assertEquals(0,$server->validate_true_false("false", $validator));
  }

 public function testScale() {
    $server = new server\server(); 
    $validator = validation::createvalidator();
    
    $this->assertNotEquals(0,($server->validate_scale('', $validator)));
    $this->assertNotEquals(0,($server->validate_scale('test', $validator)));
    $this->assertNotEquals(0,($server->validate_scale('-1', $validator)));
    $this->assertNotEquals(0,($server->validate_scale('11', $validator)));
    $this->assertEquals(0,($server->validate_scale('9', $validator)));
  }

}


?>
