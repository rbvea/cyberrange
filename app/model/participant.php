<?php

namespace Cyberrange;

class Participant
{
   
  private $first;
  private $last;
  private $phone;
  private $email;
  private $work;
  private $captain;
  private $cocaptain;
  private $rating;
  private $insight;
  private $comments;

  public function __construct($first, $last, $phone, $email, $work, $captain, $cocaptain, $rating, $insight, $comments) {
    $this->first = $first;
    $this->last = $last;
    $this->phone = $phone;
    $this->email = $email;
    $this->work = $work;
    $this->captain = $captain;
    $this->cocaptain = $cocaptain;
    $this->rating = $rating;
    $this->insight = $insight;
    $this->comments = $comments;
  } 

  public function getFirst() {
    return $this->first;
  }  

  public function setFirst($val) {
    $this->first = $val;
  }

  public function getLast() {
    return $this->last;
  }  

  public function setLast($val) {
    $this->last = $val;
  }
  public function getPhone() {
    return $this->phone;
  }  

  public function setPhone($val) {
    $this->phone= $val;
  }
  public function getWork() {
    return $this->work;
  }  

  public function setWork($val) {
    $this->work = $val;
  }

  public function getCaptain() {
    return $this->captain;
  }  

  public function setCaptain($val) {
    $this->captain = $val;
  }
  public function getCoCaptain() {
    return $this->cocaptain;
  }  

  public function setCoCaptain($val) {
    $this->cocaptain= $val;
  }

  public function getRating() {
    return $this->rating;
  }  

  public function setRating($val) {
    $this->rating =  $val;
  }

    public function getInsight() {
    return $this->insight;
  }  

  public function setInsight($val) {
    $this->insight =  $val;
  }

  public function getComments() {
    return $this->comments;
  }  

  public function setComments($val) {
    $this->comments=  $val;
  }

}



?>