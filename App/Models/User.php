<?php

namespace App\Models;

class User
{
  private $id;
  private $username;
  private $email;
  private $password;
  private $password_confirmation;


  public function __construct()
  {
    $this->id = "";
    $this->groupe = "";
    $this->status = "";
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUsername(): ?string
  {
    return $this->username;
  }

  public function setUsername(string $username): self
  {
    $this->username = $username;

    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  public function getPassword(): ?string
  {
    return $this->password;
  }

  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  public function setPasswordConfirmation(string $password_confirmation): self
  {
    $this->password_confirmation = $password_confirmation;

    return $this;
  }

  public function getGroupe()
  {
    return $this->groupe;
  }

  public function setGroupe(string $groupe)
  {
    $this->groupe = $groupe;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus(string $status)
  {
    $this->status = $status;
  }



  /**
   * Validate the User model data.
   *
   * @return string - Error message if the model data is invalid, else empty string.
   */
  public function validate(): string
  {
    $err = '';

    if (empty($this->username) || strlen($this->username) <= 3) {
      $err = $err . "Invalid 'username' field. Must have more than 3 characters.<br>";
    }
    if (empty($this->email) || preg_match("/^([\w\-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $this->email) != 1) {
      $err = $err . "Invalid 'email' field. Wrong format.<br>";
    }
    if (empty($this->password)) {
      $err = $err . "Invalid 'password' field. Can't be blank.<br>";
    }

    if (empty($this->password_confirmation)) {
      $err = $err . 'Please confirm your password. Both passwords must be the same.';
    }

    if ($this->password != $this->password_confirmation) {
      $err = $err . 'Invalid password confirmation.';
    }

    if (!empty($err)) {
      throw new \Exception($err);
    }


    return $err;
  }
}
