<?php
namespace App\Models;
error_reporting(E_ALL);
ini_set('display_errors', '1');
use App\Core\BaseModel;
use App\Helpers\Functions;

class Question extends BaseModel
{
    private $questionID;
    private $questionText;
    private $questionDesc;
    private $answers;
    public function __construct()
    {
        parent::__construct("question");
    }
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) $this->$property = $value;
        else return "property not found";
    }
    public function __get($property)
    {
        if (property_exists($this, $property)) return $this->$property;
        else return "property not found";
    }

    public function fetchAllQuestions()
    {
        return parent::fetchAll();
    }
    public function fetchRandomQuestion(){
        $row = $this->fetchRandom();
        $this->questionID = $row["ID"];
        $this->questionText = $row["questionText"];
        $this->questionDesc = $row["questionDesc"];
    }
    public function fetchAnswers(){
        parent::__construct("answer");
        parent::__set("columns", ["ID", "answerText", "questionFk"]);
        $this->answers = $this->findByColumnName("questionFK", $this->questionID);
    }
}

