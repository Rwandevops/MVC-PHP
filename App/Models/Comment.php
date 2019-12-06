<?php

namespace App\Models;

class Comment
{
  private $id;
  private $authorId;
  private $articleId;
  private $text;

  public function __construct()
  {
    $this->id = "";
  }

  public function getId(): ?int
  {
    return $this->id;
  }

// No need for method setId

  public function getAuthorId(): ?int
  {
    return $this->AuthorId;
  }

  public function setArticleId(string $articleId): self
  {
    $this->articleId = $articleId;
    return $this;
  }

  public function getArticleId(): ?int
  {
    return $this->ArticleId;
  }

  public function setText(string $text): self
  {
    $this->text = $text;
    return $this;
  }

  public function getText(): ?string
  {
    return $this->text;
  }

  /**
   * Validate the Comment model data.
   *
   * @return string - Error message if the model data is invalid, else empty string.
   */
  public function validate(): string
  {
    $err = '';

    // articleId and authorId are declared automatically by the controller
    
    if (empty($this->text)) {
      $err = $err . "You're too lazy, you forgot to write your comment!!<br>";
    }

    if (!empty($err)) {
      throw new \Exception($err);
    }

    return $err;
  }
}