<?php

namespace App\Models;

class User
{
  /**
   * @type integer
   */
  private $id;

  /**
   * @type string
   */
  private $username;

  /**
   * @type string
   */
  private $email;

  /**
   * @type string
   */
  private $password;

  public function getId(): ?int
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
    if (empty($this->email) || preg_match('#^[a-zA-Z0-9]+@[a-zA-Z]{2,}\.[a-z]{2,4}$#', $this->email) != 1) {
      $err = $err . "Invalid 'email' field. Wrong format.<br>";
    }
    if (empty($this->password)) {
      $err = $err . "Invalid 'password' field. Can't be blank.<br>";
    }

    if (!empty($err)) {
      throw new \Exception($err);
    }

    return $err;
  }
}
