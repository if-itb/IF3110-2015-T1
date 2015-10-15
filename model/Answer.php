<?php

namespace stackexchange\model;

use stackexchange\core\Model;

class Answer extends Model
{
    public function __construct()
    {
        $this->author = "";
        $this->author_email = "";
        $this->content = "";
    }

    public function getByThreadId($id)
    {
        $query = "SELECT * FROM answer WHERE thread_id='$id'";

        return $this->getQueryResult($query);
    }

    public function insert($threadId, $author, $authorEmail, $content)
    {
        $query = "INSERT INTO answer"
                    . " (`thread_id`, `author`, `author_email`, `content`)"
                    . " VALUES ($threadId, '$author', '$authorEmail', '$content')";

        return $this->executeQuery($query);
    }

    public function upvote($id)
    {
        $query = "SELECT vote FROM answer WHERE id='$id'";
        $vote = $this->getQueryResult($query)[0]["vote"];
        $vote++;

        $query = "UPDATE answer SET vote='$vote' WHERE id='$id'";
        return $this->executeQuery($query);
    }

    public function downvote($id)
    {
        $query = "SELECT vote FROM answer WHERE id='$id'";
        $vote = $this->getQueryResult($query)[0]["vote"];
        $vote--;

        $query = "UPDATE answer SET vote='$vote' WHERE id='$id'";
        return $this->executeQuery($query);
    }
}