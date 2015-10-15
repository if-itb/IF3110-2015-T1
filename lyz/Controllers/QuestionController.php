<?php namespace Lyz\Controllers;

use Lyz\Http\Request;
use Lyz\Http\Route;
use Lyz\Model\Question;
use Lyz\Model\Answer;
use Lyz\View\View;

class QuestionController {
	public function index() {
		$search_content = new View('questions/search');
		$content = null;
		
		$questions = Question::all();
		$answers = Answer::all();
		$ans_count = [];
		if (!empty($answers)) {
			foreach ($answers as $answer) {
				$question_id = $answer->question_id;
				if (isset($ans_count[$question_id])) {
					$ans_count[$question_id]++;
				}
				else {
					$ans_count[$question_id] = 1;
				}
			}
		}

		if (!empty($questions)) {
			$content = '';
			foreach ($questions as $question) {
				if (isset($ans_count[$question->id])) {
					$question->answers = $ans_count[$question->id];
				}
				else {
					$question->answers = 0;
				}
				$original_size = strlen($question->content);
				$question->content = substr($question->content, 0, 120);
				if (strlen($question->content) < $original_size) {
					$question->content .= '...';
				}
			}

			$view = new View('questions/card');
			$view = $view->params(['questions' => $questions]);
			$content .= (string)$view;
		}

		$view = new View('layout');
		$view = $view->params([
			'title' => 'Asklyz',
			'search' => (string)$search_content,
			'content' => (string)$content,
			'headline' => 'Recently Asked Questions'
		])->styles(['layout', 'search', 'card'])->scripts(['layout']);
		return $view;
	}

	public function getRead() {
		$question_id = Request::params('id')['id'];
		$question = Question::where('id', '=', $question_id)->first();
		$question_view = new View('questions/detail');

		$answers = Answer::where('question_id', '=', $question_id)->get();
		$answer_view = new View('answers/detail');
		$answer_form = new View('answers/form');

		$question->answers = count($answers);
		$content = (string)$question_view->params(['question' => $question]) .
			(string)$answer_view->params(['answers' => $answers]) .
			(string)$answer_form->params(['question_id' => $question->id]);

		$view = new View('layout');
		$view = $view->params([ 
			'title' => 'Asklyz - ' . $question->topic,
			'content' => (string)$content,
			'headline' => $question->topic,
			])->scripts(['layout', 'form', 'votes'])->styles(['layout', 'form', 'card', 'card-detail']);

		return $view;
	}

	public function getCreate() {
		$content = new View('questions/form');
		$view = new View('layout');

		$view = $view->params([ 
			'title' => 'Asklyz - Create Question',
			'content' => (string)$content,
			'headline' => 'What\'s your question?'
			])->scripts(['layout', 'form'])->styles(['layout', 'form', 'card']);

		return $view;
	}

	public function getUpdate() {
		$question = Question::where('id','=',Request::params('id')['id'])->first();
		$content = new View('questions/form-edit');
		$content = $content->params(['question' => $question]);
		$view = new View('layout');

		$view = $view->params([ 
			'title' => 'Asklyz - Update Question',
			'content' => (string)$content,
			'headline' => 'What\'s your question?'
			])->scripts(['layout', 'form'])->styles(['layout', 'form', 'card']);

		return $view;
	}

	public function getDelete() {
		$question_id = Request::params(['id'])['id'];
		Question::where('id','=',$question_id)->destroy();

		return Route::redirect();
	}

	public function getSearch() {
		$input = Request::params(['params']);
		$questions = Question::where('topic','LIKE','%'.$input['params'].'%')
				->whereOr('content','LIKE','%'.$input['params'].'%')->get();

		$search_content = new View('questions/search');
		$content = null;
		
		$answers = Answer::all();
		$ans_count = [];
		if (!empty($answers)) {
			foreach ($answers as $answer) {
				$question_id = $answer->question_id;
				if (isset($ans_count[$question_id])) {
					$ans_count[$question_id]++;
				}
				else {
					$ans_count[$question_id] = 1;
				}
			}
		}

		if (!empty($questions)) {
			$content = '';
			foreach ($questions as $question) {
				if (isset($ans_count[$question->id])) {
					$question->answers = $ans_count[$question->id];
				}
				else {
					$question->answers = 0;
				}
			}

			$view = new View('questions/card');
			$view = $view->params(['questions' => $questions]);
			$content .= (string)$view;
		}

		$view = new View('layout');
		$view = $view->params([
			'title' => 'Asklyz',
			'search' => (string)$search_content,
			'content' => (string)$content,
			'headline' => 'Search Results'
		])->styles(['layout', 'search', 'card'])->scripts(['layout']);
		return $view;

	}

	public function postVotes() {
		$input = Request::params(['id', 'up']);
		$question = Question::where('id','=',$input['id'])->first();
		$question->votes += ($input['up'] == 'true') ? 1 : -1;
		$question->update('id=' . $question->id);

		$response = [
			'votes' => $question->votes
		];

		return json_encode($response);
	}

	public function postCreate() {
		$question = new Question(Request::params());
		$question->save();

		return Route::redirect();
	}

	public function postUpdate() {
		$input = Request::params();
		$question_id = $input['question_id'];
		$question = Question::where('id','=',$question_id)->first();

		foreach (Question::$fillable as $key) {
			$question->$key = $input[$key];
		}
		$question->update('id=' . $question_id);

		return Route::redirect('/questions?id='.$question_id);
	}
}
