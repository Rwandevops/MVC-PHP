<?php

namespace WebFramework;

use \PDO;

class ORM {

  private $db;
  private $toStore;

  private static $instance = null;

  /**
   * Private constructor so nobody else can instantiate it.
   */
  private function __construct()
  {
  }

  /**
   * Retrieve the static instance of the ORM.
   *
   * @return ORM - Instance of the ORM
   */
  public static function getInstance()
  {
      if (is_null(self::$instance)) {
          self::$instance = new ORM();
      }

      return self::$instance;
  }

  /**
   * Connect to a database.
   *
   * @param array $config - Database configuration
   * @return PDO - Instance of PDO used to interact with the connected DB.
   */
  public function connect(array $config)
  {
    try {
      $this->db = new PDO(
        "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}",
        $config['username'],
        $config['password'],
        $config['options']
      );
      return $this->db;
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  /**
   * Make a model instance managed by the ORM.
   *
   * @param Model $object - Object that will be persisted.
   */
  public function persist($object)
  {
    // TODO: Implement this function
    $this->toStore.push($object);
    return $this->toStore;
  }

  /**
   * Synchronize each managed models with the database.
   */
  public function flush()
  {
    foreach($this->toStore as $obj){
      // tri par classe d'objet
      switch(get_class($obj)){ 
        case 'User':
          // Choix INSERT ou UPDATE en fonction de $obj['id'] vide ou pas
          switch($obj['id']){
            case '':
              //INSERT
              $sql_insert = $db->prepare('INSERT INTO users (username, email, mdp, groupe, status, creation_date, last_modif_date) VALUES (:username, :email, :mdp, :groupe, :status, :creation_date, :last_modif_date)');
              $sql_insert->bindparam('username', $obj['username'], PDO::PARAM_STR);
              $sql_insert->bindparam('email', $obj['email'], PDO::PARAM_STR);
              $sql_insert->bindparam('mdp', $obj['mdp'], PDO::PARAM_STR);
              $sql_insert->bindparam('groupe', $obj['groupe'], PDO::PARAM_STR);
              $sql_insert->bindparam('status', $obj['status'], PDO::PARAM_STR);
              $sql_insert->bindparam('creation_date', $obj['creation_date'], PDO::PARAM_STR);
              $sql_insert->bindparam('last_modif_date', $obj['last_modif_date'], PDO::PARAM_STR);
              $sql_insert->execute();
              break;
            default:
              //UPDATE
              $sql_update = $db->prepare('UPDATE users SET username = :username, email = :email, mdp = :mdp, groupe = :groupe, status = :status, creation_date = :creation_date, last_modif_date = :last_modif_date WHERE id = :id');
              $sql_update->bindparam('id', $obj['id'], PDO::PARAM_INT);
              $sql_update->bindparam('username', $obj['username'], PDO::PARAM_STR);
              $sql_update->bindparam('email', $obj['email'], PDO::PARAM_STR);
              $sql_update->bindparam('mdp', $obj['mdp'], PDO::PARAM_STR);
              $sql_update->bindparam('groupe', $obj['groupe'], PDO::PARAM_STR);
              $sql_update->bindparam('status', $obj['status'], PDO::PARAM_STR);
              $sql_update->bindparam('creation_date', $obj['creation_date'], PDO::PARAM_STR);
              $sql_update->bindparam('last_modif_date', $obj['last_modif_date'], PDO::PARAM_STR);
              $sql_update->execute();
              break;
          } // fin case User

        case 'Article':
          // Choix INSERT ou UPDATE en fonction de $obj['id'] vide ou pas
          switch($obj['id']){
            case '':
              //INSERT
              $sql_insert = $db->prepare('INSERT INTO articles (title, content, text, author_id) VALUES (:title, :content, :text, :author_id)');
              $sql_insert->bindparam('title', $obj['title'], PDO::PARAM_STR);
              $sql_insert->bindparam('content', $obj['content'], PDO::PARAM_STR);
              $sql_insert->bindparam('text', $obj['text'], PDO::PARAM_STR);
              $sql_insert->bindparam('author_id', $obj['author_id'], PDO::PARAM_INT);
              $sql_insert->execute();
              // comment on gère la table N:N article-tags?  
            break;
            default:
              //UPDATE
              $sql_update = $db->prepare('UPDATE articles SET title = :title, content = :content, text = :text, author_id = :author_id WHERE id = :id');
              $sql_update->bindparam('id', $obj['id'], PDO::PARAM_INT);
              $sql_update->bindparam('title', $obj['title'], PDO::PARAM_STR);
              $sql_update->bindparam('content', $obj['content'], PDO::PARAM_STR);
              $sql_update->bindparam('text', $obj['text'], PDO::PARAM_STR);
              $sql_update->bindparam('author_id', $obj['author_id'], PDO::PARAM_INT);
              $sql_update->execute();
              // comment on gère la table N:N article-tags?
              break;
            } // fin case Article
  
        case 'Comments':
          // Choix INSERT ou UPDATE en fonction de $obj['id'] vide ou pas
          switch($obj['id']){
            case '':
              //INSERT
              $sql_insert = $db->prepare('INSERT INTO comments (author_id, content, validated, article_id) VALUES (:author_id, :content, :validated, :article_id)');
              $sql_insert->bindparam('author_id', $obj['author_id']);
              $sql_insert->bindparam('content', $obj['content']);
              $sql_insert->bindparam('validated', $obj['validated']);
              $sql_insert->bindparam('article_id', $obj['article_id']);
              $sql_insert->execute();
              break;
            default:
              //UPDATE
              $sql_update = $db->prepare('UPDATE comments SET author_id = :author_id, content = :content, validated = :validated, article_id = :article_id,  WHERE id = :id');
              $sql_update->bindparam('id', $obj['id'], PDO::PARAM_INT);
              $sql_update->bindparam('author_id', $obj['author_id'], PDO::PARAM_INT);
              $sql_update->bindparam('content', $obj['content'], PDO::PARAM_STR);
              $sql_update->bindparam('validated', $obj['validated'], PDO::PARAM_BOOL);
              $sql_update->bindparam('article_id', $obj['article_id'], PDO::PARAM_INT);
              $sql_update->execute();
              break;
          } // fin case Comment

        case 'Content':
          // Choix INSERT ou UPDATE en fonction de $obj['id'] vide ou pas
          switch($obj['id']){
            case '':
              //INSERT
              $sql_insert = $db->prepare('INSERT INTO contents (type, article_id, content_link) VALUES (:type, :article_id, :content_link)');
              $sql_insert->bindparam('type', $obj['type']);
              $sql_insert->bindparam('article_id', $obj['article_id']);
              $sql_insert->bindparam('content_link', $obj['content_link']);
              $sql_insert->execute();
              break;
            default:
              //UPDATE
              $sql_update = $db->prepare('UPDATE contents SET type = :type, article_id = :article_id, content_link = :content_link WHERE id = :id');
              $sql_update->bindparam('id', $obj['id'], PDO::PARAM_INT);
              $sql_update->bindparam('type', $obj['type'], PDO::PARAM_STR);
              $sql_update->bindparam('article_id', $obj['article_id'], PDO::PARAM_INT);
              $sql_update->bindparam('content_link', $obj['content_link'], PDO::PARAM_STR);
              $sql_update->execute();
              break;
          } // fin case Contents  
      } // fin switch get_class
    } // fin foreach
  } // fin fonction flush

  public function remove()
  {
    // Tri par classe d'objet
    switch(get_class($obj)){ 
      case 'User':
        $sql_delete = $db->prepare('DELETE FROM users WHERE id = :id');
        $sql_delete->bindparam('id', $obj['id'], PDO::PARAM_INT);
        $sql_delete->execute();
        break;
  
      case 'Article':
        $sql_delete = $db->prepare('DELETE FROM articles WHERE id = :id');
        $sql_delete->bindparam('id', $obj['id'], PDO::PARAM_INT);
        $sql_delete->execute();
        break;
  
      case 'Content':
        $sql_delete = $db->prepare('DELETE FROM articles WHERE id = :id');
        $sql_delete->bindparam('id', $obj['id'], PDO::PARAM_INT);
        $sql_delete->execute();
        break;
  
      case 'Comment':
          $sql_delete = $db->prepare('DELETE FROM comments WHERE id = :id');
          $sql_delete->bindparam('id', $obj['id'], PDO::PARAM_INT);
          $sql_delete->execute();
          break;
  
      case 'Tags':
        $sql_delete = $db->prepare('DELETE FROM tags WHERE id = :id');
        $sql_delete->bindparam('id', $obj['id'], PDO::PARAM_INT);
        $sql_delete->execute();
        break;
    } // fin switch
  } // fin fonction remove

  public function select($classe, $param, $value)
  {
    if(typeof($param === 'string')){
        $sql_select = $db->prepare(`SELECT * FROM $classe WHERE $param = :param`);
        $sql_select->bindparam($param, $value, PDO::PARAM_STR);
        $sql_select->execute();
    }
    else{
      $sql_select = $db->prepare(`SELECT * FROM $classe WHERE id = :id`);
      $sql_select->bindparam('id', $value, PDO::PARAM_INT);
      $sql_select->execute();
    }
  } // fin fonction select
} // fin classe ORM