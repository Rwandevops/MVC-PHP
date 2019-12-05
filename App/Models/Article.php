<?php

namespace App\Models;

class Article
{
  private $id;
  private $title;
  private $content; // link to the image or video associated to the article
  private $authorId;
  private $text;

  public function __construct()
  {
    $this->id = "";
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId($id): ?self
  {
      $this->id = $id;
      return $this;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): self
  {
    $this->title = $title;
    return $this;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(string $content): self
  {
    $this->content = $content;
    return $this;
  }

  public function setAuthorId(string $authorId): self
  {
    $this->authorId = $authorId;
    return $this;
  }

  public function getAuthorId(): ?int
  {
    return $this->AuthorId;
  }

  public function setText(string $text): self
  {
    $this->text = $text;
    return $this;
  }

  public function getText(): string
  {
    return $this->text;
  }


  /**
   * Validate the Article model data.
   *
   * @return string - Error message if the model data is invalid, else empty string.
   */
  public function validate(): string
  {
    $err = '';

    if (empty($this->title)) {
      $err = $err . "You forgot to add a title, you dumbass!<br>";
    }
    if (empty($this->content)) {
      $err = $err . "You forgot to add a content, you dumbass!<br>";
    }
    if (empty($this->text)) {
      $err = $err . "You're too lazy, you forgot to write the article!!<br>";
    }

    if (!empty($err)) {
      throw new \Exception($err);
    }

    return $err;
  }
}